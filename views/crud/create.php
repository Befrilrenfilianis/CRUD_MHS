<?php
require_once('koneksi.php');
if($_POST){
	try {
		$sql = "INSERT INTO tb_mahasiswa (nim,nama,alamat,jenis_kelamin,agama,usia) VALUES ('".$_POST['nim']."','".$_POST['nama']."','".$_POST['alamat']."','".$_POST['jenis_kelamin']."','".$_POST['agama']."','".$_POST['usia']."')";
		if(!$koneksi->query($sql)){
			echo $koneksi->error;
			die();
		}

	} catch (Exception $e) {
		echo $e;
		die();
	}
	  echo "<script>
	alert('Data berhasil di simpan');
	window.location.href='index.php?page=crud/index';
	</script>";
}
?>
<div class="row">
	<div class="col-lg-6">
		<form action="" method="POST">
			<div class="form-group">
				<label>NIM</label>
				<input type="text" value="" class="form-control" name="nim">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" value="" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<input type="text" value="" class="form-control" name="alamat">
			</div>
			<div class="form-group">
			<label for="exampleFormControlSelect1">Jenis Kelamin</label>
				<select class="form-control" name="jenis_kelamin" id="jenis_kelamin" aria-label="Default select example">
					<option selected>---- Pilih ----</option>
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect1">Agama</label>
				<select class="form-control" name="agama" id="agama">
				<option selected >---- Pilih ----</option>
					<option value="Islam">Islam</option>
					<option value="Kristen">Kristen</option>
					<option value="Katolik">Kaltolik</option>
					<option value="Hindu">Hindu</option>
					<option value="Budha">Budha</option>
					<option value="Konghuchu">Konghuchu</option>
				</select>
			</div>
			<div class="form-group">
				<label>Usia</label>
				<input type="number" value="" class="form-control" name="usia">
			</div>
			<input type="submit" class="btn btn-primary btn-sm" name="create" value="Create">
		</form>
	</div>
</div>