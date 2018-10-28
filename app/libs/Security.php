<?php 

class Security
{
    public function __construct()
    {
        
    }

    public static function auth($permiso){
        try{
            if (isset($_SESSION['user'])) {
                $autorizado = false;
    
                if (in_array($permiso,$_SESSION['user']->permisos)) {
                    $autorizado = true;
                }
    
                if(!$autorizado){
                    switch ($_SESSION['user']->permisos[0]) {
                        case 'Administrador':
                            header('location: '.URL_APP.'/admin');
                        break;
                        case 'Usuario':
                            header('location: '.URL_APP.'/user');
                        break;
                        default:
                            header('location: '.URL_APP.'/');
                        break;
                    }
                }
    
    
    
            }else{
    
                $url = isset($_REQUEST['url']) ? explode('/',$_REQUEST['url']) : null;
                if (!empty($url)) {
                    if ($url[0] != 'home') {
                        header('location: '.URL_APP.'/');   
                    }
                    
                }
            }
        }catch(Exception $e){
            die($e->getMessage());
        }
        
      
    }

    public static function create_auth($user = null){
    	if (!empty($user)) {
    		unset($user->password);
    		$_SESSION['user'] = $user;
            $cargo = $_SESSION['user']->permisos[0];

            switch ($cargo) {
                case 'Administrador':
                    header('location: '.URL_APP.'/admin');
                break;
                case 'Usuario':
                    header('location: '.URL_APP.'/user');
                break;
                default:
                    header('location: '.URL_APP.'/');
                break;
            }   

    	}
    }


}