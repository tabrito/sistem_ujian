<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "praktikum_ujian");

if (isset($_POST["addKelas"])) {
	// Ambil data dari setiap elemen dalam form
	$id_kelas = $_POST["id_kelas"];
	$kelas = $_POST["kelas"];
	$ruangan = $_POST["ruangan"];
	$ketua_kelas = $_POST["ketua_kelas"];

	// Query insert data
	$addToTable = mysqli_query($conn, "INSERT INTO kelas (id_kelas, kelas, ruangan, ketua_kelas) VALUES ('$id_kelas', '$kelas', '$ruangan', '$ketua_kelas');");
	if ($addToTable) {
	} else {
	}
}

if (isset($_POST['editKelas'])) {
	$id_kelas = $_POST["id_kelas"];
	$kelas = $_POST["kelas"];
	$ruangan = $_POST["ruangan"];
	$ketua_kelas = $_POST["ketua_kelas"];

	$addToTable = mysqli_query($conn, "UPDATE kelas SET kelas='$kelas', ruangan='$ruangan', ketua_kelas='$ketua_kelas' WHERE id_kelas='$id_kelas'");
	if ($addToTable) {
		// header('location:index.php');
	} else {
	}
}

if (isset($_POST['deleteKelas'])) {
	$id_kelas = $_POST['id_kelas'];

	$addToTable = mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas='$id_kelas'");
	if ($addToTable) {
		// header('location:index.php');
	} else {
	}
}

if (isset($_POST["addGuru"])) {
	// Ambil data dari setiap elemen dalam form
	$nip = $_POST["nip"];
	$guru = $_POST["guru"];
	$tanggal_lahir = $_POST["tanggal_lahir"];
	$alamat = $_POST["alamat"];

	// Query insert data
	$addToTable = mysqli_query($conn, "INSERT INTO guru (nip, guru, tanggal_lahir, alamat, id_user) VALUES ('$nip', '$guru', '$tanggal_lahir', '$alamat', 'U-001');");
	if ($addToTable) {
		// header('location:jadwal.php');
	} else {
		// header('location:dashboard.php');
	}
}

if (isset($_POST['editGuru'])) {
	$nip = $_POST["nip"];
	$guru = $_POST["guru"];
	$tanggal_lahir = $_POST["tanggal_lahir"];
	$alamat = $_POST["alamat"];

	$addToTable = mysqli_query($conn, "UPDATE guru SET guru='$guru', tanggal_lahir='$tanggal_lahir', alamat='$alamat' WHERE nip='$nip'");
	if ($addToTable) {
		// header('location:index.php');
	} else {
	}
}

if (isset($_POST['deleteGuru'])) {
	$nip = $_POST['nip'];

	$addToTable = mysqli_query($conn, "DELETE FROM guru WHERE nip='$nip'");
	if ($addToTable) {
		// header('location:dashboard.php');
	} else {
	}
}

if (isset($_POST["addMapel"])) {
	// Ambil data dari setiap elemen dalam form
	$id_mapel = $_POST["id_mapel"];
	$mapel = $_POST["mapel"];
	$id_guru = $_POST["id_guru"];

	// Query insert data
	$addToTable = mysqli_query($conn, "INSERT INTO mapel (id_mapel, mapel, id_guru) VALUES ('$id_mapel', '$mapel', '$id_guru');");
	if ($addToTable) {
		// header('location:jadwal.php');
	} else {
		// header('location:dashboard.php');
	}
}

if (isset($_POST['editMapel'])) {
	$id_mapel = $_POST["id_mapel"];
	$mapel = $_POST["mapel"];
	$id_guru = $_POST["id_guru"];

	$addToTable = mysqli_query($conn, "UPDATE mapel SET mapel='$mapel', id_guru='$id_guru' WHERE id_mapel='$id_mapel'");
	if ($addToTable) {
		// header('location:dashboard.php');
	} else {
	}
}

if (isset($_POST['deleteMapel'])) {
	$id_mapel = $_POST['id_mapel'];

	$addToTable = mysqli_query($conn, "DELETE FROM mapel WHERE id_mapel='$id_mapel'");
	if ($addToTable) {
		// header('location:dashboard.php');
	} else {
	}
}

if (isset($_POST["addSiswa"])) {
	// Ambil data dari setiap elemen dalam form
	$nis = $_POST["nis"];
	$siswa = $_POST["siswa"];
	$tanggal_lahir = $_POST["tanggal_lahir"];
	$alamat = $_POST["alamat"];
	$kontak = $_POST["kontak"];
	$id_kelas = $_POST["id_kelas"];

	// Query insert data
	$addToTable = mysqli_query($conn, "INSERT INTO siswa (nis, siswa, tanggal_lahir, alamat, kontak, id_kelas, id_user) VALUES ('$nis', '$siswa', '$tanggal_lahir', '$alamat', '$kontak', '$id_kelas', 'U-002');");
	if ($addToTable) {
		// header('location:jadwal.php');
	} else {
		// header('location:dashboard.php');
	}
}

if (isset($_POST['editSiswa'])) {
	$nis = $_POST["nis"];
	$siswa = $_POST["siswa"];
	$tanggal_lahir = $_POST["tanggal_lahir"];
	$alamat = $_POST["alamat"];
	$kontak = $_POST["kontak"];
	$id_kelas = $_POST["id_kelas"];

	$addToTable = mysqli_query($conn, "UPDATE siswa SET siswa='$siswa', tanggal_lahir='$tanggal_lahir', alamat='$alamat', kontak='$kontak', id_kelas='$id_kelas' WHERE nis='$nis'");
	if ($addToTable) {
		// header('location:dashboard.php');
	} else {
	}
}

if (isset($_POST['deleteSiswa'])) {
	$nis = $_POST['nis'];

	$addToTable = mysqli_query($conn, "DELETE FROM siswa WHERE nis='$nis'");
	if ($addToTable) {
		// header('location:dashboard.php');
	} else {
	}
}

if (isset($_POST["addUser"])) {
	// Ambil data dari setiap elemen dalam form
	$id_user = $_POST["id_user"];
	$no_induk = $_POST["no_induk"];
	$password = $_POST["password"];
	$fullname = $_POST["fullname"];
	$role = $_POST["role"];

	// Query insert data
	$addToTable = mysqli_query($conn, "INSERT INTO user (id_user, no_induk, password, fullname, role) VALUES ('$id_user', '$no_induk', '$password', '$fullname', '$role');");
	if ($addToTable) {
		// header('location:jadwal.php');
	} else {
		// header('location:dashboard.php');
	}
}

if (isset($_POST['editUser'])) {
	$id_user = $_POST["id_user"];
	$no_induk = $_POST["no_induk"];
	$password = $_POST["password"];
	$fullname = $_POST["fullname"];
	$role = $_POST["role"];

	$addToTable = mysqli_query($conn, "UPDATE user SET no_induk='$no_induk', password='$password', fullname='$fullname', role='$role' WHERE id_user='$id_user'");
	if ($addToTable) {
		// header('location:dashboard.php');
	} else {
	}
}

if (isset($_POST['deleteUser'])) {
	$id_user = $_POST['id_user'];

	$addToTable = mysqli_query($conn, "DELETE FROM user WHERE id_user='$id_user'");
	if ($addToTable) {
		// header('location:dashboard.php');
	} else {
	}
}
