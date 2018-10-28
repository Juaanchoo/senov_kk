<?php 

class UserController extends Controller
{
	private $UserModel;

	function __construct(){
        Security::auth('Usuario');
    }

	public function index(){
		
		echo "Usuario";
	}

		
}	