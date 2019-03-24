<?php
require_once 'db.php';
$logined = false;

if (isset($_COOKIE['PHPSESSID'])) {
  session_start();
  if (isset($_SESSION['user_id'])) $logined = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>PHP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/login.css">
</head>

<body>

  <header class="fixed-top">
    <?php require 'header.php'; ?>
  </header>

  <main style="height: 100vh">
    <?php
        if (!$logined) require 'loginForm.php';
        else {
          if ($_SESSION['admin']) {
            echo '<div class="d-flex align-items-center h-100">
            <div class="mx-auto">
              <span>Hello Mr.'.$_SESSION['username'].'</span><br>
              <a href="/admin.php">Go to admin</a> | 
              <a href="/query/datab.php?logout=true">log out</a>
            </div>
          </div>';
          } else {
            echo '<div class="d-flex align-items-center h-100">
            <div class="mx-auto">
              <span>Hello Mr.'.$_SESSION['username'].'</span><br>
              <a href="/query/datab.php?logout=true">log out</a>
            </div>
          </div>';
          }
        }
      ?>
  </main>

  <footer>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
</body>

</html>
