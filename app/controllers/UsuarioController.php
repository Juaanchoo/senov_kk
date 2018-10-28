<?php

class UsuarioController extends controller
{

    private $model;

	function __construct(){
		$this->model = $this->model('usuario'); 
    }

    public function index(){
        $usuarios = $this->model->all();

        echo json_encode(['usuarios' => $usuarios]);
    }
}

