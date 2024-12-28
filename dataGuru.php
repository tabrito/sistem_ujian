<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: index.php");
	exit();
}

require 'functions/functions.php';
?>
<?php include "header.php"; ?>

<main>
	<div>
		<ul style="display: flex;">
			<li class="mx-1"><a class="btn btn-primary" href="dataKelas.php">Data Kelas</a></li>
			<li class="mx-1"><a class="btn btn-primary" href="dataGuru.php">Data Guru</a></li>
			<li class="mx-1"><a class="btn btn-primary" href="dataSiswa.php">Data Siswa</a></li>
		</ul>
		<div>
			<h1 style="margin-left: 200px; margin-top: 100px;">Data Guru</h1>
		</div>
	</div>
	<div class="content-produk">
		<button class="btn btn-tambahkan-produk" id="btn-tambahkan-produk" data-bs-toggle="modal" data-bs-target="#addGuru"><a class="fas fa-plus-circle"></a> Tambah Guru</i></button>
		<div style="height: 50px;"></div>
		<table class="table-produk">
			<tr>
				<th class="text-center align-middle">No</th>
				<th class="text-center align-middle">NIP</th>
				<th class="text-center align-middle">Nama Guru</th>
				<th class="text-center align-middle">Tanggal Lahir</th>
				<th class="text-center align-middle">Alamat</th>
				<th class="text-center align-middle">Mata Pelajaran</th>
				<th class="text-center align-middle" colspan="2">Action</th>
			</tr>
			<?php
			$ambildata = mysqli_query($mysqli, "SELECT * FROM mapel, guru where mapel.id_guru-guru.nip group by guru order by guru asc;");
			$i = 1;
			while ($data = mysqli_fetch_array($ambildata)) {
				$get_id_product = $data['nip'];
			?>
				<tr>
					<td style="text-align: center;"><?= $i; ?></td>
					<td><?= $data["nip"]; ?></td>
					<td><?= $data["guru"]; ?></td>
					<td><?= $data['tanggal_lahir']; ?></td>
					<td><?= $data['alamat']; ?></td>
					<td><?= $data['mapel']; ?></td>
					<td style="text-align: center;">
						<a href="#" class="action-edit" data-bs-toggle="modal" data-bs-target="#edit<?= $data['nip']; ?>"><i class="fas fa-edit"></i> Edit</a>
						<a href="#" class="action-hapus" data-bs-toggle="modal" data-bs-target="#delete<?= $data['nip']; ?>"><i class="fas fa-trash"></i> Hapus</a>
					</td>
				</tr>
				<!-- Modal Add -->
				<div class="modal fade" id="addGuru">
					<div class="modal-dialog">
						<div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header m-3">
								<h4 class="modal-title">Add Guru</h4>
							</div>

							<!-- Modal body -->
							<form action="" method="post" enctype="multipart/form-data">
								<div class="p-4">
									<div style="display: flex;">
										<label style="width: 170px;" for="nip" class="form-label fw-bold mt-2">NIP</label>
										<input type="text" name="nip" class="form-control">
									</div>
									<br>
									<div style="display: flex;">
										<label style="width: 170px;" for="guru" class="form-label fw-bold mt-2">Nama Guru</label>
										<input type="text" name="guru" class="form-control">
									</div>
									<br>
									<div style="display: flex;">
										<label style="width: 170px;" for="tanggal_lahir" class="form-label fw-bold mt-2">Tanggal Lahir</label>
										<input type="date" name="tanggal_lahir" class="form-control">
									</div>
									<br>
									<div style="display: flex;">
										<label style="width: 170px;" for="alamat" class="form-label fw-bold mt-2">Alamat</label>
										<input type="text" name="alamat" class="form-control">
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-primary mt-3" name="addGuru">Submit</button>
										<button type="submit" class="btn btn-outline-primary mt-3">Close</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Modal Edit -->
				<div class="modal fade" id="edit<?= $data['nip']; ?>">
					<div class="modal-dialog">
						<div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header m-3">
								<h4 class="modal-title">Edit Guru</h4>
							</div>

							<!-- Modal body -->
							<form action="" method="post" enctype="multipart/form-data">
								<div class="p-4">
									<div style="display: flex;">
										<label style="width: 170px;" for="nip" class="form-label fw-bold mt-2">NIP</label>
										<input type="text" name="nip" class="form-control" value="<?= $data['nip'] ?>" readonly>
									</div>
									<br>
									<div style="display: flex;">
										<label style="width: 170px;" for="guru" class="form-label fw-bold mt-2">Nama Guru</label>
										<input type="text" name="guru" class="form-control" value="<?= $data['guru'] ?>">
									</div>
									<br>
									<div style=" display: flex;">
										<label style="width: 170px;" for="tanggal_lahir" class="form-label fw-bold mt-2">Tanggal Lahir</label>
										<input type="date" name="tanggal_lahir" class="form-control" value="<?= $data['tanggal_lahir'] ?>">
									</div>
									<br>
									<div style=" display: flex;">
										<label style="width: 170px;" for="alamat" class="form-label fw-bold mt-2">Alamat</label>
										<input type="text" name="alamat" class="form-control" value="<?= $data['alamat'] ?>">
									</div>
									<div class=" text-center">
										<button type="submit" class="btn btn-primary mt-3" name="editGuru">Submit</button>
										<button type="submit" class="btn btn-outline-primary mt-3">Close</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Delete Modal -->
				<div class="modal fade" id="delete<?= $data['nip']; ?>">
					<div class="modal-dialog">
						<div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Delete Guru</h4>
							</div>

							<!-- Modal body -->
							<form action="" method="post">
								<div class="modal-body">
									Apakah anda yakin ingin menghapus <strong><?= $data['guru']; ?></strong> ?
									<input type="hidden" name="nip" value="<?= $data['nip']; ?>">
									<br>
									<div class=" text-center">
										<button type="submit" class="btn btn-primary mt-3" name="deleteGuru">Delete</button>
										<button type="submit" class="btn btn-outline-primary mt-3">Close</button>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			<?php
				$i++;
			}
			?>
		</table>
	</div>
</main>

<?php include "footer.php"; ?>