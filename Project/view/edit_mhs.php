<!DOCTYPE html>
<html>

<head>
  <title>Edit Mahasiswa</title>

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

    <form method="post" action="index.php?page=update&id=<?= $mahasiswa['id'] ?>">

      <br><br>
      <div class="card">

        <div class="card-header bg-warning">
          <h1 class="text-white text-center"> Edit Mahasiswa </h1>
        </div><br>

        <input type="hidden" name="id" value="<?= $mahasiswa['id'] ?>" class="form-control"> <br>

        <label> Nama: </label>
        <input type="text" name="nama" value="<?= $mahasiswa['nama'] ?>" class="form-control"> <br>

        <label> NIM: </label>
        <input type="text" name="nim" value="<?= $mahasiswa['nim'] ?>" class="form-control"> <br>

        <label> Email: </label>
        <input type="text" name="email" value="<?= $mahasiswa['email'] ?>" class="form-control"> <br>

        <label> No.Telp: </label>
        <input type="text" name="no_tlp" value="<?= $mahasiswa['no_tlp'] ?>" class="form-control"> <br>

        <label> Join Date: </label>
        <input type="date" name="join_date" value="<?= $mahasiswa['join_date'] ?>" class="form-control"> <br>

        <label class="form-label">Peminatan:</label>
        <select name="id_peminatan" class="form-control" required>
          <option value="">-- Pilih Peminatan --</option>
          <?php foreach ($peminatan as $p) : ?>
            <option value="<?= $p['id'] ?>" <?= ($p['id'] == $mahasiswa['id_peminatan']) ? 'selected' : '' ?>>
              <?= $p['nama_peminatan'] ?>
            </option>
          <?php endforeach; ?>
        </select><br>

        <label class="form-label">Dosen:</label>
        <select name="id_dosen" class="form-control" required>
          <option value="">-- Pilih Dosen --</option>
          <?php foreach ($dosen as $d) : ?>
            <option value="<?= $d['id'] ?>" <?= ($d['id'] == $mahasiswa['id_dosen']) ? 'selected' : '' ?>>
              <?= $d['nama'] ?>
            </option>
          <?php endforeach; ?>
        </select><br>

        <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
        <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

      </div>
    </form>
  </div>
</body>

</html>