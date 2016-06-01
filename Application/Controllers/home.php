<?php
class Home extends Controller{



	/*
	 * Alttaki kapalı kodlar ZN Framework içinde ki user sınıfını kullanmadan SESSION ile giriş çıkış yapılması için yazılmıştır
	 * USER sınıfı bu dağıtımda site yöneticilerini ekleme ve giriş çıkışı için kullanıldı.
	 * Eğer USER sınıfını üyeleriniz için kullanacaksanız kapalı kodu aktif edip  aktif olan __construct() fonksiyonunu kapatmalısınız.
	 * Sonrasında controller dosyalarının en üstünde bulunan
	 * public function __construct(){ if(User::isLogin()==false){ redirect('home');  }  } satırını yerine
	 * public function __construct(){ if(Session::select('kisiId')===false){ redirect('home');  }  } satırı ile değiştirmelisiniz.
	 *
	 * */


	/*public function __construct(){

		if(Session::select('kisiId')===false and !empty($_POST["username"]) and !empty($_POST["pass"])){

			$head['title'] 	= 'GİRİŞ YAPILIYOR';

			$kontrol = DB::select("count(*) as say")->where("username=",Method::post('username'),"and")->where("pass=",Method::post('pass'))->get("yonetim");

			if($kontrol->row()->say==1){

				$kullanici = DB::select("id,username")->where("username=",Method::post('username'),"and")->where("pass=",Method::post('pass'))->get("yonetim");

				Session::insert('kisiId', $kullanici->row()->id);
				Session::insert('kisi', $kullanici->row()->username);

				redirect('home/index');

			}else{

				redirect('home',0,array('uyari'=>'<div class="alert alert-info"><strong>HATA!</strong> Giriş İşleminiz başarısız! Lütfen bilgilerinizi kontrol ediniz.</div>'));
			}

		}elseif(Session::select('kisiId')===false){

			$head['title'] 	= 'GİRİŞ YAP';
			$head['meta']['author']	= '';

			$bodyVeri["uyari"] = redirectData('uyari');

			$data['head'] = "";
			$data['footer'] = Import::view('footer','',true);
			$data['body']   = Import::view('login',$bodyVeri,true);

			Import::masterPage($data,$head);

			exit();

		}else{

			$head['title'] 	= 'Yönetim Paneli';
			$head['meta']['author']	= '';

		}
	}*/
	public function __construct(){
		//sadece cache e bir örnek olması için burada girişte tüm müşterileri hafızaya alıyoruz
		//burada hafızaya aldığımız müşterileri /musteriler sayfasında kullanacağız
		/*
		if(Cache::getMetaData("musteriler")==null){
			$musteriler = $this->musteri->liste();
			Cache::insert("musteriler",$musteriler,60*60*1);
		}
		*/
		//her kayıt sonrası cache i yenilemek gerektiğinden yukarıdaki cache işlemi kaldırıldı.
		//ama kullanımı açısından kodları yukarıda bırakıyorum
		
		
		//yukarıdaki veriyi aşağıdan görebilirsiniz
		//output(Cache::select("musteriler"));
		
		
		if(User::isLogin()===false){
            redirect("logout");
        }
	}

	
	
	public function index($params = ''){

		$head['title'] 			= 'YÖNETİM PANELİ';
		$head['meta']['author']	= '';
		
		$headData["kullaniciAdi"] = Session::select('kisi');

		
		
		$bodyVeri["uyari"] = redirectData('uyari');

		$data['head'] 	= Import::view('head',$headData,true);
		$data['footer'] = Import::view('footer','',true);
		$data['body']   = Import::view('anasayfa',$bodyVeri,true);

		Import::masterPage($data,$head);


	}
	public function test($deger=1){
		$data["deger"] = $deger;
		Import::view("test.template",$data);
	}
	public function __destruct(){

	}
}