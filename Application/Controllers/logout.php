<?
class logout extends Controller{
	function __construct(){
        
        
            Session::deleteAll();
            redirect('login');
    
        
    }
    
}