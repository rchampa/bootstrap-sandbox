<div id="partial">
<div style="height:20px; background: transparent;">
    <hr style="display:none;" />
</div>
<h6>
    <b> · Fármacos públicos encontrados: </b>
</h6>
<div style="height:10px; background: transparent;">
    <hr style="display:none;" />
</div>

    <table class="table table-hover table-bordered">
        <thead>
                <tr>
                        <th>
                                Nombre Fármaco
                        </th>
                        <th>
                                Nombre Fabricante
                        </th>
                        <th>
                                Presentación Fármaco
                        </th>
                        <th>
                                Tipo Administración
                        </th>
                        <th>
                                
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
                        <td><?php echo $dato["nombre_farmaco"] ?></td>
                        <td><?php echo $dato["nombre_fabricante"] ?></td>
                        <td><?php echo $dato["presentacion_farmaco"] ?></td>
                        <td><?php echo $dato["tipo_administracion"] ?></td>
                        <td>
                            <!--
                            <a href="<?php// echo Yii::app()->request->baseUrl; ?>/farmacos/index" class="btn btn-block btn-xs btn-primary">
                                <img src="<?php// echo Yii::app()->request->baseUrl; ?>/img/AddFarmacosIcon.png">
                                Añadir a Mis Fármacos
                            </a>
                            -->
                            <?php 
                                echo CHtml::ajaxLink(
                                        '<i class="glyphicon glyphicon-user"></i> Listar protocolos', // The text for the anchor tag
                                        Yii::app()->createUrl('/farmacos/actualizar'), // The url for the ajax request
                                        array( // The ajaxOptions (jQuery stuff)
                                                'data' => $dato["id_farmaco"],
                                                'update' => '#partial'
                                        )
                                );
                            ?>
                        </td>
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