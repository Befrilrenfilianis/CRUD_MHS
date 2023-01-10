<?php
require_once('koneksi.php');

$query = "SELECT * FROM tb_mahasiswa";
$urlcrud = "index.php?page=crud/";
?>
<div class="row">
	<div class="col-lg-12">
		<a href="<?= $urlcrud.'create' ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
		<table class="table table-hover table-bordered" style="margin-top: 10px">
			<tr class="success">
			<th width="50px">No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th>Usia</th>
                        <th style="text-align: center;">Aksi</th>
			</tr>
			<?php
			if($data=mysqli_query($koneksi,$query)){
				$no=1;
				while($mahasiswa=mysqli_fetch_object($data)){
					?>
					<tr>
					<td><?= $no ?></td>
                        <td><?= $mahasiswa->nim ?></td>
                        <td><?= $mahasiswa->nama ?></td>
                        <td><?= $mahasiswa->jenis_kelamin ?></td>
                        <td><?= $mahasiswa->alamat ?></td>
                        <td><?= $mahasiswa->agama ?></td>
                        <td><?= $mahasiswa->usia ?></td>
						<td style="text-align: center;">
						<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="<?= $urlcrud.'hapus&id='.$mahasiswa->id ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
						<a href="<?= $urlcrud.'edit&id='.$mahasiswa->id ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
						</td>
					</tr>
					<?php
					$no++;
				}
				mysqli_free_result($data);
			}
			?>
		</table>
	</div>
</div>
<?php
mysqli_close($koneksi);
?>