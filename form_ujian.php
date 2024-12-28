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
    <div>
      <?php
      $ambildata = mysqli_query($mysqli, "SELECT * FROM mapel, ujian where ujian.id_mapel=mapel.id_mapel");
      $data = mysqli_fetch_array($ambildata);
      ?>
      <h1 style="margin-left: 200px;"><?= $data['jenis_ujian']; ?> - <?= $data['mapel']; ?></h1>
    </div>
  </div>
  <div class="content-produk">
    <div>
      <?php
      $limit = 1;
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      } else {
        $page = 1;
      }
      $offset = ($page - 1) * $limit;
      $no = $offset + 1; // Dimulai dari nomor yang sesuai dengan halaman
      $ambildata = mysqli_query($mysqli, "SELECT * FROM soal, ujian where soal.id_ujian=ujian.id_ujian order by soal asc LIMIT $limit OFFSET $offset");
      while ($data = mysqli_fetch_array($ambildata)) {
        $get_id_product = $data['id_mapel'];
      ?>
        <div class="card m-3" style="width: 1000px;">
          <div class="card-body">
            <h3>Soal No.<?= $no; ?></h3>
            <p><?= $data["soal"]; ?></p>
            <br>
            <form action="" class="card-text">
              <label for="soal_1">
                <h3>Jawaban</h3>
              </label>
              <input style="width: 700px;" type="text" name="soal_1" class="form-control">
            </form>
          </div>

        </div>
      <?php
        $no++;
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

      ?>
      <div class="d-flex" style="margin-left: 300px;">
        <?php
        // Tombol Previous
        if ($page > 1) {
          echo "<li class='page-item'><a class='page-link' href='?page=" . ($page - 1) . "'>Prev</a></li>";
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
        ?>
      </div>
      <?php
      echo "</ul></nav>";
      ?>
    </div>
  </div>
</main>

<?php include "footer.php"; ?>