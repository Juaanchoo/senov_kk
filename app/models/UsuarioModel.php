<?php 
/**
 * 
 */

class UsuarioModel extends DataBase
{
    private $db;
    protected $table = 'usuarios_admin';

	function __construct(){
		$this->db = new DataBase();
    }

    public function all(){
        $sql = "SELECT ua.documento,ua.nombre,ua.apellido,ua.email,ua.telefono, td.tipo_documento 
                FROM usuarios_admin AS ua 
                INNER JOIN tipo_documento AS td 
                ON ua.fk_id_tipo_documento = td.id_tipo_documento 
                WHERE ua.estado = ?";

        $this->db->query($sql);
        $this->db->bind(1,1);
        return $this->db->getAll();

    }
    

	
}