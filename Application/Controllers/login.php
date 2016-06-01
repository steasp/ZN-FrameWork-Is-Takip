<?
class login extends Controller{
    
    function __construct(){
		
    }
    
    function index(){
        if(User::isLogin()===false and !empty($_POST["username"]) and !empty($_POST["password"])){

			$head['title'] 	= 'GİRİŞ YAPILIYOR';
			$kontrol = User::login($_POST["username"],$_POST["password"]);
			
			if($kontrol==1){
				redirect('home',1);
				exit();
			}else{
				redirect('login',0,array('uyari'=>'<div class="alert alert-info"><strong>HATA!</strong> Giriş İşleminiz başarısız! Lütfen bilgilerinizi kontrol ediniz.</div>'));
			}

		}elseif(User::isLogin()==false){

			
			$bodyVeri["uyari"] = redirectData('uyari');

			
			Import::body("login")->title("Giriş Yap")->masterPage();

			exit();

		}else{

			$head['title'] 	= 'Yönetim Paneli';
			$head['meta']['author']	= '';

		}    
    } 
}
