<?php
include "koneksi.php";
$sqlg = mysql_query("delete from grup where idgrup='$_GET[idg]'");
if($sqlg){
  	echo "Data berhasil dihapus";
  }else{
  	echo "Gagal Menghapus";
  }
echo "<META HTTP-EQUIV='Refresh' Content='1; url=?p=grup'>";
?>