<?php 

/**
 * @author Kevin Galindo - kjgalindo06@misena.edu.co
 */
class DataBase
{
	private $pdo;
	private $stmt;
	

	//Ejecuta la conexion hacia la base de datos.
	function __construct(){
		try {
			$cnx = new PDO("mysql:host=localhost;dbname=senov;charset=utf8","root",null);
			$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $cnx;
		} catch (PDOException $e) {
			die('<b>Failure to Connect the DB: </b>'.$e->getMessage());
		}
	}

	//Prepara la consulta sql
	public function query($sql = null){
		try {
			$this->stmt = $this->pdo->prepare($sql);
		} catch (PDOException $e) {
			die('<b>Fail: </b>'.$e->getMessage());
		}
	}

	//Agrega los parametros a la consulta
	public function bind($param, $value, $type = null){
		if (empty($type)) {
			switch (true) {
				case is_int($value):
					$tipo = PDO::PARAM_INT;
				break;
				case is_bool($value):
					$tipo = PDO::PARAM_BOOL;
				break;
				case is_null($value):
					$tipo = PDO::PARAM_NULL;
				break;				
				default:
					$tipo = PDO::PARAM_STR;
				break;
			}
		}
		$this->stmt->bindParam($param,$value,$type);
	} 


	//Ejecuta La consulta 
	public function execute(){
		return $this->stmt->execute();
	}

	//Retorna todas las filas de la tabla
	public function getAll(){
		$this->stmt->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	//Retorna una fila de la tabla
	public function getOne(){
		$this->stmt->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	//Retorna el numero de filas de la tabla
	public function rowCount(){
		return $this->stmt->rowCount();	
	}



}