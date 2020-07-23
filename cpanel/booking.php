<h3>BOOKING</h3>
<table border="0" width="90%" cellpadding="10">
<tr>
  <th>NO</th>
  <th>KODE BOOKING</th>
  <th>TANGGAL BOOKING</th>
  <th>LIMIT BOOKING</th>
  <th>TANGGAL MENGINAP</th>
  <th>LAMA MENGINAP</th>
  <th>STATUS</th>
  <th>AKSI</th>
</tr>
<?php
  $sqlb = mysql_query("select * from booking order by tglbooking asc");
  $no = 1;
  while($rb = mysql_fetch_array($sqlb)){
	$now = "$rb[tglbooking]";
	$limit = date ("Y-m-d h:i:s", strtotime("+1 day", strtotime($now)));
	$beda = 0;
    echo "<tr align='center'>
	  <td>$no</td>
	  <td>$rb[kdbooking]</td>
	  <td>$rb[tglbooking]</td>
	  <td>$limit</td>
	  <td>$rb[tglmasuk] sampai $rb[tglkeluar]</td>
	  <td>$rb[lamanginap] hari</td>
	  <td>$rb[status]</td>
	  <td><a href='?p=checkindetail&kdb=$rb[kdbooking]'><button type='button' class='btn btn-more'>Lihat Detail</button></a></td>
	</tr>";
	$no++;
  }
?>
</table>