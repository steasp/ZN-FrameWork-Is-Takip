<?php
trait DateTimeTrait
{
	//----------------------------------------------------------------------------------------------------
	//
	// Yazar      : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
	// Site       : www.zntr.net
	// Lisans     : The MIT License
	// Telif Hakkı: Copyright (c) 2012-2016, zntr.net
	//
	//----------------------------------------------------------------------------------------------------
	
	//----------------------------------------------------------------------------------------------------
	// Call Method
	//----------------------------------------------------------------------------------------------------
	// 
	// __call()
	//
	//----------------------------------------------------------------------------------------------------
	use CallUndefinedMethodTrait;
	
	//----------------------------------------------------------------------------------------------------
	// Construct
	//----------------------------------------------------------------------------------------------------
	// 
	// Dosya ayar bilgisi
	//
	// @var  array
	//
	//----------------------------------------------------------------------------------------------------
	protected $config;
	
	//----------------------------------------------------------------------------------------------------
	// Construct
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  void
	// @return bool
	//
	//----------------------------------------------------------------------------------------------------
	public function __construct()
	{
		$this->config = Config::get('DateTime');
		
		date_default_timezone_set($this->config['timeZone']);	
		
		setlocale(LC_ALL, $this->config['setLocale']['charset'], $this->config['setLocale']['language']);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Compare
	//----------------------------------------------------------------------------------------------------
	// 
	// Tarihleri karşılaştırmak için kullanılır.
	//
	// @param  string clock
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function compare($value1 = '', $condition = '', $value2 = '')
	{		
		$value1 = $this->toNumeric($value1);
		$value2 = $this->toNumeric($value2);
		
		return compare($value1, $condition, $value2);
	}
	
	//----------------------------------------------------------------------------------------------------
	// To Numeric
	//----------------------------------------------------------------------------------------------------
	// 
	// Tarihi sayısal veriye çevirir.
	//
	// @param  string dateFormat
	// @return numeric
	//
	//----------------------------------------------------------------------------------------------------
	public function toNumeric($dateFormat = '', $now = NULL)
	{
		if( $now === NULL )
		{
			$now = time();	
		}
		
		return strtotime($this->_datetime($dateFormat), $now);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Calculate
	//----------------------------------------------------------------------------------------------------
	// 
	// Tarihler arasında hesaplama yapmak için kullanılır.
	//
	// @param  string input
	// @param  string calculate
	// @param  string output
	// @return mixed
	//
	//----------------------------------------------------------------------------------------------------
	public function calculate($input = '', $calculate = '', $output = 'Y-m-d')
	{	
		if( ! preg_match('/^[0-9]/', $input) )
		{
			$input = $this->_datetime($input);
		}
		
		$output = $this->_convert($output);
		
		return $this->_datetime($output, strtotime($calculate, strtotime($input)));
	}
	
	//----------------------------------------------------------------------------------------------------
	// Set
	//----------------------------------------------------------------------------------------------------
	// 
	// Tarih ve saat ayarlamaları yapmak için kullanılır.	
	//
	// @param  string exp
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function set($exp = '')
	{	
		if( ! is_string($exp) ) 
		{
			return Errors::set('Error', 'stringParameter', 'exp');
		}

		return $this->_datetime($exp);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Protected Convert
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string $config
	// @return string $change
	//
	//----------------------------------------------------------------------------------------------------
	protected function _convert($change)
	{
		$config = $this->_chartype();
		
		$chars = $this->config[$config];
		
		$chars = Arrays::multikey($chars);
		
		return str_ireplace(array_keys($chars), array_values($chars), $change);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Protected Class Name
	//----------------------------------------------------------------------------------------------------
	// 
	// Sınıf adını verir.
	//
	//----------------------------------------------------------------------------------------------------
	protected function _classname()
	{
		return $className = str_replace(STATIC_ACCESS, '', __CLASS__);	
	}
	
	//----------------------------------------------------------------------------------------------------
	// Protected Date Time
	//----------------------------------------------------------------------------------------------------
	// 
	// Kütüphane türüne göre çevrim yapar.
	//
	//----------------------------------------------------------------------------------------------------
	protected function _datetime($format, $timestamp = NULL)
	{
		if( $timestamp === NULL )
		{
			$timestamp = time();	
		}
		
		$className = $this->_classname();
		
		$func = $className === 'Date' ? 'date' : 'strftime';
		
		return $func($this->_convert($format), $timestamp);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Protected Char Type
	//----------------------------------------------------------------------------------------------------
	// 
	// Sınıf türüne göre karaketer türünü verir.
	//
	//----------------------------------------------------------------------------------------------------
	protected function _chartype()
	{
		$className = $this->_classname();
		
		return $className === 'Date' ? 'setDateFormatChars' : 'setTimeFormatChars';
	}
}