<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Create Peminatan</title>
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
  <div class="col-lg-6 m-auto">

    <form method="post" action="index.php?page=store_peminatan">
      <br><br>
      <div class="card">

        <div class="card-header bg-primary">
          <h1 class="text-white text-center">Create Peminatan</h1>
        </div><br>

        <?php if (isset($_GET['error']) && $_GET['error'] == 1) : ?>
          <div class="alert alert-danger">Terjadi kesalahan saat menyimpan data!</div>
        <?php endif; ?>

        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Nama Peminatan:</label>
            <input type="text" name="nama_peminatan" class="form-control" required>
          </div>

          <div class="mb-3">
            <button class="btn btn-success" type="submit" name="submit">Submit</button>
            <a class="btn btn-info" href="create_peminatan">Cancel</a>
          </div>
        </div>
      </div>
    </form>
    <br>

    <?php
    include "connection.php";
    $sql = "SELECT * FROM peminatan";
    $result = $conn->query($sql);
    ?>


    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>NAMA PEMINATAN</th>
          <th>ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (!$result) {
          echo "<tr><td colspan='8' class='text-center'>Database error: " . $conn->error . "</td></tr>";
        } else if ($result->num_rows == 0) {
          echo "<tr><td colspan='8' class='text-center'>Tidak ada data peminatan</td></tr>";
        } else {
          while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
              <th>" . $row['id'] . "</th>
              <td>" . $row['nama_peminatan'] . "</td>
              <td>
                <a class='btn btn-success btn-sm' href='index.php?page=edit_peminatan&id=" . $row['id'] . "'>Edit</a>
                <a class='btn btn-danger btn-sm' href='index.php?page=delete_peminatan&id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
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