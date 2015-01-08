<?php
$mid = $_SESSION["ch"]['id'];
if ( isset( $_POST['meta_save'] ) ) {
   updateAccount( $_POST, $mid );
}
$mem = select('*','medlem','WHERE ID="' . $mid . '"'); 
$validity = membershipLeft(substr($mem[0]->datum_tom,0,10));
//$barDisplay = barDisplay(substr($mem[0]->datum_tom,0,10));
$barDisplay = barDisplay('2015-03-24');
$c = 'checked="checked"';
$u = '';
?>
<div class="accHead"><b>Medlemskonto för <?php echo $mem[0]->fornamn . '  ' . $mem[0]->efternamn;?></b><br /><br />
Ditt medlemskap gäller t.o.m <?php echo $validity;?> dagar.<br /><br />
<div class="bar-text">
    <span class="left"><?php echo date('Y-m-d');?></span>
    <span class="middle">&nbsp;</span>
    <span class="right"><?php echo date('Y-m-d', strtotime('+1 year'));?></span>
</div>
<div class="bar-green" style="width:<?php echo $barDisplay['green'];?>%;"></div><div class="bar-red" style="width:<?php echo $barDisplay['red'];?>%;"></div>
<form method="post" action="">
    <div class="box box-one-third bg-green-full">
        Ska andra medlemmar kunna söka på ditt hcp? &nbsp;
        <?php if ( $mem[0]->hcp_nja == '0')  { $h0 = $c; $h1 = $u; } else { $h0 = $u; $h1 = $c; }?>
        Ja <input type="radio" name="meta_hcp_nja" <?php echo $h1;?> value="1">
        Nej <input type="radio" name="meta_hcp_nja" <?php echo $h0;?> value="0"><br /><br />
        Ska andra medlemmar kunna spana på dig med GolfPartnerFinnaren Slaghöken? &nbsp;
        <?php if ( $mem[0]->hawk == '0')  { $h0 = $c; $h1 = $u; } else { $h0 = $u; $h1 = $c; }?>
        Ja <input type="radio" name="meta_hawk" <?php echo $h1;?> value="1">
        Nej <input type="radio" name="meta_hawk" <?php echo $h0;?> value="0">
    
    </div>
    <div class="box box-one-third bg-green">
        Förnamn<br />
        <input type="text" name="meta_fornamn" value="<?php echo $mem[0]->fornamn;?>"><br />
        Efternamn<br />
        <input type="text" name="meta_efternamn" value="<?php echo $mem[0]->efternamn;?>"><br />
        Adress<br />
        <input type="text" name="meta_adress" value="<?php echo $mem[0]->adress;?>"><br />
        Postnummer<br />
        <input type="text" name="meta_postnummer" value="<?php echo $mem[0]->postnummer;?>"><br />
        Ort<br />
        <input type="text" name="meta_ort" value="<?php echo $mem[0]->ort;?>"><br />
    </div>
    <div class="box box-one-third bg-green">
        Telefon hem<br />
        <input type="text" name="meta_tel_hem" value="<?php echo $mem[0]->tel_hem;?>"><br />
        Telefon arbete<br />
        <input type="text" name="meta_tel_arb" value="<?php echo $mem[0]->tel_arb;?>"><br />
        Telefon mobil<br />
        <input type="text" name="meta_tel_mob" value="<?php echo $mem[0]->tel_mob;?>"><br />
        Epost<br />
        <input type="text" name="meta_epost" value="<?php echo $mem[0]->epost;?>"><br />
    </div>
    <div class="box box-one-third bg-green">
        Klubb<br />
        <input type="text" name="meta_klubb" value="<?php echo $mem[0]->klubb;?>"><br />
        AnvändareId<br />
        <input type="text" name="meta_anvid" value="<?php echo $mem[0]->anvid;?>"><br />
        Lösenord<br />
        <input type="text" name="meta_losen" value="<?php echo $mem[0]->losen;?>"><br />
        Hcp<br />
        <input type="text" name="meta_hcp" value="<?php echo $mem[0]->hcp;?>"><br />
    </div>
    <div><input type="submit" style="margin-left:40px;" name="meta_save" value="Spara"/></div>
</form
