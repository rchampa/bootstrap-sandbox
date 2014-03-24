<div class="row clearfix">
    <div class="col-md-2 column">
        <div style="height:1px; background: transparent;">
            <hr style="display:none;" />
        </div>
        <ul class="nav nav-pills nav-stacked">
          <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/protocolos/index"><i class="glyphicon glyphicon-user"></i> Lista</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-plus"></i> Crear protocolo</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-remove"></i> Eliminar protocolo</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-search"></i> Buscar protocolo</a></li>
        </ul>

    </div>
  
    <!-- TODO: 
        1. Enlazar los enlaces anteriores con su respectiva vista.
        2. Generar la tabla con datos reales.
    
        <tr class="active">
        <tr class="success">
        <tr class="warning">
        <tr class="danger">
        
    -->
    
    <div class="col-md-10 column">
        <div style="height:10px; background: transparent;">
            <hr style="display:none;" />
        </div>
        <table class="table table-hover table-bordered">
                    <thead>
                            <tr>
                                    <th>
                                            ID
                                    </th>
                                    <th>
                                            Nombre
                                    </th>
                                    <th>
                                            Descripción
                                    </th>
                            </tr>
                    </thead>
                    <tbody>
                                <?php
                                $i=0;
                                foreach($result_set as $dato)
                                {
                                    ?>
                                    <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $dato["nombre_protocolo"] ?></td>
                                     <td></td>
                                     </tr>
                                    <?php 
                                }
                                ?>
                               
                    </tbody>
            </table>
            <ul class="pagination pagination-sm">
                    <li>
                            <a href="#">Prev</a>
                    </li>
                    <li>
                            <a href="#">1</a>
                    </li>
                    <li>
                            <a href="#">2</a>
                    </li>
                    <li>
                            <a href="#">3</a>
                    </li>
                    <li>
                            <a href="#">4</a>
                    </li>
                    <li>
                            <a href="#">5</a>
                    </li>
                    <li>
                            <a href="#">Next</a>
                    </li>
            </ul>
    </div>
</div>