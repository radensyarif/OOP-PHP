<?php 
	include "config/koneksi.php";
	include "library/oop.php";

	$go = new oop();
	$tabel = "siswa";
	@$values ="'$_POST[nis]','$_POST[nama]'";


	if (isset($_POST['simpan'])) {
	 	# code...
	 	$go->simpan($con,$tabel,$values);
	 }
	 if (isset($_GET['hapus'])) {
	  	$where = "nis";
	  	@$values = "'$_GET[nis]'";
	  	$go->hapus($con,$tabel,$where,$values);
	  } 
	  if (isset($_POST['update'])) {
	  	$where = "nis";
	  	@$values = "'$_GET[nis]'";
	  	$set = "nis='$_POST[nis]',nama='$_POST[nama]'";
	  	$go->update($con,$tabel,$set,$where,$values);
	  }
	  if (isset($_GET['edit'])) {
	  	$where = "nis";
	  	@$values = "'$_GET[nis]'";
	  	$edit=$go->edit($con, $tabel, $where, $values);
	  }
 ?>
<form method="post">
	<table align="center" border="1">
		<tr>
			<td>NIS</td>
			<td>:</td>
			<td><input type="number" name="nis" required placeholder="Masukkan Nis" value="<?php echo @$edit[0]; ?>"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" required placeholder="Masukkan Nama" value="<?php echo @$edit[1]; ?>" ></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="simpan" value="SIMPAN">
			<input type="submit" name="update" value="UPDATE"></td>
		</tr>

	</table>
</form>
<table border="1" align="center">
	<tr>
		<th>No</th>
		<th>Nis</th>
		<th>Nama</th>
		<th>Aksi</th>
	</tr>
	<?php 
		$no = 1;
		$b= $go->tampil($con,$tabel);
		foreach ($b as $c) {
			# code...
		$no++;
		
	 ?>
	 <tr>
	 	<td><?php echo $no; ?></td>
	 	<td><?php echo $c[0]; ?></td>
	 	<td><?php echo $c[1]; ?></td>
	 	<td><a onclick="return confirm('Yakin Ingin Menghapus Data?')" href="siswa.php?hapus&nis=<?php echo $c[0]; ?>">HAPUS</a></td>
	 	<td><a href="siswa.php?edit&nis=<?php echo $c[0]; ?>">EDIT</a></td>
	 </tr>
	<?php } ?>
</table>