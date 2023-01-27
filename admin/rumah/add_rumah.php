<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Rumah</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_rumah" name="no_rumah" placeholder="No Rumah" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah KK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jumlah_kk" name="jumlah_kk" placeholder="Jumlah KK" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Keluarga</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jumlah_keluarga" name="jumlah_keluarga" placeholder="Jumlah Keluarga" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-rumah" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_rumah (no_rumah, jumlah_kk, jumlah_keluarga) VALUES (
            '".$_POST['no_rumah']."',
            '".$_POST['jumlah_kk']."',
            '".$_POST['jumlah_keluarga']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-rumah';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-rumah';
          }
      })</script>";
    }}
     //selesai proses simpan data
