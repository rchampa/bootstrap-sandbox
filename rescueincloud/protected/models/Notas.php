<?php

class Notas {
   
    private $connection;
    
    public function __construct(){
        $this->connection=new CDbConnection(Yii::app()->db->connectionString,Yii::app()->db->username,Yii::app()->db->password);
        $this->connection->active=true;
    }
    
    public function listar_notas_usuario($ini, $lenght, $email_usuario){
        
        $sql="SELECT *
              FROM notas
              WHERE borrado       = 0
                AND email_usuario = '".$email_usuario."'";
        
        $sql.=" LIMIT ".$ini.", ".$lenght;
        $result_rows=$this->connection->createCommand($sql)->queryAll();
        
        return $result_rows;
    }
    
}

?>

