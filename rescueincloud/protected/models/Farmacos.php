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
    
    public function listar_farmacos_publicos($ini, $lenght, $email_usuario){
       
        $sql="SELECT pub.* 
              FROM farmacos_publicos pub 
              LEFT JOIN 
                    (
                      SELECT fpr.* 
                        FROM rel1n_farmacos_propios_usuarios rel,
                             farmacos_propios fpr
                       WHERE fpr.id_farmaco = rel.id_farmaco
                         AND rel.email_usuario = '".$email_usuario."'
                    ) pro 
                     ON pub.nombre_farmaco       = pro.nombre_farmaco
                    AND pub.nombre_fabricante    = pro.nombre_fabricante
                    AND pub.presentacion_farmaco = pro.presentacion_farmaco
                    AND pub.tipo_administracion  = pro.tipo_administracion
              WHERE pro.id_farmaco is NULL";
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

