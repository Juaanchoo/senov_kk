<?php

class HomeController extends Controller
{
    private $loginModel;

	function __construct(){
        Security::auth('');
		$this->loginModel = $this->model('login'); 
    }

    public function index(){
    	
        $this->view('home/home');
    }

    public function registrar(){
  
        if(isset($_POST["dni"])){
            if(isset($_POST["tipo_documento"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_POST["telefono"]) && isset($_POST["password"]) && $_POST["password"] == $_POST["password2"]){
                $info_usuario = array(
                    'tipo_documento'=> $this->cleanData($_POST["tipo_documento"]),
                    'dni'=> $this->cleanData($_POST["dni"]),
                    'nombre'=> $this->cleanData($_POST["nombre"]),
                    'apellido'=> $this->cleanData($_POST["apellido"]),
                    'telefono'=> $this->cleanData($_POST["telefono"]),
                    'email'=> $this->cleanData($_POST["email"]), 
                    'password'=> $this->cleanData($_POST["password"])
                );
                $respuesta =  $this->loginModel->registrar($info_usuario);
                $data = $this->loginModel->all_tipo_documento();
                $this->view('home/registro',$data,$respuesta);
            }else { 
            //devolver diferente respuesta
            $respuesta = "<script>swal({
				type: 'error',
				title: 'Opps..',
				text: 'Error en lo datos del registro',
              })</script>";
              $this->view('home/registro',null, $respuesta);
            }
        }else{
            $data = $this->loginModel->all_tipo_documento();
            $this->view('home/registro',$data);
        }
          
    }


    
    public function login(){
        if (isset($_POST['dni'],$_POST['password'])) {
            
            $documento = $this->cleanData($_POST['dni']);
            $password = $this->cleanData($_POST['password']);
            
            $user = $this->loginModel->show($documento);
            if (!empty($user)) {
                if ($password === $user->password) {
                    
                    if ($this->loginModel->resetIntentos($user->documento)) {
                        Security::create_auth($user);
                    } else {
                        echo '<b>Error 500: </b> se produjo un error en el lado del servidor';
                    }
                                      
                }else{
                    $this->addIntento($user->documento);
                }
            }else{
                $error = [
                    'error' => 'El usuario no existe en el sitio.'
                ];
                $this->view('home/home',$error);
            }
        }else{
            header('Location:'.URL_APP.'/');
        }
		
    }
    
    private function addIntento($id){
        $user = $this->loginModel->sumarIntento($id);
        if ($user) {
            if ($user->intentos < 3) {
                $error = [
                    'error' => 'La contraseña es incorrecta. Intentelo de nuevo.'
                ];
                $this->view('home/home',$error);
            } else {
                echo 'Olvido su contraseña? trate de restablecerla.';
            }
            
        }else{
            echo 'Error de la Database';
        }
    }

}




