<?
class musteri extends Controller{
    public $id;
    public $ad;
    public $yetkili;
    public $email;
    public $telefon;
    public $websitesi;
    public $gsm;
    public $adres;
    public $projesayisi;
    public $maliyet;
    public $alinan;
    public $kalan;
    
    
    function get($id){
        $result = new musteri();
        $kayit = DB::query("select *,
                           (select count(id) from proje where musteriid=$id) projesayisi,
                           (select sum(maliyet) from isler where musteriid=$id) maliyet,
                           (select sum(alinan) from isler where musteriid=$id) alinan
                           from musteri where id = $id")
                          ->row();
        if(DB::totalRows()>0){
            $result->id         = $kayit->id;
            $result->ad         = $kayit->ad;
            $result->yetkili    = $kayit->yetkili;
            $result->email      = $kayit->email;
            $result->telefon    = $kayit->telefon;
            $result->websitesi  = $kayit->websitesi;
            $result->gsm        = $kayit->gsm;
            $result->adres      = $kayit->adres;
            $result->projesayisi= $kayit->projesayisi;
            $result->maliyet    = $kayit->maliyet;
            $result->alinan     = $kayit->alinan;
            $result->kalan      = $kayit->maliyet - $kayit->alinan;
        }
        return $result;
    }
    
    function liste($sort = "desc"){
        $return = array();
        $kayitlar = DB::query("select *,
                           (select count(id) from proje where musteriid=musteri.id) projesayisi,
                           (select sum(maliyet) from isler where musteriid=musteri.id) maliyet,
                           (select sum(alinan) from isler where musteriid=musteri.id) alinan
                           from musteri order by id $sort")
                          ->result();
        if(DB::totalRows()>0){
            foreach($kayitlar as $kayit){
                $result = new musteri();
                $result->id         = $kayit->id;
                $result->ad         = $kayit->ad;
                $result->yetkili    = $kayit->yetkili;
                $result->email      = $kayit->email;
                $result->telefon    = $kayit->telefon;
                $result->websitesi  = $kayit->websitesi;
                $result->gsm        = $kayit->gsm;
                $result->adres      = $kayit->adres;
                $result->projesayisi= $kayit->projesayisi;
                $result->maliyet    = $kayit->maliyet;
                $result->alinan     = $kayit->alinan;
                $result->kalan      = intval($kayit->maliyet) - intval($kayit->alinan);
                array_push($return,$result);
            }
        }
        return $return;
    }
    
    
    function ekle($veriler = array()){
        $return = DB::duplicateCheck()->table("musteri")
            ->column("ad",$veriler["ad"])
            ->column("yetkili",$veriler["yetkili"])      
            ->column("gsm",$veriler["gsm"])
            ->column("telefon",$veriler["telefon"])
            ->column("email",$veriler["email"])
            ->column("websitesi",$veriler["websitesi"])
            ->column("adres",$veriler["adres"])
            ->insert();
        if($return){
            return DB::insertId();
        }else{
            return 0;
        }
    }
    
    function duzenle($id,$veriler = array()){
        $return = DB::table("musteri")
            ->where("id=",$id)
            ->column("ad",$veriler["ad"])
            ->column("yetkili",$veriler["yetkili"])      
            ->column("gsm",$veriler["gsm"])
            ->column("telefon",$veriler["telefon"])
            ->column("email",$veriler["email"])
            ->column("websitesi",$veriler["websitesi"])
            ->column("adres",$veriler["adres"])
            ->update();
        return boolval($return);
    }
    
    function sil($id){
        
        //eğer bir müşteri siliniyorsa buna ait olan proje ve işleride silecez
        try{
            DB::where("id=",$id)->delete("musteri");
            DB::where("musteriid=",$id)->delete("proje");
            DB::where("musteriid=",$id)->delete("isler");
            return "0";
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
