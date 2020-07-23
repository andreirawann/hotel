<?php include "koneksi.php"; ?>
<h3>DATA USER</h3>
<a href="<?php echo "?p=useradd";?>">Tambah Data User
</a><p>
<table border="0" width="90%" cellpadding="10">
<tr>
  <th>No.</th>
  <th>USERNAME</th>
  <th>PASSWORD</th>
  <th>NAMA LENGKAP</th>
  <th>LEVEL</th>
  <th>AKSI</th>
</tr>
<?php
$sqlu = mysql_query("select * from user order by iduser asc");
$no = 1;
while($ru = mysql_fetch_array($sqlu)){
  echo "<tr>
    <td>$no</td>
    <td>$ru[username]</td>
    <td>$ru[password]</td>
    <td>$ru[nama]</td>
    <td>$ru[level]</td>
    <td>
<a href='?p=useredit&idu=$ru[iduser]'>Ubah</a> | 
<a href='?p=userdel&idu=$ru[iduser]'>Hapus</a></td>
  </tr>";
  $no++;
}
?>
</table>
