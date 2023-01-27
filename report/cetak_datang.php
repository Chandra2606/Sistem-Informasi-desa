<?php
	include "../inc/koneksi.php";
	
	if (isset ($_POST['Cetak'])){
	$id = $_POST['id_datang'];
	}

	$tanggal = date("m/y");
	$tgl = date("d/m/y");
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK SURAT</title>
</head>

<body>
	<center>

		<h2>PEMERINTAH KABUPATEN PESISIR SELATAN</h2>
		<h3>KECAMATAN KOTO XI TARUSAN
			<br>KENEGARIAN DUKU</h3>
		<p>________________________________________________________________________</p>

		<?php
			$sql_tampil = "select * from tb_datang
			where id_datang ='$id'";
			
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>SURAT KETARANGAN PENDATANG</u>
		</h4>
		<h4>No Surat :
			<?php echo $data['id_datang']; ?>/Ket.Pendatang/
			<?php echo $tanggal; ?>
		</h4>
	</center>
	<p>Yang bertandatangan dibawah ini Wali nagari Eridal Pnk.Dt.RAJO LELO Kecamatan KOTO XI TARUSAN Kabupaten PESISIR SELATAN dengan ini menerangkan
		bahawa :</P>
	<table>
		<tbody>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<?php echo $data['nik']; ?>
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama_datang']; ?>
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<?php echo $data['jekel']; ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal Datang</td>
				<td>:</td>
				<td>
					<?php echo $data['tgl_datang']; ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<p>Benar-benar Telah datang dan berencana untuk tinggal di Nagari Duku, Kecamatan KOTO XI TARUSAN, Kabupuaten PESISIR SELATAN.</P>
	<p>Demikian Surat ini dibuat, agar dapat digunakan sebagaimana mestinya.</P>
	<br>
	<br>
	<br>
	<br>
	<br>
	<p align="right">
		Duku,
		<?php echo $tgl; ?>
		<br> Wali Nagari Eridal Pnk.Dt.RAJO LELO
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>(....................................................)
	</p>


	<script>
		window.print();
	</script>

</body>

</html>