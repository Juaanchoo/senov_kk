<?php 
/**
 * 
 */
class UserModel extends DataBase
{
	private $db;

	function __construct(){
		$this->db = new DataBase();
	}
	
}