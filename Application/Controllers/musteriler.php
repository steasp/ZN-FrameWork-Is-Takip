<?php
class musteriler extends Controller{

    public function __construct(){
        if(User::isLogin()===false){
            redirect("logout");
        }
    }
    
    public function index(){
        
        //sayfanın title'ı
        $head["title"] = "Müşteri Listesi";
        //application/views/sections/body.php içindeki $body verisini dolduruyoruz
        //müşteri listesini alıyoruz
        $musteriler = $this->musteri->liste();
        
        //bunu bodyverisine atıyoruz
        $bodyVeri["musteriler"] = $musteriler;
        //bodyveriyide import::view ile application/views/musteri/index.php dosyasını çağır ve ona değişken olarak ata diyoruz
        $data['body']   = Import::view('musteri/index',$bodyVeri,true);
        //şimdide application/views/sections/body.php dosyasınadaki breadcrumb'a verileri gönderiyoruz
        //burada ki verdiğimiz breadName ve breadUrl değişkenleri direkt body.php de kullanılabilirken
        //yukarıdaki $bodyVeri["musteriler"] import::view ile import ettiğimiz musteri/index.php dosyasında kullanılabilmektedir
        $data["breadName"]  = array("Müşteriler");
        $data["breadUrl"]   = array("/musteriler");
        Import::masterPage($data,$head);
    }
    
    // -- /musteriler/ekle sayfasına ait method
    function ekle(){
        $head["title"] = "Müşteri Ekle";
        $data["breadName"]  = array("Müşteriler","Müşteri Ekle");
        $data["breadUrl"]   = ARRAY("/".CURRENT_CONTROLLER,"/".CURRENT_CONTROLLER."/".CURRENT_CFUNCTION);
        //breadUrl'in bir kullanım şeklide yukarıdaki gibi olabilir
        //isterseniz elle array("/musteriler","/musteriler/ekle"); şeklindede girebilirsiniz
        $body="";
        //post ile veri geldiyse kayıt işlemlerini deneyecez
        if(Method::post("kaydet")){
            //önce post ile gelen verilerimiz kontrol edecez
            /*
            $ad         = Method::post("ad");
            $yetkili    = Method::post("yetkili");
            $gsm        = Method::post("gsm");
            $email      = Method::post("email");
            $telefon    = Method::post("telefon");
            $websitesi  = Method::post("websitesi");
            $adres      = Method::post("adres");
            */
            Validation::rules("ad", array("required","minchar"=>2,"maxchar"=>100),"Müşteri Adı");
            //Validation::name('ad')->value($ad)->validate('required')->compare(2, 100)->rules("Müşteri Adı");
            Validation::rules("yetkili",array("required","minchar"=>2,"maxchar"=>50),"Yetkili");
            Validation::rules("gsm",array("phone","required","GSM"));
            Validation::rules("telefon",array("telefon","","telefon"));
            Validation::rules('email', array('required', 'email'), 'E-posta');
            if(Validation::error("string")!=""){
                $body["hatalar"] = Validation::error("string");
            }else{
                //musteri modelinin ekle methodu bize işlem geçerli ise son kaydın id'sini
                //işlem başarısız ise 0 değerini dönüyor
                $musteriid = $this->musteri->ekle($_POST);
                if($musteriid!=0){
                    redirect("/musteriler/kayit/$musteriid",0,array("veri"=>$_POST));
                }else{
                    $body["hatalar"] = DB::error(); 
                }
            }
        }
        $data['body']   = Import::view('musteri/ekle',$body,true);
        Import::masterPage($data,$head);
    }
    
    // -- /musteriler/kayit sayfasına ait method
    function kayit($musteriid){
        $head["title"] = "Müşteri Kayıt";
        $data["breadName"]  = array("Müşteriler","Müşteri Ekle");
        $data["breadUrl"]   = ARRAY("/".CURRENT_CONTROLLER,"/".CURRENT_CONTROLLER."/".CURRENT_CFUNCTION);
        $body["musteriid"] = $musteriid;
        $data['body']   = Import::view('musteri/ekle',$body,true);
        Import::masterPage($data,$head);
    }
    
    function duzenle($id){
        $musteri = $this->musteri->get($id);
        
        if(isset($musteri)){
            $head["title"] = "Müşteri Düzenle";
            $data["breadName"]  = array("Müşteriler","Müşteri Düzenle");
            $data["breadUrl"]   = ARRAY("/".CURRENT_CONTROLLER,"/".CURRENT_CONTROLLER."/".CURRENT_CFUNCTION."/".$id);
            $body["musteri"] = $musteri;
            
            if(Method::post("kaydet")){
            
                Validation::rules("ad", array("required","minchar"=>2,"maxchar"=>100),"Müşteri Adı");
                Validation::rules("yetkili",array("required","minchar"=>2,"maxchar"=>50),"Yetkili");
                Validation::rules("gsm",array("phone","required","GSM"));
                Validation::rules("telefon",array("telefon","","telefon"));
                Validation::rules('email', array('required', 'email'), 'E-posta');
                if(Validation::error("string")!=""){
                    $body["hatalar"] = Validation::error("string");
                }else{
                    //musteri modelinin ekle methodu bize işlem geçerli ise son kaydın id'sini
                    //işlem başarısız ise 0 değerini dönüyor
                    
                    $musteriid = $this->musteri->duzenle($id,$_POST);
                    redirect("/musteriler",0,array("mesaj" => "<div class='alert alert-info'>".$musteri->ad ." müşterisi düzenlendi</div>"));
                }
            }
            
            $data['body']   = Import::view('musteri/duzenle',$body,true);
            Import::masterPage($data,$head);
        }
    }
   
   
    function sil($id){
        $musteri = $this->musteri->get($id);
        try{
            $sonuc = $this->musteri->sil($id);
            if($sonuc==0){
                redirect("/musteriler",0,array("mesaj"=>"<div class='alert alert-warning'>".$musteri->ad." müşterisi silindi.</div>"));
            }else{
                redirect("/musteriler",0,array("mesaj"=>"<div class='alert alert-danger'>".$musteri->ad." müşterisi silinemedi.<br />Hata : $sonuc</div>"));
            }
        }catch(Exception $e){
            redirect("/musteriler",0,array("mesaj"=>"<div class='alert alert-danger'>".$musteri->ad." müşterisi silinemedi.<br />Hata : ".$e->getMessage()."</div>"));
        }
    }
}