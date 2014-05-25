
<div style="height:20px; background: transparent;">
    <hr style="display:none;" />
</div>

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
                            Descripción
                    </th>
                    <th>
                            Opciones
                    </th>
            </tr>
    </thead>
    <tbody>
            <tr class="active">
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
                                <td><?php echo $dato["descripcion_farmaco"] ?></td>
                                <td>
                                    <?php $id=$dato["id_farmaco"] ?>
                                    <a href="<?php echo Yii::app()->createUrl('/farmacos/eliminar/'.$id)?>">
                                       <i class="glyphicon glyphicon-remove-circle"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php 
                        }
                        ?>
            </tr>
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