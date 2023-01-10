<?php
require_once('koneksi.php');
if($_POST){

	$sql = "UPDATE tb_mahasiswa SET nim='".$_POST['nim']."', nama='".$_POST['nama']."', alamat='".$_POST['alamat']."', jenis_kelamin='".$_POST['jenis_kelamin']."', agama='".$_POST['agama']."', usia='".$_POST['usia']."' WHERE id=".$_POST['id'];

	if ($koneksi->query($sql) === TRUE) {
	    echo "<script>
	alert('Data berhasil di update');
	window.location.href='index.php?page=crud/index';
	</script>";
	} else {
	    echo "Gagal: " . $koneksi->error;
	}

	$koneksi->close();
	
}else{
	$query = $koneksi->query("SELECT * FROM tb_mahasiswa WHERE id=".$_GET['id']);

	if($query->num_rows > 0){
		$data = mysqli_fetch_object($query);
	}else{
		echo "data tidak tersedia";
		die();
	}
?>
<div class="row">
	<div class="col-lg-6">
		<form action="" method="POST">
			<input type="hidden" name="id" value="<?= $data->id ?>">
			<div class="form-group">
				<label>NIM</label>
				<input type="text"  value="<?= $data->nim ?>" value="" class="form-control" name="nim">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" value="<?= $data->nama ?>" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<input type="text" value="<?= $data->alamat ?>" class="form-control" name="alamat">
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
				<option selected>---- Pilih ----</option>
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
				<input type="number" value="<?= $data->usia ?>" class="form-control" name="usia">
			</div>
			<input type="submit" class="btn btn-primary btn-sm" name="Update" value="Update">
		</form>
	</div>
</div>
<?php
}
mysqli_close($koneksi);
?>