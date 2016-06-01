<?php
class PDODblibDriver implements Pdo\SubDriverInterface
{
	//----------------------------------------------------------------------------------------------------
	//
	// Yazar      : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
	// Site       : www.zntr.net
	// Lisans     : The MIT License
	// Telif Hakkı: Copyright (c) 2012-2016, zntr.net
	//
	//----------------------------------------------------------------------------------------------------
	
	use Pdo\SubDriverTrait;
	
	/******************************************************************************************
	* DNS       		                                                                      *
	*******************************************************************************************
	| Bu sürücü için dsn bilgisi oluşturuluyor.  							                  |
	******************************************************************************************/
	public function dsn()
	{
		$dsn  = 'dblib:'.( ! empty($this->config['host']) ) 
							  ? 'host='.$this->config['host'].';'
							  : '';
								  
		$dsn .= ( ! empty($this->config['database']) ) 
				? 'dbname='.$this->config['database'].';' 
				: '';
				
		$dsn .= ( ! empty($this->config['port']) ) 
				? 'port='.$this->config['port'].';'
				: '';
				
		$dsn .= ( ! empty($this->config['appname']) ) 
				? 'appname='.$this->config['appname'].';'
				: '';
				
		$dsn .= ( ! empty($this->config['charset']) ) 
				? 'charset='.$this->config['charset'] 
				: '';
		
		return rtrim($dsn, ';');
	}	
}