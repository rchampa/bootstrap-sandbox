

<table class="table table-hover table-bordered">
            <thead>
                    <tr>
                        <th>
                        ID
                        </th>
                        <th>
                        Nombre del protocolo
                        </th>
                    </tr>
            </thead>
            <tbody>
                        <?php
                        foreach($result_set as $dato)
                        {
                            $id = $dato["id_protocolo"];
                            ?>
                            <tr>
                                <td>
                                    <a href="<?php echo Yii::app()->createUrl('/protocolos/editar/'.$id)?>">
                                        <?php echo $id ?>
                                    </a>
                                </td>
                            <td><?php echo $dato["nombre_protocolo"] ?></td>
                             </tr>
                            <?php 
                        }
                        ?>

            </tbody>
    </table>
<ul class="pagination pagination-sm">
        
        <?php
            $num_pag = 1;
            $num_paginas = ceil($num_protocolos/8);//la funcion ceil redondea hacia arriba
            
            $pag_actual = 1;
            if($this->accion==="pagina"){
                $pag_actual = $num_pagina;
            }
            
            if($pag_actual!=1){
        ?>
                <li><a href="<?php echo Yii::app()->createUrl('/protocolos/paginar/'.($pag_actual-1))?>">Anterior</a></li>
        <?php
            }
            
            while($num_pag<=$num_paginas){
        ?>
                
                    <?php
                    if($num_pag==$pag_actual){
                    ?>
                        <li class="active"><a href="#" ><?php echo $num_pag ?></a></li>
                        
                    <?php
                    }
                    else{
                        
                    ?>
                        <li><a href="<?php echo Yii::app()->createUrl('/protocolos/paginar/'.$num_pag)?>">
                            <?php echo $num_pag ?>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                
        <?php
                $num_pag = $num_pag +1;
            }
            
            if($pag_actual!=$num_paginas){
        ?>
                <li><a href="<?php echo Yii::app()->createUrl('/protocolos/paginar/'.($pag_actual+1))?>">Siguiente</a></li>
        <?php
            }
        ?>
</ul>
