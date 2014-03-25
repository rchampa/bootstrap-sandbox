
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
