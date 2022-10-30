<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Authentication</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/style.css" />
</head>

<body>
  <div class="container">
    <div class="card shadow position-absolute top-50 start-50 translate-middle" style="width: 24rem">
      <div class="card-header">Mini Dashboard</div>
      <div class="card-body">
        <h5 class="card-title">Selamat Datang User</h5>
        <p class="card-text">
          Selamat kamu telah berhasil login, silakan akses fitur yang ada di web kami (belum ada wkwk). Jika ingin logout silakan tekan tombol Logout di bawah
        </p>
        <form method="POST" name="formLogout" action="#">
          <input type="submit" name="TbLogout" class="btn btn-primary" value="Logout" />
        </form>

      </div>
    </div>
  </div>

  <?php
  session_start();
  if (!isset($_SESSION['isLogin'])) {
    header("Location: index.php");
  }

  if (isset($_POST['TbLogout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>