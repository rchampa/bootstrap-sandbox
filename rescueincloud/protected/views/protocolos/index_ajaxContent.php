

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
                                <?php   
                                    echo CHtml::ajaxLink(
                                        $id, // The text for the anchor tag
                                        Yii::app()->createUrl('/protocolos/editar/'.$id), // The url for the ajax request
                                        array( // The ajaxOptions (jQuery stuff)
                                                'update' => '#partial' // Page will output json to parse
                                        )
                                    );
                                        
                                 ?>
                                </td>
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
