<?php
include "koneksi.php";
$sqlm = mysql_query("select * from member where idmember='$_GET[idm]'");
$rm = mysql_fetch_array($sqlm);
$sqlt = mysql_query("select * from tipekamar where idtipe='$_GET[idt]'");
$rt = mysql_fetch_array($sqlt);
$sqlk = mysql_query("select * from kamar where idkamar='$_GET[idk]'");
$rk = mysql_fetch_array($sqlk);
$sqlb = mysql_query("select * from booking where idkamar='$_GET[idk]'");
$rb = mysql_fetch_array($sqlb);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
<div class="dh12">
<div class="dh6">
<div id="view">
<fieldset>
<h3>DATA MEMBER</h3>
<input name="idmember" type="hidden" value="<?php echo "$rm[idmember]"; ?>">
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
<input name="idtipe" type="hidden" value="<?php echo "$rt[idtipe]"; ?>">
<input name="idkamar" type="hidden" value="<?php echo "$rk[idkamar]"; ?>">
<p>Tipe Kamar<br>
<big><?php echo "$rt[kdtipe] - $rt[namatipe]";?></big></p>
<p>Harga<br>
<big><?php echo "Rp. $rt[harga]";?></big> per malam</p>
<p>No. Kamar<br>
<big><?php echo "$rk[nokamar]";?></big></p>
<p>Status<br>
<big>Kosong</big></p>
</fieldset>
</div>
</div>
</div>
<?php
  $kd = "BOOK";
  $d = date("d");
  $m = date("m");
  $y = date("Y");
  $j = date("h");
  $mi = date("i");
  $s = date("s");
?>
<input name="kdbooking" type="hidden" value="<?php echo "$kd-$y$m$d$j$mi$s"; ?>">
<div class="dh12">
<div class="dh6">
<div id="view" align="center">
<fieldset>
<h3>TANGGAL MASUK</h3>
  <input name="tglmasuk" type="hidden" value="<?php echo "$_GET[tglm]"; ?>">
  <?php   echo "<big>$_GET[tglm]</big>";   ?>  
</fieldset>
</div>
</div>
<div class="dh6">
<div id="view" align="center">
<fieldset>
<h3>TANGGAL KELUAR</h3>
  <input name="tglkeluar" type="hidden" value="<?php echo "$_GET[tglk]"; ?>">
  <?php   echo "<big>$_GET[tglk]</big>";   ?>  
</fieldset>
</div>
</div>
<p><input type="submit" name="booking" value="Booking Sekarang"></p>
</div>
</form>


<?php
if($_POST["booking"]){
  include "koneksi.php";  
  $d1 = ("$_POST[tglmasuk]");
  $d2 = ("$_POST[tglkeluar]");
  $t1 = strtotime($d1);
  $t2 = strtotime($d2);
  $selisih=($t2-$t1)/(60*60*24);
  
  $sqlb = mysql_query("insert into booking (idmember, idtipe, idkamar, kdbooking, tglbooking, tglmasuk, tglkeluar, lamanginap, status) values ('$_POST[idmember]', '$_POST[idtipe]', '$_POST[idkamar]', '$_POST[kdbooking]', NOW(), '$_POST[tglmasuk]', '$_POST[tglkeluar]', '$selisih', 'Booking')");
  
  if($sqlb){
  	echo "Proses booking selesai";
  }else{
  	echo "Proses booking gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=bookingsukses&kdb=$_POST[kdbooking]'>";
}
?> 