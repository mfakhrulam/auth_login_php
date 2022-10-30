<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Authentication</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>
  <div class="container">
    <div class="card shadow-lg position-absolute top-50 start-50 translate-middle" style="width: 24rem">
      <img src="assets/img/login_image.jpg" class="card-img-top" alt="login image" />
      <div class="card-body">
        <h3 class="card-title">Login Form</h3>
        <form method="POST" name="formLogin" action="#" class="mb-3">
          <div class="mb-3">
            <label for="inputUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="inputUsername" name="uname">
          </div>
          <div class="mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="pass">
          </div>
          <div class="d-md-flex justify-content-md-end">
            <input type="submit" name="TbLogin" class="btn btn-primary" value="Submit" />
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  session_start();

  if (isset($_SESSION['isLogin']) && !empty($_SESSION['isLogin'])) {
    if ($_SESSION['isLogin']) {
      header("Location: dashboard.php");
    }
  }

  if (isset($_POST['TbLogin'])) {
    $message = [];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if (trim($uname) == "") {
      $message[] = "Data Username kosong";
    }
    if (trim($pass) == "") {
      $message[] = "Data Password kosong";
    }
    $conn = mysqli_connect("localhost", "root", "", "auth_login_php");
    if ($conn === false) {
      die("ERROR: Tidak dapat tersambung. " . mysqli_connect_error());
    } else {
      $sql = "SELECT * FROM `user`";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          if ($uname == $row["username"] && $pass == $row["password"]) {
            $_SESSION['uname'] = $uname;
            $_SESSION['isLogin'] = true;
            header("Location: dashboard.php");
          }
        }
        $message[] = "User dan Password lama belum benar";
        $messageAlert = "";
        if (!count($message) == 0) {
          foreach ($message as $indeks => $msg) {
            $messageAlert .= $msg . "\\n";
          }
        }
        echo '<script> alert("' . $messageAlert . '"); </script>';
      }
    }
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>