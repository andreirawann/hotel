<h3>CHECK IN</h3>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <p>Kode Booking</p>
  <p>
    <input name="kdbooking" type="text" id="kdbooking">
</p>
  <p>
    <input name="cari" type="submit" id="cari" value="C A R I">
  </p>
</form>

<?php
if($_POST["cari"]){
  include "koneksi.php";
  $sqlb = mysql_query("select * from booking where kdbooking='$_POST[kdbooking]'");
  $row = mysql_num_rows($sqlb);
  if($row > 0){
    echo "<big>Kode Booking : <b>$_POST[kdbooking]</b> ditemukan </big><p>";
	echo "<a href='?p=checkindetail&kdb=$_POST[kdbooking]'><button type='button' class='btn btn-more'>Lihat Detail</button></a>";
  }else{
    echo "Kode Booking <b>$_POST[kdbooking]</b> tidak ditemukan";
  }
}
?>