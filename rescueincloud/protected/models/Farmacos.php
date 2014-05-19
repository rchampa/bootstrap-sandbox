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
    
    public function listar_farmacos_publicos($ini, $lenght){
       
        $sql="SELECT pub.* 
              FROM farmacos_publicos pub 
              LEFT JOIN farmacos_propios pro 
                     ON pub.id_farmaco = pro.id_farmaco
              WHERE pro.id_farmaco is NULL";
        $sql.=" LIMIT ".$ini.", ".$lenght;
        $result_rows=$this->connection->createCommand($sql)->queryAll();
        
        return $result_rows;
    }
    
    public function add_farmacos_propios($data,$email_usuario){
        
        return 999;
    }
    
    public function insertar_farmaco($json_info, $email_usuario){

        $transaction=$this->connection->beginTransaction();
        try
        {
            $data = json_decode($json_info);
            $nombre_farmaco= $data[0]->contenido;
            $nombre_fabricante= $data[1]->contenido;
            $presentacion_farmaco= $data[2]->contenido;
            $tipo_administracion= $data[3]->contenido;
            $descripcion_farmaco= $data[4]->contenido;
            
            $sql="INSERT INTO farmacos_propios (id_farmaco, nombre_farmaco, nombre_fabricante, presentacion_farmaco, tipo_administracion, creado_en, modificado_en, descripcion_farmaco, borrado)";
            $sql.="VALUES (NULL,'".$nombre_farmaco."','".$nombre_fabricante."','".$presentacion_farmaco."','".$tipo_administracion."', now(), '0000-00-00 00:00:00','".$descripcion_farmaco."', '0')"; 
            
            /*$sql.="VALUES (NULL, ?, ?, ?, ?, now(), '0000-00-00 00:00:00', ?, '0' )";
            //$sql.="VALUES ('".$nombre_protocolo."','".$email_usuario."','".$parser_code."',null)";

            
            $command=$this->connection->createCommand($sql);
            $command-> bindValue(1,$_POST["Farmacos"]["nombre_farmaco"],PDO::PARAM_STR);
            $command-> bindValue(2,$_POST["Farmacos"]["nombre_fabricante"],PDO::PARAM_STR);
            $command-> bindValue(3,$_POST["Farmacos"]["presentacion_farmaco"],PDO::PARAM_STR);
            $command-> bindValue(4,$_POST["Farmacos"]["tipo_administracion"],PDO::PARAM_STR);
            $command-> bindValue(5,$_POST["Farmacos"]["descripcion_farmaco"],PDO::PARAM_STR);
        
            die($sql);*/
                
            $command=$this->connection->createCommand($sql);
            $row_count = $command->execute();
            die( ${nombre_farmaco});
            $transaction->commit();
            
        }
        catch(Exception $e) // se arroja una excepción si una consulta falla
        {
            $transaction->rollBack();
        }
    }
    
    
    
    
}

?>

