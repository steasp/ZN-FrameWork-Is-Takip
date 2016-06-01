<?
class isler extends Controller{
    public $id;
    public $adminid;
    public $admin;
    public $projeid;
    public $musteriid;
    public $tarih;
    public $baslama;
    public $bitis;
    public $aciklama;
    public $maliyet;
    public $alinan;
    /*
     *ID'si verilen işi getirir tek başına
     *@id (int) iş id'si
     */
    public function get($id){
        /*
         *standart class tanımlaması yapıyoruz
         *aşağıda sadece bir fork var oda zincirleme
         *.net kullananlar buna alışıktır zaten Nesne.IkinciNesne.IkinciNesneninOzelligi gibi
         *bunu adminde yapıyoruz. bu işi yapan adminin bilgilerini $this->admin'e atıyoruz
         *$is = new isler() $isimiz = $is->get(1) tanımlamasından sonra
         *$isimiz->admin->username şeklinde bu işi yapan adminin application/models/admin.php de tanımlanan
         *tüm verilerine ulaşabiliyoruz. ancak bunu sadece get() gibi tekli sonuç veren yerlerde kullanmamız
         *gerekmektedir. yoksa çok kayıt çektiğimizde sistemi çok yorabilir
         */
        $is = new isler();
        $result = DB::table("isler")->where("id=",$id)->get()->row();
        $is->id = $result->id;
        $is->adminid = $result->adminid;
        $is->admin = $this->admin->get($result->adminid);
        $is->projeid = $result->projeid;
        $is->musteriid = $result->musteriid;
        $is->tarih = $result->tarih;
        $is->baslama = $result->baslama;
        $is->bitis = $result->bitis;
        $is->aciklama = $result->aciklama;
        $is->maliyet = $result->maliyet;
        $is->alinan = $result->alinan;
        return $is;
    }
    
    public function getByProje($projeid){
        $return = [];//array(); ile aynı şey
        
        $results = DB::where("projeid=",$projeid)->get("isler")->result();
        foreach($results as $result){
            $admin = new admin();
            $is = new isler();
            $is->id = $result->id;
            $is->admin = $admin->get($result->adminid);
            $is->projeid = $result->projeid;
            $is->musteriid = $result->musteriid;
            $is->tarih = $result->tarih;
            $is->baslama = $result->baslama;
            $is->bitis = $result->bitis;
            $is->aciklama = $result->aciklama;
            $is->maliyet = $result->maliyet;
            $is->alinan = $result->alinan;
            
            array_push($return,$is);
        }
        return $return;
    }
}
