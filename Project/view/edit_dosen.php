<!DOCTYPE html>
<html>

<head>
  <title>Edit Dosen</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
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

  <form method="post" action="index.php?page=update_dosen&id=<?= $dosen['id'] ?>">

      <br><br>
      <div class="card">

        <div class="card-header bg-warning">
          <h1 class="text-white text-center"> Edit Dosen </h1>
        </div><br>

        <input type="hidden" name="id" value="<?= $dosen['id'] ?>" class="form-control"> <br>

        <label> Nama: </label>
        <input type="text" name="nama" value="<?= $dosen['nama'] ?>" class="form-control"> <br>

        <label> NIP: </label>
        <input type="text" name="nip" value="<?= $dosen['nip'] ?>" class="form-control"> <br>

        <label> Email: </label>
        <input type="text" name="email" value="<?= $dosen['email'] ?>" class="form-control"> <br>

        <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
        <a class="btn btn-info" type="submit" name="cancel" href="create_dosen.php"> Cancel </a><br>

      </div>
    </form>
  </div>
</body>

</html>