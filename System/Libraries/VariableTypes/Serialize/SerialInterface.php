<?php 
interface SerialInterface
{
	/***********************************************************************************/
	/* JSON LIBRARY	     					                   	                       */
	/***********************************************************************************/
	/* Yazar: Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
	/* Site: www.zntr.net
	/* Lisans: The MIT License
	/* Telif Hakkı: Copyright (c) 2012-2016, zntr.net
	/*
	/* Sınıf Adı: Json
	/* Versiyon: 2.0 Eylül Güncellemesi
	/* Tanımlanma: Statik
	/* Dahil Edilme: Gerektirmez
	/* Erişim: Json::, $this->Json, zn::$use->Json, uselib('Json')
	/* Not: Büyük-küçük harf duyarlılığı yoktur.
	/***********************************************************************************/

	/******************************************************************************************
	* ENCODE                                                                                  *
	*******************************************************************************************
	| Genel Kullanım: Belirtilen ayraçlara göre diziyi özel bir veri tipine çeviriyor.        |
	|															                              |
	******************************************************************************************/	
	public function encode($data);
	
	/******************************************************************************************
	* DECODE                                                                                  *
	*******************************************************************************************
	| Genel Kullanım: Özel veriyi Object veri türüne çevirir.        						  |
	|          																				  |
	******************************************************************************************/	
	public function decode($data);
	
	/******************************************************************************************
	* DECODE OBJECT                                                                           *
	*******************************************************************************************
	| Genel Kullanım: Özel veriyi Object veri türüne çevirir.        						  |
	|          																				  |
	******************************************************************************************/	
	public function decodeObject($data);
	
	/******************************************************************************************
	* DECODE ARRAY                                                                            *
	*******************************************************************************************
	| Genel Kullanım: Özel veriyi Object veri türüne çevirir.        						  |
	|          																				  |
	******************************************************************************************/	
	public function decodeArray($data);
}