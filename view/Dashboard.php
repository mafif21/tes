<?php
session_start();
require("../config/connect.php");

if (!isset($_SESSION["login"])) {
  header("Location: Login.php");
}

if (isset($_SESSION["id"])) {
  $userId = $_SESSION["id"];
  $query = "SELECT * FROM users WHERE id='$userId'";

  $userLogin = mysqli_query($db, $query);
  $datas = [];

  while ($data = mysqli_fetch_assoc($userLogin)) {
    $datas[] = $data;
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary py-3">
    <div class="container">
      <a class="navbar-brand" href="#"><?= $datas[0]["username"] ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="#">Products</a>
          <a class="nav-link" href="#">History</a>
          <a class="nav-link" href="#">Profile</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container d-flex min-vh-100 justify-content-center align-items-center">
    <div class="text-center">
      <h1 class="mb-3">Hello, <?= $datas[0]["username"] ?>👋</h1>

      <!-- perhatikan bagian ini -->
      <form action="../config/LogoutController.php" method="post">
        <button type="submit" class="btn btn-danger" name="logout">Logout Here❕</button>
      </form>
      <!-- perhatikan bagian ini -->

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>