<!DOCTYPE html>
<html>
<head>
	<title>Data Hasil Lahan</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data_Hasil_Lahan.xls");
	?>

	<center>
		<h1>Data Hasil Lahan</h1>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Penanggung Jawab Desa</th>
			<th>Nama Petugas</th>
			<th>Kecamatan</th>
			<th>Desa</th>
			<th>Sumber Air</th>
			<th>Minat Masyarakat</th>
			<th>Segi Kesehatan</th>
			<th>Jarak Sumber Air</th>
			<th>Perizinan</th>
			<th>Investor</th>
			<th>Kontur Tanah</th>
			<th>Hasil</th>
			<th>Status</th>
		</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","root","","lahan");

		// menampilkan data lahan
		$data = mysqli_query($koneksi,"select * from lahan");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['nama']; ?></td>
			<td><?php echo $d['namapetugas']; ?></td>
			<td><?php echo $d['kecamatan']; ?></td>
			<td><?php echo $d['desa']; ?></td>
			<td><?php echo $d['sumberair']; ?></td>
			<td><?php echo $d['minatmasyarakat']; ?></td>
			<td><?php echo $d['segikesehatan']; ?></td>
			<td><?php echo $d['jaraksumberair']; ?></td>
			<td><?php echo $d['perizinan']; ?></td>
			<td><?php echo $d['investor']; ?></td>
			<td><?php echo $d['konturtanah']; ?></td>
			<td><?php echo $d['hasil']; ?></td>
			<td><?php echo $d['status']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>
