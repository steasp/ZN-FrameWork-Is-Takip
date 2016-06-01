<?php
//----------------------------------------------------------------------------------------------------
// TEMEL YAPI 
//----------------------------------------------------------------------------------------------------
//
// Yazar      : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
// Site       : www.zntr.net
// Lisans     : The MIT License
// Telif Hakkı: Copyright (c) 2012-2016, zntr.net
//
//----------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------
// Kernel                                                                                     
//----------------------------------------------------------------------------------------------------
//
// Genel Kullanım: Çıktıyı üretmek için kullanılır.						  
//          																				  
//----------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------
// Structure Data
//----------------------------------------------------------------------------------------------------
//
// @return Aktif çalıştırılan kontrolcü dosyasının yol bilgisi.
//
//----------------------------------------------------------------------------------------------------
$datas 		= Structure::data();
$parameters = $datas['parameters'];
$page       = $datas['page'];
$isFile     = $datas['file'];
$function   = $datas['function'];

//----------------------------------------------------------------------------------------------------
// CURRENT_CFILE
//----------------------------------------------------------------------------------------------------
//
// @return Aktif çalıştırılan kontrolcü dosyasının yol bilgisi.
//
//----------------------------------------------------------------------------------------------------
define('CURRENT_CFILE', $isFile);

//----------------------------------------------------------------------------------------------------
// CURRENT_CFUNCTION
//----------------------------------------------------------------------------------------------------
//
// @return Aktif çalıştırılan sayfaya ait fonksiyon bilgisi.
//
//----------------------------------------------------------------------------------------------------
define('CURRENT_CFUNCTION', $function);

//----------------------------------------------------------------------------------------------------
// CURRENT_CPAGE
//----------------------------------------------------------------------------------------------------
//
// @return Aktif çalıştırılan sayfaya ait kontrolcü dosyasının ad bilgisini.
//
//----------------------------------------------------------------------------------------------------
define('CURRENT_CPAGE', $page.".php");

//----------------------------------------------------------------------------------------------------
// CURRENT_CONTROLLER
//----------------------------------------------------------------------------------------------------
//
// @return Aktif çalıştırılan sayfaya ait kontrolcü bilgisi.
//
//----------------------------------------------------------------------------------------------------
define('CURRENT_CONTROLLER', $page);

//----------------------------------------------------------------------------------------------------
// CURRENT_CPATH
//----------------------------------------------------------------------------------------------------
//
// @return Aktif çalıştırılan sayfaya ait kontrolcü ve fonksiyon yolu	bilgisi.
//
//----------------------------------------------------------------------------------------------------
define('CURRENT_CFPATH', str_replace(CONTROLLERS_DIR, '', CURRENT_CONTROLLER).'/'.CURRENT_CFUNCTION);

//----------------------------------------------------------------------------------------------------
// CURRENT_CFURI
//----------------------------------------------------------------------------------------------------
//
// @return Aktif çalıştırılan sayfaya ait kontrolcü ve fonksiyon yolu	bilgisi.
//
//----------------------------------------------------------------------------------------------------
define('CURRENT_CFURI', CURRENT_CFPATH);

//----------------------------------------------------------------------------------------------------
// CURRENT_CPATH
//----------------------------------------------------------------------------------------------------
//
// @return Aktif çalıştırılan sayfaya ait kontrolcü ve fonksiyon URL yol bilgisi.
//
//----------------------------------------------------------------------------------------------------
define('CURRENT_CFURL', siteUrl(CURRENT_CFPATH));

//----------------------------------------------------------------------------------------------------
// Fonksiyon Yükleme İşlemleri
//----------------------------------------------------------------------------------------------------
$starting = Config::get('Starting');

if( $starting['autoload']['status'] === true ) 
{
	$startingAutoload = Folder::allFiles(AUTOLOAD_DIR, $starting['autoload']['recursive']);
	
	//------------------------------------------------------------------------------------------------
	// Otomatik Olarak Yüklenen Fonksiyonlar
	//------------------------------------------------------------------------------------------------
	if( ! empty($startingAutoload) ) foreach( $startingAutoload as $file )
	{
		$file = restorationPath(suffix($file, '.php'));
		
		if( is_file($file) )
		{
			require_once $file;
		}
	}
}	

//----------------------------------------------------------------------------------------------------
// El ile Yüklenen Fonksiyonlar
//----------------------------------------------------------------------------------------------------
if( ! empty($starting['handload']) )
{
	Import::handload($starting['handload']);
}
//----------------------------------------------------------------------------------------------------

// SAYFA KONTROLÜ YAPILIYOR...
// -------------------------------------------------------------------------------
//  Sayfa bilgisine erişilmişse sayfa dahil edilir.
// -------------------------------------------------------------------------------
if( is_file($isFile) )
{
	// -------------------------------------------------------------------------------
	//  Sayfa dahil ediliyor.
	// -------------------------------------------------------------------------------
	require_once $isFile;
		
	// -------------------------------------------------------------------------------
	// Sayfaya ait controller nesnesi oluşturuluyor.
	// -------------------------------------------------------------------------------
	if( class_exists($page, false) )
	{
		$var = new $page;
		
		// -------------------------------------------------------------------------------
		//  Varsayılan açılış Fonksiyonu. index ya da main kullanılabilir.
		// -------------------------------------------------------------------------------
		if( strtolower($function) === 'index' && ! is_callable(array($var, $function)) )
		{
			$function = 'main';	
		}	
		
		// -------------------------------------------------------------------------------
		// Sınıf ve yöntem bilgileri geçerli ise sayfayı çalıştır.
		// -------------------------------------------------------------------------------	
		if( is_callable(array($var, $function)) )
		{
			call_user_func_array( array($var, $function), $parameters);
		}
		else
		{
			if( Config::get('Route', 'show404') )
			{	
				redirect(Config::get('Route', 'show404'));	
			}
			else
			{
				// Hatayı rapor et.
				report('Error', lang('Error', 'callUserFuncArrayError', $function), 'SystemCallUserFuncArrayError');	
					
				// Hatayı ekrana yazdır.
				die(Errors::message('Error', 'callUserFuncArrayError', $function));
			}
		}
	}
}
else
{	
	if( Config::get('Route','show404') ) 
	{				
		redirect(Config::get('Route','show404'));		
	}
	else
	{
		// Hatayı rapor et.
		report('Error', lang('Error', 'notIsFileError', $isFile), 'SystemNotIsFileError');
		
		// Hatayı ekrana yazdır.
		die(Errors::message('Error', 'notIsFileError', $isFile));
	}		
}


//----------------------------------------------------------------------------------------------------
// Restore Error Handler
//----------------------------------------------------------------------------------------------------
//
// Hata yakalanıyor.
//
//----------------------------------------------------------------------------------------------------
if( APPMODE !== 'publication' )
{
	restore_error_handler();
}
else
{
	//------------------------------------------------------------------------------------------------
	// Report Error Last Error
	//------------------------------------------------------------------------------------------------
	//
	// Yakalanan son hata log dosyasına kaydediliyor.
	//
	//------------------------------------------------------------------------------------------------
	if(  Config::get('Log', 'createFile') === true && $errorLast = Errors::last() )
	{
		$lang    = lang('Error');
		$message = $lang['line']   .':'.$errorLast['line'].', '.
				   $lang['file']   .':'.$errorLast['file'].', '.
				   $lang['message'].':'.$errorLast['message'];
		
		report('GeneralError', $message, 'GeneralError');
	}	
	//------------------------------------------------------------------------------------------------
}
//----------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------
// Ob End Flush
//----------------------------------------------------------------------------------------------------
//
// Tampon kapatılıyor.
//
//----------------------------------------------------------------------------------------------------
ob_end_flush();
//----------------------------------------------------------------------------------------------------