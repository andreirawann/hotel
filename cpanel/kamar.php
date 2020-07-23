<?php include "koneksi.php"; ?>
<h3>DATA KAMAR</h3>
<a href="<?php echo "?p=kamaradd";?>">Tambah Data Kamar
</a><p>
<?php
$sqlk = mysql_query("select distinct(idtipe) from kamar order by idtipe asc");
while($rk = mysql_fetch_array($sqlk)){
  $sqlt = mysql_query("select * from tipekamar where idtipe='$rk[idtipe]'");
  $rt = mysql_fetch_array($sqlt);
  echo "<h3>$rt[kdtipe] - $rt[namatipe]</h3>";
  $sqlkm = mysql_query("select * from kamar where idtipe='$rk[idtipe]'");
  echo "<div id='view1'><fieldset>";
  while($rkm = mysql_fetch_array($sqlkm)){
  if($rkm["status"]=="Kosong"){
	$bg = "#FFFFFF";
  }else if($rkm["status"]=="Booking"){
    $bg = "#2DFF62";
  }else if($rkm["status"]=="Terisi"){
    $bg = "#FF8C8C";
  }
  	echo "<div class='dh3' align='center'>";
    echo "<div id='view' style='background:$bg'><fieldset>";
	echo "$rkm[nokamar]<br>$rkm[status]";
    echo "</fieldset></div>";
	echo "</div>";
  }
  echo "</fieldset></div>";
}
?>
