<?php
include "koneksi.php";
$sqlj = mysql_query("delete from jasa where idjasa='$_GET[idj]'");
if($sqlj){
  	echo "Data berhasil dihapus";
  }else{
  	echo "Gagal Menghapus";
  }
echo "<META HTTP-EQUIV='Refresh' Content='1; url=?p=jasa'>";
?>