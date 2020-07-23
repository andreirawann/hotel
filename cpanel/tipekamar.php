<?php include "koneksi.php"; ?>
<h3>DATA TIPE KAMAR</h3>
<a href="<?php echo "?p=tipekamaradd";?>">Tambah Data Tipe Kamar
</a><p>
<table border="0" width="90%" cellpadding="10">
<tr>
  <th>No.</th>
  <th>FOTO</th>
  <th>KETERANGAN</th>
  <th width="12%">AKSI</th>
</tr>
<?php
$sqlt = mysql_query("select * from tipekamar order by idtipe asc");
$no = 1;
while($rt = mysql_fetch_array($sqlt)){
  echo "<tr valign='top'>
    <td>$no</td>
    <td>
	  <img src='../fotokamar/$rt[foto1]' width='120px'><p>
	  <img src='../fotokamar/$rt[foto2]' width='120px'><p>
	  <img src='../fotokamar/$rt[foto3]' width='120px'><p>
	</td>
    <td>
	  <h2>$rt[kdtipe] - $rt[namatipe]</h2>
	  <h3>Rp. $rt[harga] per malam</h3>
	  $rt[keterangan]<p>
	  <b>Fasilitas :</b><br>
	  $rt[fasilitas]
	</td>
    <td>
	  <a href='?p=tipekamaredit&idt=$rt[idtipe]'>Ubah</a> | 
	  <a href='?p=tipekamardel&idt=$rt[idtipe]'>Hapus</a></td>
  </tr>";
  $no++;
}
?>
</table>
