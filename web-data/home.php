<?php
include('config.php');
$result = mysqli_query($link, "SELECT * FROM biodata ORDER BY npm DESC");
?>
<!DOCTYPE html>
<html>

<head>
<title>Data Mahasiswa</title>	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>

	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link bg-dark text-white" href="home.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link bg-primary text-white" href="tambah.php">Tambah Data Mahasiswa</a>
						</li>
						<li class="nav-item">
							<a class="nav-link bg-danger text-white" href="index.php">LOGOUT</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container" style="margin-top:20px">
		<div class="text-center"><h2>Daftar Mahasiswa</h2></div>

			<hr>

			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Masukkan Nama">
				<button type="submit" name="submit" class="bg-dark text-white">Cari</button>
			</form>

			<table class="table table-striped table-hover table-sm table-bordered">
				<thead class="thead-gray">
					<tr>
						<th>NPM</th>
						<th>Nama</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Kode Pos</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($data = mysqli_fetch_array($result)) {
					?>
						<tr>
							<td><?php echo $data['npm'] ?></td>
							<td><?php echo $data['nama'] ?></td>
							<td><?php echo $data['tempat_lahir'] ?></td>
							<td><?php echo $data['tanggal_lahir'] ?></td>
							<td><?php echo $data['jenis_kelamin'] ?></td>
							<td><?php echo $data['alamat'] ?></td>
							<td><?php echo $data['kode_pos'] ?></td>
							<td>
								<a href="edit.php?npm=<?php echo $data['npm'] ?>" class="badge badge-warning text-white">Edit</a>
								<a href="delete.php?npm=<?php echo $data['npm'] ?>" class="badge badge-danger" onclick="return confirm 'Yakin ingin menghapus data ini?'">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	</body>

</html>