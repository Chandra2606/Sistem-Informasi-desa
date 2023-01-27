<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Rumah</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-rumah" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NO Rumah</th>
						<th>Jumlah KK</th>
						<th>Jumlah Keluarga</th>
						<th>Anggota KK</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $koneksi->query("select * from tb_rumah");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['no_rumah']; ?>
						</td>
						<td>
							<?php echo $data['jumlah_kk']; ?>
						</td>
						<td>
							<?php echo $data['jumlah_keluarga']; ?>
							
						</td>
						<td>
							<a href="?page=anggota_rumah&kode=<?php echo $data['id_rumah']; ?>" title="Anggota KK"
							 class="btn btn-info btn-sm">
								<i class="fa fa-users"></i>
							</a>
						</td>
						<td>
							<a href="?page=edit-rumah&kode=<?php echo $data['id_rumah']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-rumah&kode=<?php echo $data['id_rumah']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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
	<!-- /.card-body -->