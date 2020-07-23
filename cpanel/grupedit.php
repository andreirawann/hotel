<?php
  include "koneksi.php";
  $sqlg = mysql_query("select * from grup where idgrup='$_GET[idg]'");
  $rg = mysql_fetch_array($sqlg);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <h3>UBAH DATA GRUP</h3>
    <input name="idgrup" type="hidden" id="idgrup" value="<?php echo "$rg[idgrup]"; ?>">
  <p>Kode Grup 
    <input name="kdgrup" type="text" id="kdgrup" value="<?php echo "$rg[kdgrup]"; ?>">
</p>
  <p>Nama Grup 
    <input name="namagrup" type="text" id="namagrup" value="<?php echo "$rg[namagrup]"; ?>">
  </p>
  <p>Diskon  
    <input name="diskon" type="text" id="diskon" value="<?php echo "$rg[diskon]"; ?>">
  </p>
  <p>
    <input name="simpan" type="submit" id="simpan" value="SIMPAN PERUBAHAN DATA GRUP">
  </p>
</form>

<?php
if($_POST["simpan"]){
  include "koneksi.php";
  $sqlg = mysql_query("update grup set kdgrup='$_POST[kdgrup]', namagrup='$_POST[namagrup]', diskon='$_POST[diskon]' where idgrup='$_POST[idgrup]'");
  
  if($sqlg){
  	echo "Perubahan data berhasil disimpan";
  }else{
  	echo "Gagal Menyimpan";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=grup'>";
}
?> 