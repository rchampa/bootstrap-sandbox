
<div style="height:20px; background: transparent;">
    <hr style="display:none;" />
</div>
<h6>
    <b> · Lista de Mis notas: </b>
</h6>
</h6>
<h6 style="color:#A4A4A4;">
    Haz click en el botón de la derecha para editarlas.
</h6>
<div style="height:10px; background: transparent;">
    <hr style="display:none;" />
</div>

<table class="table table-hover table-bordered">
    <thead>
            <tr>
                    <th>
                            Nombre Nota
                    </th>
                    <th>
                            Descripción
                    </th>
                    <th>
                            Fecha de creación
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
                                <td><?php echo $dato["nombre_nota"] ?></td>
                                <td><?php echo $dato["descripcion"] ?></td>
                                <td><?php echo $dato["nota_creada_en"] ?></td>
                                <td>
                                    <?php $id=$dato["id_nota"] ?>
                                    <!--
                                    <a href="<?php //echo Yii::app()->createUrl('/notas/editar/'.$id)?>">
                                       <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    -->
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