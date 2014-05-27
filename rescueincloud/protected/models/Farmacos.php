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
                AND PrU.borrado       = 0
                AND PrU.email_usuario = '".$email_usuario."'

              UNION 

              SELECT Pub.*
              FROM farmacos_publicos                Pub,
                   relnm_farmacos_publicos_usuarios PuU
              WHERE Pub.id_farmaco    = PuU.id_farmaco
                AND PuU.borrado       = 0
                AND PuU.email_usuario = '".$email_usuario."'";
        $sql.=" LIMIT ".$ini.", ".$lenght;
        $result_rows=$this->connection->createCommand($sql)->queryAll();
        
        return $result_rows;
    }
    
    public function listar_farmacos_publicos($ini, $lenght, $email_usuario){
       
        $sql="SELECT NEW.*
              FROM 
                farmacos_publicos NEW
              LEFT JOIN
              ( 
                SELECT Pro.*
                FROM farmacos_propios                Pro,
                     rel1n_farmacos_propios_usuarios PrU
                WHERE Pro.id_farmaco    = PrU.id_farmaco
                  AND PrU.borrado       = 0
                  AND PrU.email_usuario = '".$email_usuario."'

                UNION 

                SELECT Pub.*
                FROM farmacos_publicos                Pub,
                     relnm_farmacos_publicos_usuarios PuU
                WHERE Pub.id_farmaco    = PuU.id_farmaco
                  AND PuU.borrado       = 0
                  AND PuU.email_usuario = '".$email_usuario."'
              )NotNEW
                 ON NEW.id_farmaco           = NotNEW.id_farmaco
                AND NEW.nombre_farmaco       = NotNEW.nombre_farmaco
                AND NEW.nombre_fabricante    = NotNEW.nombre_fabricante
                AND NEW.presentacion_farmaco = NotNEW.presentacion_farmaco
                AND NEW.tipo_administracion  = NotNEW.tipo_administracion
                AND NEW.creado_en            = NotNEW.creado_en
                AND NEW.modificado_en        = NotNEW.modificado_en
                AND NEW.descripcion_farmaco  = NotNEW.descripcion_farmaco
                AND NEW.borrado              = NotNEW.borrado
              WHERE NotNEW.id_farmaco IS NULL";
        $sql.=" LIMIT ".$ini.", ".$lenght;
        $result_rows=$this->connection->createCommand($sql)->queryAll();
        
        return $result_rows;
    }
    
    
    public function add_rel_farmacos_publicos($id_farmaco, $no_farmaco, $no_fabricante, $presentacion, $tipo_admin, $des_farmaco, $email_usuario){
        $transaction=$this->connection->beginTransaction();
        try
        {
            $sqlRel="INSERT INTO relnm_farmacos_publicos_usuarios VALUES ('".$email_usuario."', ".$id_farmaco.", now(), '0000-00-00 00:00:00', 0);";  
            $commandRel=$this->connection->createCommand($sqlRel);
            $row_countRel = $commandRel->execute();
            
            $transaction->commit();
            
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
                
                $sqlRel="INSERT INTO rel1n_farmacos_propios_usuarios VALUES ('".$email_usuario."', ".$id_farmaco.", now(), '0000-00-00 00:00:00', 0);";  
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
    
    public function obtener_farmaco ($id, $email_usuario) {
        $transaction=$this->connection->beginTransaction();
        try
        {
            // En caso de que sea público, cuando se haya editado se almacena como propio.
            // Y se desvincula el fármaco público del usuario marcándolo como borrado.
            if ($id < 10000 ){ // se trata de un fármaco público
                
                $sql="SELECT Pub.*
                      FROM farmacos_publicos                Pub,
                           relnm_farmacos_publicos_usuarios PuU
                      WHERE Pub.id_farmaco = PuU.id_farmaco
                        AND Pub.id_farmaco = ".$id." 
                        AND PuU.email_usuario = '".$email_usuario."'";
            } 
            // En caso de que sea propio, se modifica directamente.
            else {
                $sql="SELECT Pro.*
                      FROM farmacos_propios                Pro,
                           rel1n_farmacos_propios_usuarios PrU
                      WHERE Pro.id_farmaco    = PrU.id_farmaco
                        AND Pro.id_farmaco = ".$id."
                        AND PrU.email_usuario = '".$email_usuario."'";
            }
            
            $command=$this->connection->createCommand($sql);
            $row_count = $command->queryAll();
                        
            $transaction->commit();
            
            return $row_count[0];
            
        } catch (Exception $ex) 
        {
            $transaction->rollBack();
        }
         
    }
             
    public function editar_farmaco($id_farmaco, $nombre_farmaco, $nombre_fabricante, $presentacion_farmaco, $tipo_administracion, $descripcion_farmaco, $email_usuario) {
        $transaction=$this->connection->beginTransaction();
        try
        {
            // En caso de que sea público, cuando se haya editado se almacena como propio.
            // Y se desvincula el fármaco público del usuario marcándolo como borrado.
            if ($id_farmaco < 10000 ){ // se trata de un fármaco público            
                //desvinculamos el fármaco público del usuario marcándolo como borrado:
                $sql="UPDATE relnm_farmacos_publicos_usuarios 
                      SET borrado = 1 
                      WHERE id_farmaco    = ".$id_farmaco." 
                        AND email_usuario = '".$email_usuario."';";
                $command=$this->connection->createCommand($sql);
                $row_count = $command->execute();
                
                // El fármaco público editado se inserta como fármaco propio.
                $sqlIns="INSERT INTO farmacos_propios (id_farmaco, nombre_farmaco, nombre_fabricante, presentacion_farmaco, tipo_administracion, creado_en, modificado_en, descripcion_farmaco, borrado)";
                $sqlIns.="VALUES (NULL,'".$nombre_farmaco."','".$nombre_fabricante."','".$presentacion_farmaco."','".$tipo_administracion."', now(), '0000-00-00 00:00:00','".$descripcion_farmaco."', '0')"; 

                $commandIns=$this->connection->createCommand($sqlIns);
                $row_countIns = $commandIns->execute();

                if ($row_countIns == 1) {
                    $id_farmaco = $this->connection->getLastInsertID();

                    $sqlRel="INSERT INTO rel1n_farmacos_propios_usuarios VALUES ('".$email_usuario."', ".$id_farmaco.", now(), '0000-00-00 00:00:00', 0);";  
                    $commandRel=$this->connection->createCommand($sqlRel);
                    $row_countRel = $commandRel->execute();
                }
            } 
            // En caso de que sea propio, se modifica directamente.
            else {
                $sql="UPDATE farmacos_propios 
                      SET nombre_farmaco       = '".$nombre_farmaco."', 
                          nombre_fabricante    = '".$nombre_fabricante."', 
                          presentacion_farmaco = '".$presentacion_farmaco."', 
                          tipo_administracion  = '".$tipo_administracion."',
                          modificado_en        = NOW(),
                          descripcion_farmaco  = '".$descripcion_farmaco."' 
                      WHERE id_farmaco    = ".$id_farmaco.";";
                $command=$this->connection->createCommand($sql);
                $row_count = $command->execute();
                
            }
            $transaction->commit();
                       
        } catch (Exception $ex) 
        {
            $transaction->rollBack();
        }
        
    }
    
}

?>

