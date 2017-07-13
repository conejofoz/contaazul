<?php
class loginController extends controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function indexxxx(){
        $data = array();
        
        $this->loadView('login', $data);
    }
    
    public function index(){
        $data = array(
            'error' => ''
        );
        if(isset($_POST['email']) && !empty($_POST['email'])){
            $email = addslashes($_POST['email']);
            $pass = addslashes($_POST['password']);
            $u = new Users();
            if($u->doLogin($email, $pass)){
                //$_SESSION['cliente'] = $usuario->getId($email);
                header("Location: ".BASE_URL);
                exit;
            } else {
                $data['error'] = "Acesso negado.";
            }
        }
        //$this->loadTemplate('login', $data);
        $this->loadView('login', $data);
    }
    
    public function logout(){
        $u = new Users();
        $u->logout();
        header("Location: ".BASE_URL);
    }
}

?>
