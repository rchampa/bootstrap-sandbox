<?php
 
 
 /*
	Codes and messages
	===== === ========
	By default an unknow problem wil be -1.
	
	-1	Unknown problem.
        100     usuario valido
        101     usuario o contraseña invalida
  *     102     usuario o contraseña no proporcionadas
        ...
  *
  *     200     OK
  *

	
*/
 
header("Content-Type: text/html;charset=utf-8");

class DB_Functions {

    private $db;
    private $con;
 
    //put your code here
    // constructor
    function __construct() {
        include_once './db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->con = $this->db->connect();
    }
 
    // destructor
    function __destruct() {
    }


    public function lista_farmacos($email, $password){

            $sql = $this->con->prepare('
            SELECT EXISTS(SELECT 1 FROM usuarios WHERE email_usuario = ? )');
            $sql->execute(array($email));

            $username_exists = (bool) $sql->fetchColumn();
            if(!$username_exists){
                $result=array("code"=>"101", "message"=>"usuario invalido");
                return $result;
            }

            $sql = $this->con->prepare('
            SELECT f.*
            FROM relnm_farmacos_publicos_usuarios fu
            INNER JOIN usuarios u ON fu.email_usuario=u.email_usuario
            INNER JOIN farmacos_publicos f ON f.id_farmaco=fu.id_farmaco
            WHERE u.email_usuario=?');

            $sql->execute(array($email));
            $filas = $sql->fetchAll();

            $result=array("code"=>"200", "message"=>$filas);
            return $result;

    }

    public function lista_notas($email,$password){

            $sql = $this->con->prepare('
            SELECT EXISTS(SELECT 1 FROM usuarios WHERE email_usuario = ? )');
            $sql->execute(array($email));

            $username_exists = (bool) $sql->fetchColumn();
            if(!$username_exists){
                $result=array("code"=>"101", "message"=>"usuario invalido");
                return $result;
            }

            $sql = $this->con->prepare('
            SELECT * FROM notas WHERE email_usuario = ?');

            $sql->execute(array($email));
            $filas = $sql->fetchAll();

            $result=array("code"=>"200", "message"=>$filas);
            return $result;

    }


    public function lista_protocolos($email,$password){

            $sql = $this->con->prepare('
            SELECT EXISTS(SELECT 1 FROM usuarios WHERE email_usuario = ? )');
            $sql->execute(array($email));

            $username_exists = (bool) $sql->fetchColumn();
            if(!$username_exists){
                $result=array("code"=>"101", "message"=>"usuario invalido");
                return $result;
            }

            $sql = $this->con->prepare('
            SELECT ct.*
            FROM protocolos p
            INNER JOIN cajatexto ct ON ct.id_protocolo=p.id_protocolo
            WHERE p.email_usuario=?');

            $sql->execute(array($email));
            $cajas = $sql->fetchAll();

            $sql = $this->con->prepare('
            SELECT ch.*
            FROM protocolos p
            INNER JOIN cajatexto_hijos ch ON p.id_protocolo=ch.id_protocolo
            WHERE
            p.email_usuario=?');

            $sql->execute(array($email));
            $relaciones = $sql->fetchAll();

            $message = array("cajas"=>$cajas, "relaciones"=>$relaciones);

            $result=array("code"=>"200", "message"=> $message);
            return $result;

    }

    public function close(){
            $this->con = null;
    }
	
		
}
 
?>


