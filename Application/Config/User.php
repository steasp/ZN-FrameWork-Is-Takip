<?php 
//----------------------------------------------------------------------------------------------------
// USER 
//----------------------------------------------------------------------------------------------------
//
// Yazar      : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
// Site       : www.zntr.net
// Lisans     : The MIT License
// Telif Hakkı: Copyright (c) 2012-2016, zntr.net
//
//----------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------
// Encode
//----------------------------------------------------------------------------------------------------
//
// Kullanıcı kaydı yapılırken şifrenin hangi algoritma ile şifreleneceği ayarlanır. md5, sha1, ...
// geçerli hash algoritmalarından biri tercih edilir. Şifrenin, kodlanmasını istemiyorsanız.
// boş bırakmanız yeterlidir.					  						
//
//----------------------------------------------------------------------------------------------------
$config['User']['encode'] = 'super';

//----------------------------------------------------------------------------------------------------
// Matching
//----------------------------------------------------------------------------------------------------
//
// Veritabanında yer alan tablo ile ilgili sütunları eşleştirmek için kullanılır. Tablo ismini table
// bölümüne diğer sütunlardan mevcut olanlarıda ilgili anahtarlarla eşleştirmelisiniz.		
//
// table: Eşleştirme yapılacak tablo adı.	
//
// columns: Eşleştirme yapılacak sütunlar.
//     username: Kullanıcı adı bilgisini tutan sütun adı.
//     password: Kullanıcı şifresini tutan sütun adı.
//     email   : Kullanıcı adı bilgisi e-posta adresi içermiyorsa e-posta sütunu olarak kullanılır.
//               bu nedenle kullanımı görecelidir.
//     active  : Kullanıcıların aktif olup olmadığı bilgisini tutan sütun adı. 0 ve 1 değeri alacak
//               şekilde veri türü seçilmelidir.
//     banned  : Kullanıcıların banlı olup olmadığı bilgisini tutan sütun adı. 0 ve 1 değeri alacak
//               şekilde veri türü seçilmelidir. 															  	  					  						
//
//----------------------------------------------------------------------------------------------------
$config['User']['matching'] = array
(
	'table'   => 'admin',
	
	'columns' => array
	(
		'username'   => 'username', // Kullanımı zorunludur.
		'password'   => 'password', // Kullanımı zorunludur.
		'email'      => 'email', // Kullanımı görecelidir.
		'active'     => 'active', // İsteğe bağlı.
		'banned'     => 'banned', // İsteğe bağlı.
		'activation' => 'activation'  // İsteğe bağlı.
	)
);

//----------------------------------------------------------------------------------------------------
// Joining
//----------------------------------------------------------------------------------------------------
//
// Kullanıcılar tablonuz birleştirilmiş tablolardan oluşuyorsa bu bölüm kullanılır.	
//
// column: Yukarıda belirtilen tabloya ait birleştirme için kullanılacak sütun bilgisidir.
//         Genellik id sütunu değer olarak verilir.	
//
// tables: Birleştirme yapılacak diğer tablo ve sütun bilgileri. table => column formatında 
//         kullanılır. 	  					  						
//
//----------------------------------------------------------------------------------------------------
$config['User']['joining'] = array
(
	'column' => '',
	'tables' => array()
);

//----------------------------------------------------------------------------------------------------
// Email Sender Info
//----------------------------------------------------------------------------------------------------
//
// Aktivasyon işlemleri veya şifremini unuttum işlemleri esnasından 
// gönderilecek e-posta'ya ait gönderen ismi ve e-posta bilgilerini belirtmek içindir. 
// Genellikle site adı ve e-posta adresi tercih edilir.
//
// name: Gönderici adı.
// mail: Gönderici e-posta adresi.					  						
//
//----------------------------------------------------------------------------------------------------
$config['User']['emailSenderInfo'] = array
(
	'name' => '',
	'mail' => ''
);