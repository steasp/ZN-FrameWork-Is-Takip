<?php
class BaseController
{
	//----------------------------------------------------------------------------------------------------
	//
	// Yazar      : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
	// Site       : www.zntr.net
	// Lisans     : The MIT License
	// Telif Hakkı: Copyright (c) 2012-2016, zntr.net
	//
	//----------------------------------------------------------------------------------------------------
	
	/******************************************************************************************
	* GET                                                                                     *
	*******************************************************************************************
	| Nesnelere $this nesnesi ile sınıflara erişmek için kullanılmaktadır.					  |
	| 																						  |
	******************************************************************************************/	
	public function __get($class)
	{
		// ---------------------------------------------------------------------
		// Nesnenin tanımlanmamış ise tanımlanmasını sağla.
		// ---------------------------------------------------------------------
		if( ! isset($this->$class) )
		{
			// Sınıf Tanımlaması Yapılıyor.
			return $this->$class = uselib($class);	
		}
		// ---------------------------------------------------------------------
	}
}