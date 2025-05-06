<?php
include "connection.php";
require_once "controller/ControllerMhs.php";
require_once "controller/ControllerDosen.php";
require_once "controller/ControllerPeminatan.php";

// Buat objek controller
$controllerMhs = new ControllerMhs();
$controllerDosen = new ControllerDosen();
$controllerPeminatan = new ControllerPeminatan();

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($page) {
    // Mahasiswa
    case 'create':
        $controllerMhs->create();
        exit;
    case 'store':
        $controllerMhs->store();
        exit;
    case 'edit':
        $controllerMhs->edit($id);
        exit;
    case 'update':
        $controllerMhs->update($id);
        exit;
    case 'delete':
        $controllerMhs->delete($id);
        exit;

    // Dosen
    case 'create_dosen':
        $controllerDosen->create();
        exit;
    case 'store_dosen':
        $controllerDosen->store();
        exit;
    case 'edit_dosen':
        $controllerDosen->edit($id);
        exit;
    case 'update_dosen':
        $controllerDosen->update($id);
        exit;
    case 'delete_dosen':
        $controllerDosen->delete($id);
        exit;

    // Peminatan
    case 'create_peminatan':
      $controllerPeminatan->create();
      exit;
    case 'store_peminatan':
        $controllerPeminatan->store();
        exit;
    case 'edit_peminatan':
        $controllerPeminatan->edit($id);
        exit;
    case 'update_peminatan':
        $controllerPeminatan->update($id);
        exit;
    case 'delete_peminatan':
        $controllerPeminatan->delete($id);
        exit;

    default:
        break;
}

// Join Table untuk peminantan dan dosen
include "connection.php";
$sql = "SELECT m.*, d.nama as nama_dosen, p.nama_peminatan 
        FROM mahasiswa m
        LEFT JOIN dosen d ON m.id_dosen = d.id
        LEFT JOIN peminatan p ON m.id_peminatan = p.id";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Data Peminatan Mahasiswa</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Data Peminatan Mahasiswa</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Mahasiswa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=create_dosen">Dosen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=create_peminatan">Peminatan</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <h3 style="text-align: center; font-weight: bold; padding-top: 50px">DATA PEMINATAN MAHASISWA</h3>
  <div class="container my-4">
    <div class="row">
      <div class="col-md-6">
        <a type="button" class="btn btn-primary mb-3" href="index.php?page=create">Add New</a>
      </div>
    </div>
    
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>NAMA</th>
          <th>NIM</th>
          <th>NO.TELP</th>
          <th>JOIN DATE</th>
          <th>PEMINATAN</th>
          <th>DOSEN</th>
          <th>ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (!$result) {
          echo "<tr><td colspan='8' class='text-center'>Database error: " . $conn->error . "</td></tr>";
        } else if ($result->num_rows == 0) {
          echo "<tr><td colspan='8' class='text-center'>Tidak ada data mahasiswa</td></tr>";
        } else {
          while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
              <th>" . $row['id'] . "</th>
              <td>" . $row['nama'] . "</td>
              <td>" . $row['nim'] . "</td>
              <td>" . $row['no_tlp'] . "</td>
              <td>" . $row['join_date'] . "</td>
              <td>" . ($row['nama_peminatan'] ?? $row['id_peminatan']) . "</td>
              <td>" . ($row['nama_dosen'] ?? $row['id_dosen']) . "</td>
              <td>
                <a class='btn btn-success btn-sm' href='index.php?page=edit&id=" . $row['id'] . "'>Edit</a>
                <a class='btn btn-danger btn-sm' href='index.php?page=delete&id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
              </td>
            </tr>
            ";
          }
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>