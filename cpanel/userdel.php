<?php 
  include "koneksi.php";
  $sqlu = mysql_query("delete from user where iduser='$_GET[idu]'"); 
  if($sqlu){ 
  	echo "Data Berhasil Dihapus";
  }else{
  	echo "Gagal Menghapus Data";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=user'>"; 
?>
