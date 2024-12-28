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
	<div class="cf">
		<!-- menampilkan informasi jumlah produk baru sebulan terakhir -->
		<div class="col-lg-6 col-xl-3">
			<div class="bg-white rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
				<div class="d-flex align-items-center justify-content-start">
					<div class="me-4">
						<i class="fas fa-tags icon-widget"></i>
					</div>
					<div>
						<a class="text-muted mb-1 text-decoration-none" href="data_product.php"><small>Product on Dev</small></a>
						<?php
						// sql statement untuk menampilkan jumlah data pada tabel "tbl_member" berdasarkan "jenis_member"
						$query = mysqli_query($conn, "SELECT COUNT(id_user) as jumlah FROM user;")
							or die('Ada kesalahan pada query jumlah data member gratis : ' . mysqli_error($conn));
						// ambil data hasil query
						$data = mysqli_fetch_assoc($query);
						// buat variabel untuk menampilkan data
						$jumlah_member_gratis = $data['jumlah'];
						?>
						<!-- tampilkan data -->
						<h5 class="fw-bold mb-0"><?php echo number_format($jumlah_member_gratis, 0, '', '.'); ?></h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php include "footer.php"; ?>