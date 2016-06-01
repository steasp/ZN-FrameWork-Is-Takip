<?
class proje extends Controller{
    public $id;
    public $musteriid;
    public $musteri;
    public $ad;
    public $aciklama;
    public $tarih;
    public $baslamatarihi;
    
    function get($id){
        $return = new proje();
        $proje = DB::table("proje")->where("id=",$id)->row();
        if($proje->totalRows()>0){
            $return->id             = $proje->id;
            $return->musteriid      = $proje->musteriid;
            $return->musteri        = $this->musteri->get($proje->musteriid);
            $return->ad             = $proje->ad;
            $return->aciklama       = $proje->aciklama;
            $return->tarih          = $proje->tarih;
            $return->baslamatarihi  = $proje->baslamatarihi;
        }
        
        return $return;
    }
    
    function liste(){
        $result = array();
        
        $projeler = DB::table("proje")->result();
        
        foreach($projeler as $proje){
            $return = new proje();
            $return->id             = $proje->id;
            $return->musteriid      = $proje->musteriid;
            $return->musteri        = $this->musteri->get($proje->musteriid);
            $return->ad             = $proje->ad;
            $return->aciklama       = $proje->aciklama;
            $return->tarih          = $proje->tarih;
            $return->baslamatarihi  = $proje->baslamatarihi;
            array_push($result,$return);
        }
        return $result;
    }
    
    function listeByMusteri($id){
        $result = array();
        
        $projeler = DB::table("proje")->where("musteriid=",$id)->get()->result();
        if(DB::totalRows()>0){
            foreach($projeler as $proje){
                $musteri = new musteri();
                
                $return = new proje();
                $return->id             = $proje->id;
                $return->musteriid      = $proje->musteriid;
                $return->musteri        = $musteri->get($proje->musteriid);
                $return->ad             = $proje->ad;
                $return->aciklama       = $proje->aciklama;
                $return->tarih          = $proje->tarih;
                $return->baslamatarihi  = $proje->baslamatarihi;
                array_push($result,$return);
            }
        }
        return $result;
    }
}
