<?php

include_once('functions.php');

$arrEvents = getEvents();
echo '<div style="margin-top:25px;">';
echo '<form method="post" action="#gallery"><select name="events" onchange="this.form.submit()">';
echo '<option selected="selected">Välj resa</option>';
foreach ($arrEvents as $key => $value) {
    echo '<option value=' . $arrEvents[$key]['id'] . '>' . $arrEvents[$key]['event'] . '</option>';
}
echo '</select></form></div>';

    
if (isset($_POST['events'])) {
        
    $arrName = getEventName($_POST['events']);
    
    $arrText = getImgText($_POST['events']);
 
    $url = '../start/wp-content/themes/ifeature/images/events/';
    
    echo '<form method="post" action="">';
    for ( $i = 1; $i < 499; $i++ ) {
        
        if ( file_exists( $url . $arrName[0]['event_abr'] . '/' . $i . '.jpg') ) {
            
            $imgTxt = ( isset($arrText[$i]) ? $arrText[$i] : 'Text till bild ' . $i );
            echo '<div class="thumb-load"><span class="thumb-box"><img src = "' . $url . $arrName[0]['event_abr'] . '/' . $i . '.jpg"></span><input type = "submit" value=">>" /> &nbsp;<input type="text" size="190" name= "bild_' . $i. '" value="' . $imgTxt . '" /></div>';
            
        } else {
            
           $i = 500;
            
        }
    }
    echo '</form>';
}


