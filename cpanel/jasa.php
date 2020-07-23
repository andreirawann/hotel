<?php include "koneksi.php"; ?>
<h3>DATA JASA</h3>
<a href="<?php echo "?p=jasaadd"; ?>">Tambah Jasa</a>
<p>
<table border="0" width="90%" cellpadding="10">
<tr>
  <th>NO</th>
  <th>NAMA JASA</th>
  <th>HARGA</th>
  <th>AKSI</th>
</tr>
<?php
  $sqlj = mysql_query("select * from jasa order by idjasa asc");
  $no = 1;
  while($rj = mysql_fetch_array($sqlj)){
    echo "<tr>
	  <td>$no</td>
	  <td>$rj[nama]</td>
	  <td>Rp. $rj[harga]</td>
	  <td>
	  <a href='?p=jasaedit&idj=$rj[idjasa]'>Ubah</a> | 
	  <a href='?p=jasadel&idj=$rj[idjasa]'>Hapus</a>
	  </td>
	</tr>";
	$no++;
  }
?>
</table>