<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_rumah WHERE id_rumah='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
		
		$karkel=$data_cek['id_rumah'];
    }
?>


<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-users"></i> Anggota Keluarga</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">


			<input type='hidden' class="form-control" id="id_rumah" name="id_rumah" value="<?php echo $data_cek['id_rumah']; ?>"
			 readonly/>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Rumah</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo $data_cek['no_rumah']; ?>"
					 readonly/>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah KK</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo $data_cek['jumlah_kk']; ?>"
					 readonly/>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Keluarga</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo $data_cek['jumlah_keluarga']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Anggota</label>
				<div class="col-sm-4">
					<select name="id_pend" id="id_pend" class="form-control select2bs4" required>
						<option selected="selected">- Penduduk -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_pdd where status='Ada'";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_pend'] ?>">
							<?php echo $row['nik'] ?>
							-
							<?php echo $row['nama'] ?>
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>
				<div class="col-sm-3">
					<select name="sebagai" id="sebagai" class="form-control">
						<option>- sebagai -</option>
						<option>Kepala Keluarga</option>
						<option>Anggota Keluarga</option>
					</select>
				</div>
				<input type="submit" name="Simpan" value="Tambah" class="btn btn-success">
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>NIK</th>
								<th>Nama</th>
								<th>Jekel</th>
								<th>Sebagai</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>

							<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT p.nik, p.nama, p.jekel, ang.sebagai, ang.id_anggota_rumah
			  from tb_pdd p inner join tb_anggota_rumah ang on p.id_pend=ang.id_pend where status='Ada' and id_rumah=$karkel");
              while ($data= $sql->fetch_assoc()) {
            ?>

							<tr>
								<td>
									<?php echo $data['nik']; ?>
								</td>
								<td>
									<?php echo $data['nama']; ?>
								</td>
								<td>
									<?php echo $data['jekel']; ?>
								</td>
								<td>
									<?php echo $data['sebagai']; ?>
								</td>
								<td>
									<a href="?page=del-anggota_rumah&kode=<?php echo $data['id_anggota_rumah']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
									 title="Hapus" class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>

							<?php
              }
            ?>
						</tbody>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<a href="?page=data-rumah" title="Kembali" class="btn btn-warning">Kembali</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_anggota_rumah (id_rumah, id_pend, sebagai) VALUES (
            '".$_POST['id_rumah']."',
            '".$_POST['id_pend']."',
            '".$_POST['sebagai']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=anggota_rumah&kode=".$_POST['id_rumah']."';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=anggota_rumah&kode=".$_POST['id_rumah']."';
          }
      })</script>";
    }}
     //selesai proses simpan data
