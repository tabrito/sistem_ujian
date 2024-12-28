<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikum_ujian";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Menentukan jumlah data per halaman
$limit = 1; // Jumlah data per halaman

// Menentukan halaman saat ini (default 1)
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

// Menghitung offset (berdasarkan halaman saat ini)
$offset = ($page - 1) * $limit;

// Query untuk mengambil data dari tabel
$sql = "SELECT * FROM soal LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

// Menampilkan data
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row["id_soal"] . " - Name: " . $row["soal"] . "<br>";
  }
} else {
  echo "No results found";
}

// Menghitung jumlah total data
$sql_count = "SELECT COUNT(*) AS total FROM soal";
$result_count = $conn->query($sql_count);
$row_count = $result_count->fetch_assoc();
$total_data = $row_count['total'];

// Menghitung jumlah total halaman
$total_pages = ceil($total_data / $limit);

// Menampilkan link pagination
echo "<br><nav aria-label='Page navigation'><ul class='pagination'>";

// Tombol Previous
if ($page > 1) {
  echo "<li class='page-item'><a class='page-link' href='?page=" . ($page - 1) . "'>Previous</a></li>";
}

// Link halaman
for ($i = 1; $i <= $total_pages; $i++) {
  if ($i == $page) {
    echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
  } else {
    echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
  }
}

// Tombol Next
if ($page < $total_pages) {
  echo "<li class='page-item'><a class='page-link' href='?page=" . ($page + 1) . "'>Next</a></li>";
}

echo "</ul></nav>";

// Menutup koneksi
$conn->close();
