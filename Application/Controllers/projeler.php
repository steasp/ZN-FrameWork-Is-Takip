<?php
class projeler extends Controller{

    public function __construct(){
        if(User::isLogin()===false){
            redirect("logout");
        }
    }
    
    public function index(){
        $data["breadName"]  = array("Projeler");
        $data["breadUrl"]   = array("/projeler");
        
        $head['title'] 	= 'Projeler';
        
        $bodyVeri["projeler"] = DB::select()
         ->from('proje') 
         ->get()->result();
        
        
        $data['body']   = Import::view('proje/index',$bodyVeri,true);

        Import::masterPage($data,$head);
    }
    
    public function detay($id){
        
        $data["breadName"]  = array("Projeler","Detay");
        $data["breadUrl"]   = array("/projeler","/projeler/detay/$id");
        
        
        $head['title'] 	= 'Proje Detayı';
        /*
         *burada direkt veritabanı ile işlem yapacaz
         *ancak sonraki aşamalarda model kullanılacaktır.
         *amaç her kullanımı göstermek
         *siz model kullanımını kavradıktan sonra burayı model'e göre
         *kendiniz düzenlersiniz
         */
        
        //ilgili tablodan proje bilgilerini alıp bir değişkene atıyoruz
        $proje = DB::table("proje")->where("id=",$id)->get()->row();
        //eğer hatalı bir işlem denendi ise proje listesine gönderiyoruz
        if(DB::totalRows()==0){
            redirect("/projeler");
            exit;
        }
        
        //projenin olduğu değişkenide body'e göndereceğimiz tüm verilerin tutulduğu arrayde "proje" olarak tanımlıyoruz
        //application/views/proje/detay.php dosyasında çağırırken $proje olarak çağıracaz
        $bodyVeri["proje"] = $proje;
        
        //şimdi projenin sahibi olan müşterinin verilerini alalım
        $musteri = DB::table("musteri")->where("id=",$proje->musteriid)->get()->row();
        $bodyVeri["musteri"] = $musteri;
        
        
        //şimdide bu proje ait yapılan işlerin listesini alalım
        //burada yukarıdan farklı olarak direkt atama yapacaz, değişken kullanmadan
        //$bodyVeri["isler"] = DB::table("isler")->where("projeid=",$proje->id)->get()->result();
        //yukarıda direkt veritabanından verileri çekiyoruz, aşağıda ise modelimizden çekecez
        //aşağıdaki model application/models/isler.php
        $bodyVeri["isler"] = $this->isler->getByProje($proje->id);
        
        
        $data['body']   = Import::view('proje/detay',$bodyVeri,true);
        //masterpage çağırma işlemini yapıyoruz, buradaki ayarlar application/config/masterpage.php den yapılıyor
        //isterseniz ellede master page tanımlayabilirsiniz
        Import::masterPage($data,$head);
    }
    
    public function liste(){
        $projeler = DB::select()
         ->from('proje') 
         ->get(); 
        echo $projeler->resultJson();
    }
    
    
    public function musteri($id=0){
        if(is_numeric($id) && intval($id)>0){
            $projeler = $this->proje->listeByMusteri($id);
            $musteri = $this->musteri->get($id);
            $head["title"] = $musteri->ad . " Müşterisine ait Projeler";
            $data["breadName"]  = array("Projeler",$musteri->ad, "Proje Listesi");
            $data["breadUrl"]   = ARRAY("/".CURRENT_CONTROLLER,"/".CURRENT_CONTROLLER."/".CURRENT_CFUNCTION."/".$id,"");
            $bodyVeri["musteri"] = $musteri;
            $bodyVeri["projeler"] = $projeler;
            $data['body']   = Import::view('proje/index',$bodyVeri,true);

            Import::masterPage($data,$head);
        }else{
            redirect("/projeler",0,array("mesaj","<div class='alert alert-danger'>Projeye ulaşılamadı.</div>"));
        }
    }
    
    public function ekle($id=0){
        
        if(Method::post("kaydet")){
            //önce post ile gelen verilerimiz kontrol edecez
            Validation::rules("ad", array("required","minchar"=>2,"maxchar"=>100),"Proje Adı");
            Validation::rules('musteriid',array("required","numeric",'minchar' => '1'),"Müşteri");
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
        
        $head["title"] = "Proje Ekle";
        $plugin = array(Import::plugin("datetimepicker",false,true));
        
        $head["plugin"] = $plugin;
        $data["breadName"]  = array("Projeler","Proje Ekle");
        $data["breadUrl"]   = ARRAY("/".CURRENT_CONTROLLER,"");
        $musteriListesi = DB::table("musteri")->select("id,ad")->get()->result();
        $musteriList = array(""=>"Müşteri Seçin");
        
        foreach($musteriListesi as $musteri){
            $musteriList["".$musteri->id.""] = $musteri->ad;
        }
        $bodyVeri["musteriListesi"] = $musteriList;
        $bodyVeri["id"] = $id;
        $data['body']   = Import::view('proje/ekle',$bodyVeri,true);
        
        Import::masterPage($data,$head);
    }
    
    function c(){
       echo DataGrid::table('isler')
       // İşlemin yapılacağı sütun seçiliyor.
       // Kullanımı zorunlu değildir. Varsayılan: id
       ->processColumn('id') 
       // Tek bir sayfada görüntülenecek kayıt sayısı belirtiliyor.
       // Kullanımı zorunlu değildir. Varsayılan: 20
       ->limit(10) 
       // Tabloda görüntülenmesi istenilen sütun isimleri belirtiliyor.
       // Kullanımı zorunlu değildir.
       
       ->create();
    }
}