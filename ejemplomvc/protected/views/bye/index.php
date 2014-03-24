<?php

echo CHtml::ajaxLink(
    'Mostrar hora',          // the link body (it will NOT be HTML-encoded.)
    array('bye/mostrarhora'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
    array(
        'update'=>'#div_id'
    )
);

echo "<br>";

echo CHtml::ajaxLink(
    'Ocultar hora',          // the link body (it will NOT be HTML-encoded.)
    array('bye/ocultarhora'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
    array(
        'update'=>'#div_id'
    )
);
 
echo '<div id="div_id">...</div>';
?>
