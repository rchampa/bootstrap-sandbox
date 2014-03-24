<?php

class Protocolos {
   
    private $connection;
    
    public function __construct(){
        $this->connection=new CDbConnection(Yii::app()->db->connectionString,Yii::app()->db->username,Yii::app()->db->password);
        $this->connection->active=true;
    }
    
    public function listar_protocolos($ini, $lenght, $email_usuario){
        
        $sql="SELECT * FROM protocolos where 1=1 and ";
        $sql.= "email_usuario='".$email_usuario."' ";
        $sql.=" LIMIT ".$ini.", ".$lenght;
        $result_rows=$this->connection->createCommand($sql)->queryAll();
        
        return $result_rows;
    }
    
}

?>

