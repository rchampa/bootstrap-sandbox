<?php

echo CHtml::ajaxLink(
    'Test request',          // the link body (it will NOT be HTML-encoded.)
    array('bye/reqTest01'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
    array(
        'update'=>'#req_res'
    )
);
 
echo '<div id="req_res">...</div>';

?>
