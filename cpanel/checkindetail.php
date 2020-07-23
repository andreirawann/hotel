<?php
include "koneksi.php";
$sqlb = mysql_query("select * from booking where kdbooking='$_GET[kdb]'");
$rb = mysql_fetch_array($sqlb);
$sqlm = mysql_query("select * from member where idmember='$rb[idmember]'");
$rm = mysql_fetch_array($sqlm);
$sqlt = mysql_query("select * from tipekamar where idtipe='$rb[idtipe]'");
$rt = mysql_fetch_array($sqlt);
$sqlk = mysql_query("select * from kamar where idkamar='$rb[idkamar]'");
$rk = mysql_fetch_array($sqlk);
$sqlu = mysql_query("select * from user where username='$_SESSION[userres]'");
$ru = mysql_fetch_array($sqlu);
$now = date("Y-m-d");
  $d1 = ("$now");
  $d2 = ("$rb[tglmasuk]");
  $t1 = strtotime($d1);
  $t2 = strtotime($d2);
  $selisih=($t2-$t1)/(60*60*24);
?>
<body>
<div class="dh12">
<div id="view">
<fieldset>
Kode Booking : <big><b><?php echo "$rb[kdbooking]"; ?></b></big>
</fieldset>
</div>
</div>
<div class="dh12">
<div class="dh6">
<div id="view">
<fieldset>
<h3>DATA MEMBER</h3>
<p>Nama Lengkap<br>
<big><?php echo "$rm[namalengkap]";?></big></p>
<p>No. KTP<br>
<big><?php echo "$rm[noktp]";?></big></p>
<p>Alamat<br>
<big><?php echo "$rm[alamat]";?></big></p>
<p>No. Handphone<br>
<big><?php echo "$rm[nohp]";?></big></p>
</fieldset>
</div>
</div>
<div class="dh6">
<div id="view">
<fieldset>
<h3>DATA KAMAR</h3>
<p>Tipe Kamar<br>
<big><?php echo "$rt[kdtipe] - $rt[namatipe]";?></big></p>
<p>Harga<br>
<big><?php echo "Rp. $rt[harga]";?></big> per malam</p>
<p>No. Kamar<br>
<big><?php echo "$rk[nokamar]";?></big></p>
</fieldset>
</div>
</div>
</div>
<div class="dh12">
<div id="view" align="center">
<fieldset>
<h3>TANGGAL MENGINAP</h3>
  <?php   echo "<big><b>$rb[tglmasuk]</b> sampai <b>$rb[tglkeluar]</b> (<b>$rb[lamanginap]</b> hari)</big>";   ?>  
</fieldset>
</div>
</div>
<fieldset>
<?php
if($selisih > 0){
	echo "<div align='center'><big>Anda belum bisa Check In. <br>Check In dibuka mulai tanggal <b>$rb[tglmasuk]</b></big></div>";
}else if($selisih == 0 and $rb["status"] == "OK"){
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <input name="idbooking" type="hidden" id="idbooking" value="<?php echo "$rb[idbooking]"; ?>">
  <input name="iduser" type="hidden" id="iduser" value="<?php echo "$ru[iduser]"; ?>">
  <input name="checkin" type="submit" id="checkin" value="Check In">
</form>
<?php
}else if($rb["status"] == "Terisi"){
	echo "<div align='center'><big>Anda sudah Check In</big></div>";
}else{
	echo "<div align='center'><big>Anda belum melakukan konfirmasi</big></div>";
}
?>
</fieldset>
</body>
<?php
if($_POST["checkin"]){
  include "koneksi.php";
  $sqlc = mysql_query("insert into checkin (idbooking, iduser, status) value ('$_POST[idbooking]', '$_POST[iduser]', 'Checkin')");
  $sqlb = mysql_query("update booking set status='Terisi' where idbooking='$_POST[idbooking]'");
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
}
?>