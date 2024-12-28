<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: index.php");
	exit();
}

require 'functions/functions.php';

// Cek apakah tombol submit sudah ditekan
if (isset($_POST["tambah_produk_btn"])) {
	// Ambil data dari setiap elemen dalam form
	$id = $_POST["id-produk"];
	$nama = $_POST["nama-produk"];
	$harga = $_POST["harga"];
	$stock = $_POST["stock"];

	// Query insert data
	$query = "INSERT INTO produk VALUES ('$id', '$nama', $harga, $stock)";
}

// Cek apakah tombol edit sudah ditekan
if (isset($_POST["edit_produk_btn"])) {
	// Ambil data dari setiap elemen dalam form
	$id = $_POST["id-produk"];
	$nama = $_POST["nama-produk"];
	$harga = $_POST["harga"];
	$stock = $_POST["stock"];

	// Query insert data
	$query = "UPDATE produk SET nama = '$nama', harga = $harga, stock = $stock WHERE id = '$id'";
}
?>
<?php include "header.php"; ?>

<main>
	<div>
		<h1 style="margin-left: 200px;">Jadwal Ujian</h1>
	</div>
	<button class="btn btn-tambahkan-produk" style="margin-right: 150px; margin-bottom: 30px;" id="btn-tambahkan-produk"><i class="fas fa-plus-circle"></i> Tambah Jadwal</i></button>
	<div class="content-produk">
		<table class="table-produk">
			<thead>
				<tr>
					<th rowspan="2" class="text-center align-middle">No</th>
					<th rowspan="2" class="text-center align-middle">Hari</th>
					<th rowspan="2" class="text-center align-middle">Jam</th>
					<th colspan="5" class="text-center align-middle">Kelas</th>
				</tr>
				<tr>
					<?php
					$ambildata = mysqli_query($mysqli, "SELECT * FROM kelas order by id_kelas asc;");
					while ($kelas = mysqli_fetch_array($ambildata)) {
					?>
						<th class="text-center align-middle"><?= $kelas['kelas']; ?></th>
					<?php
					}
					?>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1;
				$ambildata = mysqli_query($mysqli, "SELECT * FROM jadwal, kelas, mapel, guru where jadwal.id_kelas=kelas.id_kelas and jadwal.id_mapel=mapel.id_mapel and mapel.id_guru=guru.nip group by hari, jam order by id_jadwal asc;");
				while ($data = mysqli_fetch_array($ambildata)) {
					$get_id_product = $data['id_jadwal'];
				?>
					<tr>
						<td style="text-align: center;"><?= $i; ?></td>
						<td><?= $data["hari"]; ?></td>
						<td><?= $data["jam"]; ?></td>
						<?php
						$jam = $data['jam'];
						$ambilmapel = mysqli_query($mysqli, "SELECT * FROM jadwal, kelas, mapel, guru where jadwal.id_kelas=kelas.id_kelas and jadwal.id_mapel=mapel.id_mapel and mapel.id_guru=guru.nip and jam='$jam' group by mapel order by id_jadwal asc;");
						while ($baris = mysqli_fetch_array($ambilmapel)) {
						?>
							<td><?= $baris["mapel"]; ?></td>
						<?php
						}
						?>
					</tr>
				<?php
					$i++;
				}
				?>
			</tbody>
		</table>
	</div>

	<div id="modal-tambah-produk" class="modal">
		<!-- Modal content -->
		<div class="modal-content cf">
			<div class="form-penambahan-produk">
				<form action="" method="post">
					<table>
						<tr>
							<th>
								<label for="id-produk">ID Produk : </label>
							</th>
							<td>
								<input type="text" id="id-produk" name="id-produk" value="<?= $generatedId; ?>" class="readonly" readonly>
							</td>
						</tr>
						<tr>
							<th>
								<label for="nama-produk">Nama : </label>
							</th>
							<td>
								<input type="text" id="nama-produk" name="nama-produk" required>
							</td>
						</tr>
						<tr>
							<th>
								<label for="harga">Harga (Rp) : </label>
							</th>
							<td>
								<input type="number" id="harga" name="harga" min="1" required>
							</td>
						</tr>
						<tr>
							<th>
								<label for="stock">Stock : </label>
							</th>
							<td>
								<input type="number" id="stock" name="stock" min="1" required>
							</td>
						</tr>
					</table>
					<button type="submit" name="tambah_produk_btn" class="btn btn-tambah-produk" id="submit-produk"><i class="fas fa-plus-circle"></i> Tambahkan Produk</button>
				</form>
			</div>
		</div>
	</div>

	<div id="modal-edit-produk" class="modal">
		<!-- Modal content -->
		<div class="modal-content cf">
			<div class="form-penambahan-produk">
				<form action="" method="post">
					<table>
						<tr>
							<th>
								<label for="id-produk">ID Produk : </label>
							</th>
							<td>
								<input type="text" id="id-produk" name="id-produk" value="<?= $generatedId; ?>" class="readonly" readonly>
							</td>
						</tr>
						<tr>
							<th>
								<label for="nama-produk">Nama : </label>
							</th>
							<td>
								<input type="text" id="nama-produk" name="nama-produk" required>
							</td>
						</tr>
						<tr>
							<th>
								<label for="harga">Harga (Rp) : </label>
							</th>
							<td>
								<input type="number" id="harga" name="harga" min="1" required>
							</td>
						</tr>
						<tr>
							<th>
								<label for="stock">Stock : </label>
							</th>
							<td>
								<input type="number" id="stock" name="stock" min="1" required>
							</td>
						</tr>
					</table>
					<button type="submit" name="edit_produk_btn" class="btn btn-edit-produk" id="submit-produk"><i class="fas fa-check-circle"></i> Edit Produk</button>
				</form>
			</div>
		</div>
	</div>

	<div id="modal-product-added" class="modal" <?php if ($isSuccessfullyAdded) : ?> style="display: block;" <?php endif ?>>
		<!-- Modal content -->
		<div class="modal-content modal-notification">
			<div class="notification">
				<i class="fas fa-check-circle notification-icon"></i>
				<p class="notification-text">Produk berhasil ditambahkan!</p>
				<button class="btn btn-confirmation" id="btn-confirmation" onclick="closeModal();">Selesai</button>
			</div>
		</div>
	</div>

	<div id="modal-product-add-failed" class="modal" <?php if (!$isSuccessfullyAdded) : ?> style="display: block;" <?php endif ?>>
		<!-- Modal content -->
		<div class="modal-content modal-notification">
			<div class="notification">
				<i class="fas fa-times-circle notification-icon-failed"></i>
				<p class="notification-text">Produk Gagal Ditambahkan!</p>
				<button class="btn btn-confirmation" id="btn-confirmation" onclick="closeModal();">Tutup</button>
			</div>
		</div>
	</div>

	<div id="modal-delete" class="modal">
		<!-- Modal content -->
		<div class="modal-content modal-notification">
			<div class="notification">
				<i class="fas fa-exclamation-triangle notification-icon" style="color: #BA2929"></i>
				<p class="notification-text">Hapus produk dari daftar?</p>
				<button class="btn btn-batal" id="btn-confirmation">Batal</button>
				<a href="#!" id="btn-confirm-hapus"><button class="btn btn-hapus">Hapus</button></a>
			</div>
		</div>
	</div>
</main>

<?php include "footer.php"; ?>