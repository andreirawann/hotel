<?php include "koneksi.php"; ?>
<h3>DATA MAKANAN DAN MINUMAN</h3>
<a href="<?php echo "?p=makanminumadd"; ?>">Tambah Makanan dan Minuman</a>
<p>
<table border="0" width="90%" cellpadding="10">
<tr>
  <th>NO</th>
  <th>NAMA MAKANAN / MINUMAN</th>
  <th>HARGA</th>
  <th>AKSI</th>
</tr>
<?php
  $sqlm = mysql_query("select * from makanminum order by idmakanminum asc");
  $no = 1;
  while($rm = mysql_fetch_array($sqlm)){
    echo "<tr>
	  <td>$no</td>
	  <td>$rm[nama]</td>
	  <td>Rp. $rm[harga]</td>
	  <td>
	  <a href='?p=makanminumedit&idm=$rm[idmakanminum]'>Ubah</a> | 
	  <a href='?p=makanminumdel&idm=$rm[idmakanminum]'>Hapus</a>
	  </td>
	</tr>";
	$no++;
  }
?>
</table>