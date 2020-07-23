<?php
include "koneksi.php";
$sqlm = mysql_query("delete from makanminum where idmakanminum='$_GET[idm]'");
if($sqlm){
  	echo "Data berhasil dihapus";
  }else{
  	echo "Gagal Menghapus";
  }
echo "<META HTTP-EQUIV='Refresh' Content='1; url=?p=makanminum'>";
?>