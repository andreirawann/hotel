<?php
include "koneksi.php";
$sqlt = mysql_query("select * from tipekamar where idtipe='$_GET[idt]'");
$rt = mysql_fetch_array($sqlt);
echo "<div class='dh12'>";
echo "<big>$rt[kdtipe] - $rt[namatipe] <p> Rp. $rt[harga]</big> per malam";
echo "<p>$rt[keterangan]";
echo "<p>";
if(!empty($rt['foto1'])){
	$foto1 = "<img src='fotokamar/$rt[foto1]' width='100%'>";
}
if(!empty($rt['foto2'])){
	$foto2 = "<img src='fotokamar/$rt[foto2]' width='100%'>";
}
if(!empty($rt['foto3'])){
	$foto3 = "<img src='fotokamar/$rt[foto3]' width='100%'>";
}
echo "<div class='dh4'>$foto1</div>";
echo "<div class='dh4'>$foto2</div>";
echo "<div class='dh4'>$foto3</div>";
echo "</div>";
echo "<p>&nbsp;</p><div class='dh4'><big>Fasilitas :</big> <br>$rt[fasilitas]</div>";
echo "<div class='dh8'><big>Kamar Yang Tersedia :</big> <br>";
$sqlk = mysql_query("select * from kamar where idtipe='$rt[idtipe]'");
while($rk = mysql_fetch_array($sqlk)){
	$sqlb = mysql_query("select * from booking where idkamar='$rk[idkamar]'");
	$rb = mysql_fetch_array($sqlb);
  	echo "<div class='dh3' align='center'>";
    echo "<div id='view'><fieldset>";
	echo "No. Kamar<p><big>$rk[nokamar]</big><p>$rk[status]";	
	  $btn = "<a href='?p=cekkamar&idm=$rm[idmember]&idt=$rt[idtipe]&idk=$rk[idkamar]'><button type='button' class='btn btn-more'>Cek Kamar</button></a>";
	echo "<b>$st</b>";
	
	if(!empty($_SESSION["usermbr"]) and !empty($_SESSION["passmbr"])){
    	echo "$btn";
	}else{
	  echo "<p>Booking? <a href='?p=login'>Login</a>";
	}echo "</fieldset></div>";
	echo "</div>";
}
echo "</div>";
?>