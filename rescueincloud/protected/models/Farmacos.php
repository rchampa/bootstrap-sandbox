<?php

class Farmacos {
   
    private $connection;
    
    public function __construct(){
        $this->connection=new CDbConnection(Yii::app()->db->connectionString,Yii::app()->db->username,Yii::app()->db->password);
        $this->connection->active=true;
    }
    
    public function listar_farmacos_propios($ini, $lenght, $email_usuario){
       
        $sql="SELECT fpr.* 
              FROM rel1n_farmacos_propios_usuarios rel,
                   farmacos_propios fpr
              WHERE fpr.id_farmaco = rel.id_farmaco
                AND rel.email_usuario = '".$email_usuario."'";
        $sql.=" LIMIT ".$ini.", ".$lenght;
        $result_rows=$this->connection->createCommand($sql)->queryAll();
        
        return $result_rows;
    }
    
}

?>

