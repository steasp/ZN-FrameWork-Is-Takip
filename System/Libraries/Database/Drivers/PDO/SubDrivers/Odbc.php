<?php
class PDOOdbcDriver implements Pdo\SubDriverInterface
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
		$dsn  = 'odbc:DRIVER={IBM DB2 ODBC DRIVER}';
			
		$dsn .= ( ! empty($this->config['database']) ) 
				? ';DATABASE='.$this->config['database'] 
				: '';
				
		$dsn .= ( ! empty($this->config['host']) ) 
				? ';HOSTNAME='.$this->config['host'] 
				: '';
				
		$dsn .= ( ! empty($this->config['port']) ) 
				? ';PORT='.$this->config['port'] 
				: '';
				
		$dsn .= ( ! empty($this->config['protocol']) ) 
				? ';PROTOCOL='.$this->config['protocol'] 
				: ';PROTOCOL=TCPIP';
				
		$dsn .= ( ! empty($this->config['user']) ) 
				? ';UID='.$this->config['user'] 
				: '';
		
		$dsn .= ( ! empty($this->config['password']) ) 
				? ';PWD='.$this->config['password'] 
				: '';
	
		return $dsn;
	}	
}