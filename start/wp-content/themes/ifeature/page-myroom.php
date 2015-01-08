<?php
$mid = $_SESSION["ch"]['id'];
if ( isset( $_POST['meta_club'] ) ) {
   updateRoom( $_POST, $mid );
}

if ( isset( $_POST['meta_text'] ) ) {
   updateRoomTxt( $_POST, $mid );
}

if ( isset($_POST['delete'] ) ) {
    $imageDelete = imageDelete($mid);
} else if ( isset($_FILES['fileToUpload'] ) ) {
    $imageUpload = imageUpload($mid);
}

$room = select("fornamn, efternamn, ort, hcp, klubb, golfid, tel_hem, tel_mob, rumtelalt, epost, rumsite, foto, rumtext,rumtel, rumalder, rumepost,rumhcp, sex",
                "medlem",
                "WHERE id='" . $mid . "'");
?>
<div id="bard"></div>
<div id="sg-room">
    <div id="cc" class="room-head">
        I det här rummet bor <br /><?php echo $room[0]->fornamn . ' ' . $room[0]->efternamn . ' från ' . $room[0]->ort;?>
    </div>
    <div class="box-wrapper">
        <div style="cursor: default;" class="box box-two-thirds">
           
        <?php
        $c = 'checked="checked"';
        $u = '';
        echo '<form method="post" action="">Jag är medlem i <input type="text" name="meta_club" value="' . $room[0]->klubb . '"/>';
        if ( $room[0]->rumhcp == '0')  { $hcpCh0 = $c; $hcpCh1 = $u; } else { $hcpCh0 = $u; $hcpCh1 = $c; }
        echo '<br /><br /> <input type="radio" name="meta_hcp" ' . $hcpCh1 .'" value="1"> och jag har ' . $room[0]->hcp . ' i hcp.<br />'; 
        echo '<input type="radio" name="meta_hcp" ' . $hcpCh0 .'" value="0"> och jag har ett skapligt hcp.'; 
        if ( $room[0]->rumalder == '0') { $ageCh0 = $c; $ageCh1 = $u; } else { $ageCh0 = $u; $ageCh1 = $c;}
        echo '<br /><br /><input type="radio" name="meta_age"  ' . $ageCh1 .'" value="1"> Jag är ' . ageCalculator($room[0]->golfid) . ' år,<br />';
        echo '<input type="radio" name="meta_age" ' . $ageCh0 .'" value="0"> Jag är i mina bästa år,'; 
        echo ' och du kontaktar mig genom att ringa på ';
        if ( $room[0]->rumtel == '0') { $telCh0 = $c; $telCh1 = $u; } else { $telCh0 = $u; $telCh1 = $c;}
        echo '<br /><br /><input type="radio" name="meta_tel" ' . $telCh1 .'" value="1"> ' . $room[0]->tel_mob  . '<br />';
        echo '<input type="radio" name="meta_tel" ' . $telCh0 .'" value="0"> ---<br />';
        echo 'alternativt <input type="text" name="meta_tel_alt" value="' . $room[0]->rumtelalt . '"><br /><br />';
        echo '<input type="submit" value="Spara"/></form>';
        ?>
        </div>
        <div style="cursor: default;" class="box box-one-third">
        <?php
        if ($room[0]->foto) {
            echo '<div class="photo"><img src="' . get_template_directory_uri() . '/images/members/room_photo/' .  $room[0]->foto . '" alt="Plats för foto"/></div><br />';
        } else {
            echo '<div class="photo"><img src="' . get_template_directory_uri() . '/images/members/room_photo/noPhoto.jpg" alt="Plats för foto"/></div><br />';
        }
        if ( isset($imageUpload) ) { echo '<div class="error">' . $imageUpload . '</div>'; }
        echo '<br />';
        ?>
        
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" class="uploadInput" name="fileToUpload" id="fileToUpload"><br /><br />
            <input type="hidden" name="picName" value="medlem_<?php echo $mid;?>"/>
            <input type="submit" value="Skicka upp" name="upload">
            <?php if ($room[0]->foto) { ?>
                &nbsp;&nbsp;<input type="submit" value="Ta bort" name="delete">
            <?php } ?>
        </form>
    </div>
        <div class="clr"></div>
    </div>
    </div>
<div class="room-foot">
    <div class="room-txt">
        <form method="post" id="roomTxt" action="">
            <textarea style="width:95%;" rows="4" name="meta_text"><?php echo $room[0]->rumtext;?></textarea>
        <input type="submit" value="Spara" />
        </form>
    </div>
</div>
<?php

$wpc = wallpaperSelection($room[0]->sex);
$wpcm = wallpaperTextMatch($wpc);

?>
<script>
    document.getElementById('sg-room').style.backgroundImage = "url('<?php echo get_template_directory_uri(); ?>/images/members/wallpaper-<?php echo $wpc;?>.jpg')";
    document.getElementById('bard').style.backgroundImage = "url('<?php echo get_template_directory_uri(); ?>/images/members/bard-<?php echo $wpc;?>.jpg')";
    document.getElementById('cc').style.color = '<?php echo $wpcm;?>';
</script>