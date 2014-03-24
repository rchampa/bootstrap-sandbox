
<h1>Listado de Notas de intervención </h1>
<ul>
    <?php
    foreach($result_set as $dato)
    {
        ?>
        <li><?php echo "Nombre: " . $dato["nombre_protocolo"] ?></li>
        <?php        
    }
    ?>
</ul>