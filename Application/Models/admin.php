<?
class admin extends Controller{
    public $id;
    public $username;
    public $email;
    public $aktif;
    public $banned;
    public $durum;
    
    public function get($id){
        $admin = DB::get("admin")->where("id=",$id)->row();
        $result = new admin();
        if(isset($admin) && $admin!=null && count($admin)>0){
            $result->id         = $admin->id;
            $result->username   = $admin->username;
            $result->email      = $admin->email;
            $result->aktif      = $admin->active == 1 ? true : false;
            $result->banned     = $admin->banned == 1 ? true : false;
            $result->durum      = $admin->activation == 1 ? true : false;
        }
        return $result;
    }
    
    public function getList(){
        $adminler = DB::get("admin")->result();
        $return = array();
        if(isset($adminler) && $admin!=null && count($admin)>0){
            foreach($adminler as $admin){
                $result             = new admin();
                $result->id         = $admin->id;
                $result->username   = $admin->username;
                $result->email      = $admin->email;
                $result->aktif      = $admin->active == 1 ? true : false;
                $result->banned     = $admin->banned == 1 ? true : false;
                $result->durum      = $admin->activation == 1 ? true : false;
                array_push($return,$result);
            }
        }
        return $return;
    }
}