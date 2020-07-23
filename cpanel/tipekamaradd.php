<?php
include "koneksi.php";
$sqlu = mysql_query("select * from user where username='$_SESSION[useradm]'");
$ru = mysql_fetch_array($sqlu);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <h3>TAMBAH DATA TIPE KAMAR </h3>
  <input type="hidden" name="iduser" value="<?php echo "$ru[iduser]"; ?>" />
  <p>KODE TIPE 
    <input name="kdtipe" type="text" id="kdtipe">
  </p>
  <p>NAMA TIPE
    <input name="namatipe" type="text" id="namatipe">
  </p>
  <p>KETERANGAN
    <textarea name="keterangan" id="keterangan"></textarea>
  </p>
  <p>HARGA 
    <input name="harga" type="text" id="harga">
  </p>
  <p>FASILITAS
    <textarea name="fasilitas" id="fasilitas"></textarea>
  </p>
  <p>FOTO KAMAR</p>
  <p>
    <input name="foto1" type="file" id="foto1">
  </p>
  <p>
    <input name="foto2" type="file" id="foto2" />
  </p>
  <p>
    <input name="foto3" type="file" id="foto3" /></p>
  <p>
    <input name="simpan" type="submit" id="simpan" value="SIMPAN DATA TIPE KAMAR">
</p>
</form>

<?php
if($_POST["simpan"]){
  include "koneksi.php";
  $nmfoto1  = $_FILES["foto1"]["name"];
  $lokfoto1 = $_FILES["foto1"]["tmp_name"];
  if(!empty($lokfoto1)){	
	 move_uploaded_file($lokfoto1, "../fotokamar/$nmfoto1");
  }
  $nmfoto2  = $_FILES["foto2"]["name"];
  $lokfoto2 = $_FILES["foto2"]["tmp_name"];
  if(!empty($lokfoto2)){	
	 move_uploaded_file($lokfoto2, "../fotokamar/$nmfoto2");
  }
  $nmfoto3  = $_FILES["foto3"]["name"];
  $lokfoto3 = $_FILES["foto3"]["tmp_name"];
  if(!empty($lokfoto3)){	
	 move_uploaded_file($lokfoto3, "../fotokamar/$nmfoto3");
  }
  $fasilitas = nl2br($_POST["fasilitas"]);
  $sqlt = mysql_query("insert into tipekamar (iduser, kdtipe, namatipe, keterangan, harga, fasilitas, foto1, foto2, foto3) values ('$_POST[iduser]', '$_POST[kdtipe]', '$_POST[namatipe]', '$_POST[keterangan]', '$_POST[harga]', '$fasilitas', '$nmfoto1', '$nmfoto2', '$nmfoto3')");
  if($sqlt){ 
  	echo "Data Berhasil Disimpan";
  }else{
  	echo "Penyimpanan Data Gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='2; URL=?p=tipekamar'>";
}
?>