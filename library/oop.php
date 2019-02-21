<?php 
	class oop{
		function simpan($con,$tabel,$values){
			$sql = "INSERT INTO $tabel VALUES ($values)";
			$mysql = mysqli_query($con, $sql);
		}

    	function tampil($con, $tabel) {
        	$sql = "SELECT * FROM $tabel";
        	$query = mysqli_query($con, $sql);
        	$isi =[];
        	while ($data = mysqli_fetch_array($query)){
            $isi[] = $data;
        	}return $isi;
    	}
    	function hapus($con,$tabel,$where,$values){
    		$sql = mysqli_query($con, "DELETE FROM $tabel WHERE $where=$values");
    		if ($sql) {
  				echo "<script>alert('Hapus Data Sukses');</script>";
    		}
    	}
    	function edit($con, $tabel,$where,$values){
    		$sql = mysqli_query($con, "SELECT * FROM $tabel WHERE $where=$values");
    		$tampil = mysqli_fetch_array($sql);
    		return $tampil;
    	}
    	function update($con,$tabel,$set,$where,$values){
    		$sql = mysqli_query($con, "UPDATE $tabel SET $set WHERE $where = $values");
    	}
	}
 ?>