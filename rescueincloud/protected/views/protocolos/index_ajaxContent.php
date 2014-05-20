

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
                                <td><a href="<?php echo Yii::app()->createUrl('/protocolos/editar/'.$id) ?>"><?php echo $id ?></a></td>
                            <td><?php echo $dato["nombre_protocolo"] ?></td>
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
