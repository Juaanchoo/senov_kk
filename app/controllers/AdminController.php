<?php

class AdminController extends Controller
{
    private $adminModel;
    function __construct(){
        Security::auth('Administrador');
        $this->adminModel = $this->model("admin");
    }
    public function index(){
        
        $this->view('admin/home');
    }

    public function estado_novedad(){
        $this->view('admin/estado_novedad');
    }

    public function usuario()
    {
        $this->view('admin/habilitar_user');
    }

    public function logout(){
        unset($_SESSION['user']);
        session_destroy();
        header('location: '.URL_APP.'/');
    } 
}