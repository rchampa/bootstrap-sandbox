<?php
header("Content-Type: text/html;charset=utf-8");
class Protocolos {
   
    private $connection;
    
    public function __construct(){
        $this->connection=new CDbConnection(Yii::app()->db->connectionString,Yii::app()->db->username,Yii::app()->db->password);
        $this->connection->active=true;
//        $this->connection->charset = Yii::app()->db->charset;
//        $this->connection->initSQLs = Yii::app()->db->initSQLs;
    }
    
    public function num_protocolos($email_usuario){
        
        $sql="SELECT count(*) FROM protocolos where 1=1 and ";
        $sql.= "email_usuario='".$email_usuario."' ";
        $result_rows=$this->connection->createCommand($sql)->queryScalar();
        
        return $result_rows;
    }
    
    public function listar_protocolos($ini, $lenght, $email_usuario){
        
        $sql="SELECT * FROM protocolos where 1=1 and ";
        $sql.= "email_usuario='".$email_usuario."' ";
        $sql.=" LIMIT ".$ini.", ".$lenght;
        $result_rows=$this->connection->createCommand($sql)->queryAll();
        
        return $result_rows;
    }
    
    public function obtener_protocolo($id_protocolo, $email_usuario){
        
        $query_protocolo =    "SELECT * FROM protocolos WHERE ".
                    "id_protocolo=".$id_protocolo." AND ".
                    "email_usuario='".$email_usuario."'";
        
        $result_protocolo= $this->connection->createCommand($query_protocolo)->queryRow();
        $codigo = $result_protocolo['codigo_parseado'];
        
        
        $query_ct =    "SELECT ct.*
                    FROM protocolos p
                    INNER JOIN cajatexto ct ON ct.id_protocolo=p.id_protocolo
                    WHERE 
                    p.email_usuario='".$email_usuario."' AND 
                    p.id_protocolo=".$id_protocolo;
        
        $result_ct = $this->connection->createCommand($query_ct)->query();
        $lista_cajas = array();
        foreach($result_ct as $fila) {
            $id = $fila['id_caja_texto'];
            $tipo = $fila['tipo'];
            $contenido = $fila['contenido'];
            $caja = new Caja($id, $tipo, $contenido);
            array_push($lista_cajas, $caja);
        }
        
       
        $query_ch =    "SELECT ch.*
                    FROM protocolos p
                    INNER JOIN cajatexto_hijos ch ON p.id_protocolo=ch.id_protocolo
                    WHERE 
                    p.email_usuario='".$email_usuario."' AND 
                    p.id_protocolo=".$id_protocolo;
        
        $result_ch = $this->connection->createCommand($query_ch)->query();
        foreach($result_ch as $fila) {
            $id_hijo = $fila['id_hijo'];
            if($id_hijo!=0){
                $id_padre = $fila['id_padre'];
                $relacion = $fila['relacion'];
                $caja_hijo = $this->buscarCaja($lista_cajas, $id_hijo);
                $caja_hijo->setRelacion($relacion);
                $caja_padre = $this->buscarCaja($lista_cajas, $id_padre);
                $caja_hijo->addPadre($id_padre);
                
                if($caja_padre->getTipo()==0){//tipo normal
                     $caja_padre->completar();
                }
                else{//tipo 1: decision
                    if($relacion==0){//Si
                        $caja_padre->setHijoSi($id_hijo);
                    }
                    else if($relacion==1){//No
                        $caja_padre->setHijoNo($id_hijo);
                    }
                }
                
            }
            
        }
        
        $protocolo = new ProtocoloVO($lista_cajas, $codigo);
        
        return $protocolo;
        
    }
    
    
    private function buscarCaja($lista,$id){
        
        foreach($lista as $caja) {
            if($caja->getId()==$id){
                return $caja;
            }
        }
        return null;
    }

    public function crear_protocolo($json_info, $parser_code, $email_usuario){

        $transaction=$this->connection->beginTransaction();
        try
        {
            $data = json_decode($json_info);
            $nombre_protocolo= $data[0]->contenido;

            $sql="INSERT INTO protocolos (nombre_protocolo, email_usuario, codigo_parseado, creado_en) ";
            $sql.="VALUES ('".$nombre_protocolo."','".$email_usuario."','".$parser_code."',null)";

            $db = $this->connection->createCommand($sql);
            $row_count = $db->execute();
            $next_protocolo_id = $this->connection->getLastInsertID();
            
//            $sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'rescueincloud' AND TABLE_NAME = 'protocolos'";
//            $next_protocolo_id = $this->connection->createCommand($sql)->queryRow();
//            $next_protocolo_id = $next_protocolo_id['AUTO_INCREMENT'];
//
//            $sql = "SELECT LAST_INSERT_ID()";
//            $next_protocolo_id = $this->connection->createCommand($sql)->queryRow();
//            $next_protocolo_id = $next_protocolo_id['AUTO_INCREMENT'];



            

            /*
            "INSERT INTO `cajatexto` (`id_caja_texto`, `tipo`, `contenido`, `id_protocolo`) VALUES
            (0, 0, 'Nombre del protocolo', 1),
            (1, 1, '¿Una decisión de texto?', 1),
            (2, 1, 'una decision de con el número 5', 1),
            (3, 0, 'la respuesta al la decision con el id 2, la caja anterior', 1),
            (4, 0, 'una respuesta de 25kg', 1),
            (5, 0, 'una respuesta de 30 mg de peso', 1),
            (6, 0, 'un último texto', 1);";*/

            $sql="INSERT INTO cajatexto (id_caja_texto, tipo, contenido, id_protocolo) VALUES ";

            foreach ($data as $id => $caja) {

                $sql.="(".$caja->id.",".$caja->tipo.",'".$caja->contenido."',".$next_protocolo_id."),\n";

                foreach ($caja->padres as $id => $padre) {
                    $hijo_fila ="INSERT INTO cajatexto_hijos (id_protocolo, id_hijo, id_padre, relacion) VALUES \n";
                    $hijo_fila.="(".$next_protocolo_id.",".$caja->id.",".$padre.",".$caja->relacion.")";
                    $this->connection->createCommand($hijo_fila)->execute();
                }
            }

            $sql = substr($sql, 0, -2);
            $row_count = $this->connection->createCommand($sql)->execute();


            /**
             INSERT INTO `cajatexto_hijos` (`id`, `id_protocolo`, `id_hijo`, `id_padre`, `relacion`) VALUES
            (1, 1, 1, 0, 2),
            (2, 1, 2, 1, 0),
            (3, 1, 5, 1, 1),
            (4, 1, 3, 2, 0),
            (5, 1, 4, 2, 1),
            (6, 1, 6, 5, 2),
            (7, 1, 6, 4, 2);

             */
            $transaction->commit();
            
        }
        catch(Exception $e) // se arroja una excepción si una consulta falla
        {
            $transaction->rollBack();
        }
    }
    
    public function actualizar_protocolo($next_protocolo_id, $json_info, $parser_code, $email_usuario){

        $transaction=$this->connection->beginTransaction();
        try
        {
            $data = json_decode($json_info);
            $nombre_protocolo= $data[0]->contenido;

            $sql="UPDATE protocolos set ";
            $sql.="codigo_parseado='".$parser_code."', actualizado_en=null ";
            $sql.="WHERE email_usuario='".$email_usuario."' AND id_protocolo=".$next_protocolo_id;

            $db = $this->connection->createCommand($sql);
            $row_count = $db->execute();
            
            
            $sql="DELETE from cajatexto ";
            $sql.="WHERE id_protocolo=".$next_protocolo_id;

            $db = $this->connection->createCommand($sql);
            $row_count = $db->execute();
            
            $sql="DELETE from cajatexto_hijos ";
            $sql.="WHERE id_protocolo=".$next_protocolo_id;

            $db = $this->connection->createCommand($sql);
            $row_count = $db->execute();

            /*
            "INSERT INTO `cajatexto` (`id_caja_texto`, `tipo`, `contenido`, `id_protocolo`) VALUES
            (0, 0, 'Nombre del protocolo', 1),
            (1, 1, '¿Una decisión de texto?', 1),
            (2, 1, 'una decision de con el número 5', 1),
            (3, 0, 'la respuesta al la decision con el id 2, la caja anterior', 1),
            (4, 0, 'una respuesta de 25kg', 1),
            (5, 0, 'una respuesta de 30 mg de peso', 1),
            (6, 0, 'un último texto', 1);";*/

            $sql="INSERT INTO cajatexto (id_caja_texto, tipo, contenido, id_protocolo) VALUES ";

            foreach ($data as $id => $caja) {

                $sql.="(".$caja->id.",".$caja->tipo.",'".$caja->contenido."',".$next_protocolo_id."),\n";

                foreach ($caja->padres as $id => $padre) {
                    $hijo_fila ="INSERT INTO cajatexto_hijos (id_protocolo, id_hijo, id_padre, relacion) VALUES \n";
                    $hijo_fila.="(".$next_protocolo_id.",".$caja->id.",".$padre.",".$caja->relacion.")";
                    $this->connection->createCommand($hijo_fila)->execute();
                }
            }

            $sql = substr($sql, 0, -2);
            $row_count = $this->connection->createCommand($sql)->execute();


            /**
             INSERT INTO `cajatexto_hijos` (`id`, `id_protocolo`, `id_hijo`, `id_padre`, `relacion`) VALUES
            (1, 1, 1, 0, 2),
            (2, 1, 2, 1, 0),
            (3, 1, 5, 1, 1),
            (4, 1, 3, 2, 0),
            (5, 1, 4, 2, 1),
            (6, 1, 6, 5, 2),
            (7, 1, 6, 4, 2);

             */
            $transaction->commit();
            
        }
        catch(Exception $e) // se arroja una excepción si una consulta falla
        {
            $transaction->rollBack();
        }
    }
}

?>

