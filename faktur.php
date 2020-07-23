<style type="text/css">
body{
	font-family:Arial;
	font-size:13px;	
}
</style>
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
?>
<body onLoad="window.print();window.closeoff()">
<fieldset>
<h3>The EPWM Hotel Premiere</h3>
Jl. Raya Lubuk Begalung Padang, Sumatera Barat, Indonesia<br>
Telp : (0751) 1234567<br>
email : welcome@epwmhotel.com
</fieldset>
<fieldset>
Kode Booking : <big><b><?php echo "$rb[kdbooking]"; ?></b></big>
</fieldset>
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
<fieldset>
<h3>DATA KAMAR</h3>
<p>Tipe Kamar<br>
<big><?php echo "$rt[kdtipe] - $rt[namatipe]";?></big></p>
<p>Harga<br>
<big><?php echo "Rp. $rt[harga]";?></big> per malam</p>
<p>No. Kamar<br>
<big><?php echo "$rk[nokamar]";?></big></p>
</fieldset>
<fieldset>
<h3>TANGGAL MENGINAP</h3>
  <?php   echo "<big><b>$rb[tglmasuk]</b> sampai <b>$rb[tglkeluar]</b> (<b>$rb[lamanginap]</b> hari)</big>";   ?>  
</fieldset>
<fieldset> 
&copy; 2017 The EPWM Hotel Premiere  
</fieldset>
</body>