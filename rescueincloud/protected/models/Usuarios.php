<?php
//header('Content-Type: text/html; charset=utf-8');

class Usuarios {
    private $connection;
    
    
    public function __construct(){
        $this->connection=new CDbConnection(Yii::app()->db->connectionString,Yii::app()->db->username,Yii::app()->db->password);
        $this->connection->active=true;
    }
    
    //Read
    public function validarUsuarios($email_usuario, $pass){
        
        $sql="select * from usuarios where 1=1 and ";
        $sql.= "email_usuario='".$email_usuario."' and ";     
        $sql.= "password='".$pass."' ;";     
        $rows=$this->connection->createCommand($sql)->queryAll();
        if(count($rows)>0){
            return true;
        }
        else{
            return false;
        }
        
    }
    
    
    public function registrarUsuario($email_usuario, $password, $nombre, $apellidos,
            $genero,$fecha_nac, $centro){
        /**
         * INSERT INTO `ems`.`usuarios` 
         * (`email_usuario`, `password`, `nombre`, `apellidos`, `genero`, `fecha_nacimiento`, 
         * `centro_trabajo`, `usuario_creado_en`, `usuario_actualizado_en`, `borrado`) 
         * VALUES 
         * ('admin', 'admin', 'admin', 'admin', '0', '2010-01-01', 'ucm fdi', 
         * '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0');
         */
        
        $sql="INSERT INTO usuarios ";
        $sql.= "( email_usuario, password, nombre, apellidos, genero, fecha_nacimiento, centro_trabajo, usuario_creado_en) ";
        $sql.= "VALUES ";
        $sql.= "( '".$email_usuario."','".$password."','".$nombre."','".
                $apellidos."',".$genero.",'".$fecha_nac."','".$centro."', null ) ";
        $rows=$this->connection->createCommand($sql)->execute();
        if(count($rows)>0){
            return true;
        }
        else{
            return false;
        }
        
    }
  
    
}

?>
