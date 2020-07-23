<?php include "koneksi.php"; ?>
<h3>DATA GRUP</h3>
<a href="<?php echo "?p=grupadd"; ?>">Tambah Grup</a>
<p>
<table border="0" width="90%" cellpadding="10">
<tr>
  <th>NO</th>
  <th>KODE GRUP</th>
  <th>NAMA GRUP</th>
  <th>DISKON</th>
  <th>AKSI</th>
</tr>
<?php
  $sqlg = mysql_query("select * from grup order by idgrup asc");
  $no = 1;
  while($rg = mysql_fetch_array($sqlg)){
    echo "<tr>
	  <td>$no</td>
	  <td>$rg[kdgrup]</td>
	  <td>$rg[namagrup]</td>
	  <td>$rg[diskon] %</td>
	  <td>
	  <a href='?p=grupedit&idg=$rg[idgrup]'>Ubah</a> | 
	  <a href='?p=grupdel&idg=$rg[idgrup]'>Hapus</a>
	  </td>
	</tr>";
	$no++;
  }
?>
</table>