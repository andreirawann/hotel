<?php
include "koneksi.php";
$sqlu = mysql_query("select * from user where username='$_SESSION[useradm]'");
$ru = mysql_fetch_array($sqlu);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <h3>TAMBAH DATA  KAMAR </h3>
  <input type="hidden" name="iduser" value="<?php echo "$ru[iduser]"; ?>" />
  <p> TIPE KAMAR  
  <?php
  $sqlt = mysql_query("select * from tipekamar order by kdtipe asc");
  echo "<select name='idtipe'>";
  echo "<option value=''>Pilih Tipe Kamar</option>";
 while($rt = mysql_fetch_array($sqlt)){
   echo "<option value='$rt[idtipe]'>$rt[kdtipe] - $rt[namatipe]</option>";
 }
  echo "</select>";
  ?>
  </p>
  <p>NOMOR KAMAR 
    <input name="nokamar" type="text" id="nokamar">
  </p>
  <p>
    <input name="simpan" type="submit" id="simpan" value="SIMPAN DATA KAMAR">
</p>
</form>

<?php
if($_POST["simpan"]){
  include "koneksi.php";
  $sqlk = mysql_query("insert into kamar (idtipe, iduser, nokamar) values ('$_POST[idtipe]', '$_POST[iduser]', '$_POST[nokamar]')");
  if($sqlk){ 
  	echo "Data Berhasil Disimpan";
  }else{
  	echo "Penyimpanan Data Gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='2; URL=?p=kamar'>";
}
?>