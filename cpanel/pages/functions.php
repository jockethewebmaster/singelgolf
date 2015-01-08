<?php

$dbcnx = @mysql_connect('31.220.20.83', 'u269503889_qelep', 'meWyGubapa');
mysql_set_charset('utf8',$dbcnx);
$db = @mysql_select_db('u269503889_wyxuq');


function getEvents() {
    
    $sql = mysql_query("SELECT id, event, event_abr FROM events");
    
    if (!$sql) { exit('<center><p>Fel (getEvents): ' . mysql_error() . '</p></center>'); }
    
    while ($row = mysql_fetch_assoc($sql)) { 
            $arrEvents[] = $row;
        }
        
        return $arrEvents;
        
}

function getEventName($id) {
    
    $sql = mysql_query("SELECT event, event_abr FROM events WHERE id = '$id'");
    
    if (!$sql) { exit('<center><p>Fel (getEventName): ' . mysql_error() . '</p></center>'); }
    
    while ($row = mysql_fetch_assoc($sql)) { 
            $getEventName[] = $row;
        }
        
        if (isset($getEventName)) { return $getEventName; }
        
}

function getImgText($id) {
    
    $sql = mysql_query("SELECT txt, num, gid FROM events WHERE gid = '$id'");
    
    if (!$sql) { exit('<center><p>Fel (getImgText): ' . mysql_error() . '</p></center>'); }
    
    while ($row = mysql_fetch_assoc($sql)) { 
            $arrImgText[] = $row;
        }
        
        if (isset($arrImgText)) { 
            
            foreach ( $arrImgText as $key => $value ) {
                $arrText[$arrImgText[$key]['num']] = $arrImgText[$key]['txt'];
            }
            return $arrText; }
        
}