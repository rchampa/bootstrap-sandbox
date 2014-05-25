<?php

class Farmacos {
   
    private $connection;
    
    public function __construct(){
        $this->connection=new CDbConnection(Yii::app()->db->connectionString,Yii::app()->db->username,Yii::app()->db->password);
        $this->connection->active=true;
    }
    
    public function listar_farmacos_usuario($ini, $lenght, $email_usuario){
       
        $sql="SELECT Pro.*
              FROM farmacos_propios                Pro,
                   rel1n_farmacos_propios_usuarios PrU
              WHERE Pro.id_farmaco    = PrU.id_farmaco
                AND PrU.email_usuario = '".$email_usuario."'

              UNION 

              SELECT Pub.*
              FROM farmacos_publicos                Pub,
                   relnm_farmacos_publicos_usuarios PuU
              WHERE Pub.id_farmaco = PuU.id_farmaco
                AND PuU.email_usuario = '".$email_usuario."'";
        $sql.=" LIMIT ".$ini.", ".$lenght;
        $result_rows=$this->connection->createCommand($sql)->queryAll();
        
        return $result_rows;
    }
    
    public function listar_farmacos_publicos($ini, $lenght, $email_usuario){
       
        $sql="SELECT NEW.*
              FROM 
              farmacos_publicos NEW,
              ( 
                SELECT Pro.*
                FROM farmacos_propios                Pro,
                     rel1n_farmacos_propios_usuarios PrU
                WHERE Pro.id_farmaco    = PrU.id_farmaco
                  AND PrU.email_usuario = '".$email_usuario."'

                UNION 

                SELECT Pub.*
                FROM farmacos_publicos                Pub,
                     relnm_farmacos_publicos_usuarios PuU
                WHERE Pub.id_farmaco = PuU.id_farmaco
                  AND PuU.email_usuario = '".$email_usuario."'
              )NotNEW
              WHERE NEW.id_farmaco           <> NotNEW.id_farmaco
                AND NEW.nombre_farmaco       <> NotNEW.nombre_farmaco
                AND NEW.nombre_fabricante    <> NotNEW.nombre_fabricante
                AND NEW.presentacion_farmaco <> NotNEW.presentacion_farmaco
                AND NEW.tipo_administracion  <> NotNEW.tipo_administracion";
        $sql.=" LIMIT ".$ini.", ".$lenght;
        $result_rows=$this->connection->createCommand($sql)->queryAll();
        
        return $result_rows;
    }
    
    
    public function add_rel_farmacos_publicos($id_farmaco, $no_farmaco, $no_fabricante, $presentacion, $tipo_admin, $des_farmaco, $email_usuario){
        $transaction=$this->connection->beginTransaction();
        try
        {
            $sqlRel="INSERT INTO relnm_farmacos_publicos_usuarios VALUES ('".$email_usuario."', ".$id_farmaco.", now(), '0000-00-00 00:00:00');";  
            $commandRel=$this->connection->createCommand($sqlRel);
            $row_countRel = $commandRel->execute();
            
        } catch (Exception $ex) 
        {
            $transaction->rollBack();
        }
    }
    
    
    
    public function add_rel_farmacos_propios($id_farmaco, $no_farmaco, $no_fabricante, $presentacion, $tipo_admin, $des_farmaco, $email_usuario){
        
        $res = $this->insertar_farmaco_propio($no_farmaco, $no_fabricante, $presentacion, $tipo_admin, $des_farmaco, $email_usuario);
          
    }
    
    
    
    public function insertar_farmaco_propio($nombre_farmaco, $nombre_fabricante, $presentacion_farmaco, $tipo_administracion, $descripcion_farmaco, $email_usuario){
        
        $transaction=$this->connection->beginTransaction();
        try
        {
            $sql="INSERT INTO farmacos_propios (id_farmaco, nombre_farmaco, nombre_fabricante, presentacion_farmaco, tipo_administracion, creado_en, modificado_en, descripcion_farmaco, borrado)";
            $sql.="VALUES (NULL,'".$nombre_farmaco."','".$nombre_fabricante."','".$presentacion_farmaco."','".$tipo_administracion."', now(), '0000-00-00 00:00:00','".$descripcion_farmaco."', '0')"; 
            
            $command=$this->connection->createCommand($sql);
            $row_count = $command->execute();
            
            if ($row_count == 1) {
                $id_farmaco = $this->connection->getLastInsertID();
                
                $sqlRel="INSERT INTO rel1n_farmacos_propios_usuarios VALUES ('".$email_usuario."', ".$id_farmaco.", now(), '0000-00-00 00:00:00');";  
                $commandRel=$this->connection->createCommand($sqlRel);
                $row_countRel = $commandRel->execute();
            }
                                 
            $transaction->commit();
                       
        }
        catch(Exception $e) // se arroja una excepción si una consulta falla
        {
            $transaction->rollBack();
        }
    }
}

?>

