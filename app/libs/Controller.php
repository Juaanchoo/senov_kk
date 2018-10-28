<?php

class Controller 
{
    protected function view($v,$data = [],$respuesta=null){
        $title = explode('/',$v);
        $title = ucwords($title[1]);

        if(file_exists('../app/views/'.strtolower($v).'.php')){
            include_once '../app/views/all/header.php';
            #--
                if (isset($_SESSION['user'])) { require_once sidebar_p1;}
            #--
            include_once '../app/views/'.strtolower($v).'.php';
            #--
                if (isset($_SESSION['user'])) { require_once sidebar_p2;}
            #--
            include_once '../app/views/all/footer.php';
        }else{
            die('<b>Message:</b> 404 - View not found.');
        }
    }
//ya weee porfavoooo >:v

    protected function model($m){
        $m = ucwords($m).'Model';
        if(file_exists('../app/models/'.$m.'.php')){
            include_once '../app/models/'.$m.'.php';
            return new $m;
        }else{
            die('<b>Message:</b> 404 - Model not found.');
        }
    }

    protected function cleanData($data){
        $data = trim($data);
        $data = filter_var($data,FILTER_SANITIZE_STRING);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
       
        return $data;
    }
}
