<?php

class LoginController extends Controller
{
    private $loginModel;

	function __construct(){
		$this->loginModel = $this->model('login'); 
    }
    
    public function index(){
        if (isset($_POST['dni'],$_POST['password'])) {
            $documento = $this->cleanData($_REQUEST['dni']);
            $password = $this->cleanData($_REQUEST['password']);
            
            $user = $this->loginModel->show($documento);
            if (!empty($user)) {
                if ($password === $user->password) {
                    
                    Security::create_auth($user);
                    
                }else{
                    $this->addIntento($user->documento);
                    echo '<b>Error:</b> Contraseña incorrecta.';
                }
            }else{
                echo '<b>Error:</b> El usuario no existe.';
            }
        }else{
            header('Location:'.URL_APP.'/');
        }
		
    }
    
    private function addIntento($dni){
        echo $dni;
    }


}
