<?php include('config.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="home.php">Data Mahasiswa</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link bg-dark text-white" href="home.php">Home</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link bg-primary text-white" href="tambah.php">Tambah Data Mahasiswa</a>
					</li>
					<li class="nav-item">
						<a class="nav-link bg-danger text-white pull-right" href="index.php">LOGOUT</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container" style="margin-top:20px">
		<div class="text-center"><h2>Tambah Data Mahasiswa</h2></div>

		<hr>

		<?php
		if (isset($_POST['simpan'])) {
			$npm		= $_POST['npm'];
			$nama		= $_POST['nama'];
			$tempat	    = $_POST['tempat_lahir'];
			$tanggal	= $_POST['tanggal_lahir'];
			$jk	        = $_POST['jenis_kelamin'];
			$alamat  	= $_POST['alamat'];
			$kodepos	= $_POST['kode_pos'];

			$cek = mysqli_query($link, "SELECT * FROM biodata WHERE npm='$npm'") or die(mysqli_error($link));

			if (mysqli_num_rows($cek) == 0) {
				$sql = mysqli_query($link, "INSERT INTO biodata(npm, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, kode_pos) 
				VALUES('$npm', '$nama', '$tempat', '$tanggal','$jk','$alamat','$kodepos')") or die(mysqli_error($link));

				if ($sql) {
					echo '<script>alert("Berhasil menambahkan data."); document.location="home.php";</script>';
				} else {
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			} else {
				echo '<div class="alert alert-warning">Gagal, nama sudah terdaftar.</div>';
			}
		}
		?>


		<div class="container col-md-10">
			<div class="card">
				<div class="card-body">
		
		<form action="tambah.php" method="post">

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">NPM</label>
				<div class="col-sm-10">
					<input type="number" name="npm" class="form-control col-md-3" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control col-md-8" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tempat Lahir</label>
				<div class="col-sm-10">
					<input type="text" name="tempat_lahir" class="form-control col-md-8" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-10">
					<input type="date" name="tanggal_lahir" class="form-control col-md-8" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-10">
					<select name="jenis_kelamin" class="form-control col-md-8" required>
						<option value="L">Laki-Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<textarea name="alamat" class="form-control col-md-8" required></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Kode POS</label>
				<div class="col-sm-10">
					<input type="number" name="kode_pos" class="form-control col-md-8" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
					<input type="reset" class="btn btn-danger" value="Reset" name="reset">
				</div>
			</div>
		</form>

				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>