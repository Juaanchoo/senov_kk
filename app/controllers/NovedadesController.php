<?php

class NovedadesController extends controller
{

    private $novedadModel;

	function __construct(){
		$this->novedadModel = $this->model('novedades'); 
    }

    public function index(){
        $novedades = $this->novedadModel->all();

        echo json_encode(['novedades' => $novedades]);
    }
}

