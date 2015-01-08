<?php
/*
 * @author   Joakim Persson (jope)
 */
function select($cols, $table, $where = null)
{
    global $wpdb;
    $sql = $wpdb->get_results("SELECT $cols
                                FROM $table
                                $where ");
    if ($sql) {
        return $sql;
    } else {
        exit('<center><p>Fel select' . mysql_error() . '</p></center>');
    }
}

function updateRoom($room, $mid)
{
    global $wpdb;
    $telalt = $room['meta_tel_alt'];
    $sql = $wpdb->query("UPDATE medlem
                          SET rumtelalt = '" . mysql_real_escape_string($room['meta_tel_alt']) ."'
                          WHERE ID = $mid");
    if (!$sql) {
        exit('<center><p>Fel: updateRoom ' . mysql_error() . '</p></center>');
    }
}

function updateRoomTxt($room, $mid)
{
    global $wpdb;
    $roomTxt = $room['meta_text'];
    $sql = $wpdb->query("UPDATE medlem
                          SET rumtext = '$roomTxt'
                          WHERE ID = $mid");
    if (!$sql) {
        exit('<center><p>Fel: updateRoomTxt ' . mysql_error() . '</p></center>');
    }
}

function wallpaperSelection($sex)
{
    if ($sex == 'herr') {
        $arrWp = array('brown', 'green', 'grey');
    } elseif ($sex == 'dam') {
        $arrWp = array('red', 'yellow', 'purple');
    } else {
        return 'blue';
    }
    $wallpaper = array_rand($arrWp, 1);
    return $arrWp[$wallpaper];
}

function ageCalculator($golfId)
{
    $birthDate = '19' . substr($golfId, 0, 2) . '-' . substr($golfId, 2, 2) . '-' . substr($golfId, 4, 2);
    $birthDate = explode("-", $birthDate);
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[0], $birthDate[1]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));
    return $age;
}

function imageUpload($mid)
{
    // Check if filename exists
    global $wpdb;
    $loadName = true;
    if ($wpdb->get_var("SELECT foto FROM medlem WHERE ID = " . $mid . "") != '') {
        $loadName = false;
    }

    $target_dir = getcwd() . "/wp-content/themes/ifeature/images/members/room_photo/";
    $temp = explode(".", $_FILES["fileToUpload"]["name"]);
    $newfilename = $_POST["picName"] . '.' . strtolower(end($temp));
    $target_file = $target_dir . $newfilename;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $imageFileTypeG = strtolower($imageFileType);
    // Check if image file is a actual image or fake image
    if (isset($_POST["upload"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

        if ($check !== false) {
            $uploadOk = 1;
        } else {
            
            return "Filen är ingen bild.";
            
        }
    }

    // Allow certain file formats
    if ($imageFileTypeG != "jpg" && $imageFileTypeG != "png" && $imageFileTypeG != "jpeg" && $imageFileTypeG != "gif") {
        return "Tyvärr, endast JPG, JPEG,<br />PNG & GIF är tillåtet.";
    } else {
        // Resizing the image
        if ($check[0] > 200 || $check[1] > 250) {
            if ($imageFileTypeG == "jpg" || $imageFileTypGe == "jpeg") {
                $uploadedfile = $_FILES["fileToUpload"]["tmp_name"];
                $src = imagecreatefromjpeg($uploadedfile);
            } else if ($imageFileTypeG == "png") {
                
                $uploadedfile = $_FILES["fileToUpload"]["tmp_name"];
                $src = imagecreatefrompng($uploadedfile);
            } else {
                $src = imagecreatefromgif($uploadedfile);
            }
            list($width, $height) = getimagesize($uploadedfile);
            if ($check[0] > 200) {
                $newwidth = 200;
                $newheight = ($height / $width) * $newwidth;
            
                if ($newheight > 250 ) {
                    $newheight = 250;
                    $newwidth = ($newwidth / $newheight) * $newheight;
                }
            }
            if ( $check[1] > 250 && $check[0] < 201) {
                $newheight = 250;
                $newwidth = ($width / $height) * $newheight;
            }
            
            $tmp = imagecreatetruecolor($newwidth, $newheight);

            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            imagejpeg($tmp, $target_file, 100);
            imagedestroy($src);
            imagedestroy($tmp);
            if ($loadName) {
                global $wpdb;
                $sql_rz = $wpdb->query("UPDATE medlem
                                         SET foto = '" . $newfilename . "'
                                         WHERE ID = " . $mid . "");
                if (!$sql_rz) {
                    exit('<center><p>Fel: upload imagename rz' . mysql_error() . '</p></center>');
                }
            }
            $uploadOk = 0;
            $resized = true;
        }
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0 && !$resized) {
        return "Tyvärr, ingen bild laddades upp.";
        // if everything is ok, try to upload file
    } else if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            if ($loadName) {
                global $wpdb;
                $sql = $wpdb->query("UPDATE medlem
                                      SET foto = '" . $newfilename . "'
                                      WHERE ID = " . $mid . "");
                if (!$sql) {
                    exit('<center><p>Fel: upload imagename  ' . mysql_error() . '</p></center>');
                }
            }
        } else {
            return "Opps, något gick snett.";
        }
    }
}

function imageDelete($mid)
{
    global $wpdb;
    $img = $wpdb->get_var("SELECT foto FROM medlem WHERE ID = " . $mid . "");
    $sql = $wpdb->query("UPDATE medlem
                         SET foto = ''
                         WHERE ID = " . $mid . "");
    if (!$sql) {
        exit('<center><p>Fel: delete imagename  ' . mysql_error() . '</p></center>');
    }
    
    $target_dir = getcwd() . "/wp-content/themes/ifeature/images/members/room_photo/" . $img;
    if (file_exists($target_dir)) {  
        unlink( $target_dir );
    }
    
}