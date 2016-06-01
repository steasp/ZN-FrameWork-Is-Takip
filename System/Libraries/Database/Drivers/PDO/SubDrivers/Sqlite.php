<?php
class PDOSqliteDriver implements Pdo\SubDriverInterface
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
		$dsn = 'sqlite:';
			
		if( ! empty($this->config['database']) )
		{
			$dsn .= $this->config['database'];
		}
		elseif( ! empty($this->config['host']) ) 
		{
			$dsn .= $this->config['host'];
		}
		else 
		{
			$dsn .= ':memory:';
		}
	
		return $dsn;
	}	
}