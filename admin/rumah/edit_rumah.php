<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_rumah WHERE id_rumah='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Rumah</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Sistem</label>
				<div class="col-sm-3">
					<input type='text' class="form-control" id="id_rumah" name="id_rumah" value="<?php echo $data_cek['id_rumah']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Rumah</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_rumah" name="no_rumah" value="<?php echo $data_cek['no_rumah']; ?>"
					readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah KK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jumlah_kk" name="jumlah_kk" value="<?php echo $data_cek['jumlah_kk']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Keluarga</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jumlah_keluarga" name="jumlah_keluarga" value="<?php echo $data_cek['jumlah_keluarga']; ?>"
					 required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-kartu" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>



<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_rumah SET 
    no_rumah='".$_POST['no_rumah']."',
    jumlah_kk='".$_POST['jumlah_kk']."',
    jumlah_keluarga='".$_POST['jumlah_keluarga']."'
    WHERE id_rumah='".$_POST['id_rumah']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-rumah';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-rumah';
        }
      })</script>";
    }}
