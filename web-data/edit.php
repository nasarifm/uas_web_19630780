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
			<a class="navbar-brand" href="home.php">DATA MAHASISWA</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link bg-dark text-white" href="home.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link bg-primary text-white" href="tambah.php">Tambah</a>
					</li>
					<li class="nav-item">
						<a class="nav-link bg-danger text-white" href="index.php">LOGOUT</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container" style="margin-top:20px">
		<div class="text-center"><h2>Edit Mahasiswa</h2></div>

		<hr>

		<?php
		if (isset($_GET['npm'])) {
			$npm = $_GET['npm'];

			$select = mysqli_query($link, "SELECT * FROM biodata WHERE npm='$npm'") or die(mysqli_error($link));

			if (mysqli_num_rows($select) == 0) {
				echo '<div class="alert alert-warning">NPM tidak ada dalam database.</div>';
				exit();
			} else {
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		if (isset($_POST['submit'])) {
			$npm		= $_POST['npm'];
			$nama		= $_POST['nama'];
			$tempat	    = $_POST['tempat_lahir'];
			$tanggal	= $_POST['tanggal_lahir'];
			$jk	        = $_POST['jenis_kelamin'];
			$alamat  	= $_POST['alamat'];
			$kodepos	= $_POST['kode_pos'];

			$sql = mysqli_query($link, "UPDATE biodata SET npm='$npm', nama='$nama', tempat_lahir='$tempat', 
			tanggal_lahir='$tanggal', jenis_kelamin='$jk', alamat='$alamat', kode_pos='$kodepos' WHERE npm='$npm'") 
			or die(mysqli_error($link));

			if ($sql) {
				echo '<script>alert("Berhasil mengubah data."); document.location="home.php?npm=' . $npm . '";</script>';
			} else {
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="edit.php?npm=<?php echo $npm; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">NPM</label>
				<div class="col-sm-10">
					<input type="text" name="npm" class="form-control" size="4" value="<?php echo $data['npm']; ?>" readonly required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">NAMA </label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">TEMPAT LAHIR</label>
				<div class="col-sm-10">
					<input type="text" name="tempat_lahir" class="form-control" value="<?php echo $data['tempat_lahir']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">TANGGAL LAHIR</label>
				<div class="col-sm-10">
					<input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-10">
					<select name="jenis_kelamin" class="form-control" required>
						<option value="L" <?php if ($data['jenis_kelamin'] == 'L') {
												echo "selected";
											} ?>>Laki-Laki</option>
						<option value="P" <?php if ($data['jenis_kelamin'] == 'P') {
												echo "selected";
											} ?>>Perempuan</option>
					</select>
					<div class="help-block with-errors"></div>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">ALAMAT</label>
				<div class="col-sm-10">
					<textarea name="alamat" class="form-control"><?php echo $data['alamat']; ?></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">KODE POS</label>
				<div class="col-sm-10">
					<input type="text" name="kode_pos" class="form-control" value="<?php echo $data['kode_pos']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN PERUBAHAN">
					<a href="home.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>

	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>