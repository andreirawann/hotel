<div align="center">Kode Booking Anda</div>
<h3><?php echo "$_GET[kdb]"; ?></h3>
<?php
	$sqlb = mysql_query("select * from booking where kdbooking='$_GET[kdb]'");
	$rb = mysql_fetch_array($sqlb);
	$now = "$rb[tglbooking]";
	$limit = date ("Y-m-d h:i:s", strtotime("+1 day", strtotime($now)));
	echo "<div align='center'><big>Limit Booking</big> sampai <big>$limit</big> (1 hari dari sekarang)<br>Apabila bila tidak konfirmasi sampai $limit, maka booking akan dibatalkan secara otomatis</div><p>";
?>
<div align="center"><a href="<?php echo "faktur.php?kdb=$_GET[kdb]"; ?>" target="_blank"><button type="button" class="btn btn-more">Cetak Faktur</button></a></div>