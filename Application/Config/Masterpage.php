<?php
//----------------------------------------------------------------------------------------------------
// MASTERPAGE 
//----------------------------------------------------------------------------------------------------
//
// Yazar      : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
// Site       : www.zntr.net
// Lisans     : The MIT License
// Telif Hakkı: Copyright (c) 2012-2016, zntr.net
//
//----------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------
// Head Page
//----------------------------------------------------------------------------------------------------
//
// Genel Kullanım: Masterpage olarak belirlen sayfanın head etiketleri arasına harici kod  
// yazmak için sayfa belirlemek için kullanlır.											  
// Parametre:Metinsel türde Views/ dizininden tüm sayfalar için geçerli olacak bir         
// head sayfası belirlenir. Örnek: "head";  veya array(h1, h2 ....) 						   
//
//----------------------------------------------------------------------------------------------------
$config['Masterpage']['headPage'] = 'sections/head'; // String veya Array veri türü içerebilir.

//----------------------------------------------------------------------------------------------------
// Body Page
//----------------------------------------------------------------------------------------------------
//
// Genel Kullanım: Masterpage olacak sayfayı ayarlamak için kullanılır.					  
// Parametre:Metinsel türde Views/ dizininden masterpage olarak düşünülen sayfa 	          
// adı bilgisi girilir. Örnek: "body";											  		    
//
//----------------------------------------------------------------------------------------------------
$config['Masterpage']['bodyPage'] = 'sections/body';

//----------------------------------------------------------------------------------------------------
// Doctype
//----------------------------------------------------------------------------------------------------
//
// Genel Kullanım: Sayfanın döküman türü varsayılan:xhtml1-trans.			  			   
//
//----------------------------------------------------------------------------------------------------
$config['Masterpage']['docType'] = 'xhtml1Transitional';

//----------------------------------------------------------------------------------------------------
// Content Charset
//----------------------------------------------------------------------------------------------------
//
// Genel Kullanım: Sayfanın dil kodlaması varsayılarn:utf-8.			  			 	      
//
//----------------------------------------------------------------------------------------------------
$config['Masterpage']['content'] = array
(
	'language' => 'tr',
	'charset'  => array('utf-8')
);

//----------------------------------------------------------------------------------------------------
// Browser Icon
//----------------------------------------------------------------------------------------------------
//
// Genel Kullanım: Web sitesinin tarayıcıda görünen ikon eklemek için ikonun 			  
// yolunu yazınız.										  		  			 	           
//
//----------------------------------------------------------------------------------------------------
$config['Masterpage']['browserIcon'] = '';

//----------------------------------------------------------------------------------------------------
// Background Image
//----------------------------------------------------------------------------------------------------
// 
// Genel Kullanım: Web sitesinin arkaplan resmi.								  			  
//
//----------------------------------------------------------------------------------------------------
$config['Masterpage']['backgroundImage'] = '';

//----------------------------------------------------------------------------------------------------
// Body Attributes
//----------------------------------------------------------------------------------------------------
// 
// Genel Kullanım: <html>, <head> ve <body> taglarına özellik değer çifti eklemek istediğiniz zaman kullanabilirsiniz.
// array('id' => 'body', 'name' => 'Body') -- <body id="body" name="Body">								  			  
//
//----------------------------------------------------------------------------------------------------
$config['Masterpage']['attributes'] = array
(
	'html' => array(),
	'head' => array(),
	'body' => array()
); 

//----------------------------------------------------------------------------------------------------
// Theme
//----------------------------------------------------------------------------------------------------
//
// Genel Kullanım: Resources/Themes/ içindeki dahil edilmek istenen tema belirtilir.	      	
//
//----------------------------------------------------------------------------------------------------
$config['Masterpage']['theme'] = array
(
	'name' 		=> '',
	'recursive' => false
);

//----------------------------------------------------------------------------------------------------
// Plugin
//----------------------------------------------------------------------------------------------------
//
// Genel Kullanım: Resources/Plugins/ içindeki dahil edilmek istenen eklentiler belirtilir.	      	
//
//----------------------------------------------------------------------------------------------------
$config['Masterpage']['plugin'] = array
(
	'name' 		=> '',
	'recursive' => false
);

//----------------------------------------------------------------------------------------------------
// Font
//----------------------------------------------------------------------------------------------------
//
// Genel Kullanım: Harici font kullanımı kullanmak istediğiniz özel fontları 			  
// Resources/Fonts/																		  
// dizinine atıp bu dizin içindek dosyanın adını yazarak kullanabilirsiniz.				  
// Aşağıdaki dizi içerisine Resources/Fonts/ dizinindeki dosya/dosyaların isimlerini       
// yazmanız yeterlidir.								  			 					 	  	
//
//----------------------------------------------------------------------------------------------------
$config['Masterpage']['font'] = array(); // string veya array

//----------------------------------------------------------------------------------------------------
// Style
//----------------------------------------------------------------------------------------------------
//
// Genel Kullanım: Harici css dosyası kullanımı kullanmak istediğiniz stil dosyalarını     
// Resources/Styles/ dizinine atmanız gerekmektedir. Aşağıdaki dizi içerisine              
// Resources/Styles/                      												  
// dizinindeki dosya/dosyaların isimlerini yazmanız yeterlidir.							  	
//
//----------------------------------------------------------------------------------------------------
$config['Masterpage']['style'] = array("bootstrap.min","datepicker3","styles","standart"); // string veya array

//----------------------------------------------------------------------------------------------------
// Script
//----------------------------------------------------------------------------------------------------
//
// Genel Kullanım: Harici javascript dosyası kullanımı. Aşağıdaki dizi içerisine 		  
// Resources/Scripts/ dizinindeki dosya/dosyaların isimlerini yazmanız yeterlidir.	      	
//
//----------------------------------------------------------------------------------------------------
$config['Masterpage']['script'] = array("lumino.glyphs.js"); // string veya array

//----------------------------------------------------------------------------------------------------
// Title
//----------------------------------------------------------------------------------------------------
//
// Genel Kullanım: Tüm sayfalar için varsayılan başlık bilgisi.					 		  
//
//----------------------------------------------------------------------------------------------------
$config['Masterpage']['title'] 	= 'Line Ajans iş takip sistemi';

//----------------------------------------------------------------------------------------------------
// Meta
//----------------------------------------------------------------------------------------------------
//
// Genel Kullanım: Standart olarak kullanılan meta verilerini kullanmak için oluşturuldu.  
// Meta içeri name ise name: ayracı, http-equiv ise http: ayracı kullanılarak 			  
// meta tagları ekleyebilirsiniz.														  
//																					      
// Aşağıdaki taglar ön tanımlı meta taglarıdır.  									      
//																					      
//----------------------------------------------------------------------------------------------------
$config['Masterpage']['meta'] = array
(
	'name:description'		=> '', 
	'name:author'			=> '',
	'name:designer'			=> '',
	'name:distribution'		=> '',
	'name:keywords'			=> '',
	'name:abstract'			=> '',
	'name:copyright'		=> '',
	'name:expires'			=> '',
	'name:pragma'			=> '',
	'name:revisit-after'	=> '',
	'http:cache-control' 	=> '',
	'http:refresh'			=> '',
	'name:robots'			=> array()
);

//----------------------------------------------------------------------------------------------------
// Data
//----------------------------------------------------------------------------------------------------
//
// Genel Kullanım: Head tagları arasına farklı bir bilgi veya bilgiler eklenmek isteniyorsa
// dizi elemanı olarak yazmanız yeterlidir.	  											  
//
//----------------------------------------------------------------------------------------------------
$config['Masterpage']['data'] = array();