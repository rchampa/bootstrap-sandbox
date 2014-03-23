<?php
//header('Content-Type: text/html; charset=utf-8');

class Usuarios {
    private $connection;
    
    
    public function __construct(){
        $this->connection=new CDbConnection(Yii::app()->db->connectionString,Yii::app()->db->username,Yii::app()->db->password);
        $this->connection->active=true;
    }
    
    //Read
    public function validarUsuarios($email_usuario){
        
        $sql="select * from usuarios where 1=1 and ";
        $sql.= "email_usuario='".$email_usuario."' ;";     
        $rows=$this->connection->createCommand($sql)->queryAll();
        if(count($rows)>0){
            return true;
        }
        else{
            return false;
        }
        
    }
  
    
}

?>
