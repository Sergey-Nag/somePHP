<?php
require_once 'db.php';
require 'functions.php';
$logined = false;

if (isset($_COOKIE['PHPSESSID'])) {
  session_start();
  if (isset($_SESSION['user_id'])) $logined = true;
}
$tab= $_GET['page'];
$editPage = $_GET['edit']
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>PHP | admin
    <?php echo ($tab)? (($editPage)? "• $tab • $editPage":"• $tab") : "" ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div id="errorBlock" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="alertHead row">

          <div id="textError" class="col-9 p-4">
            A simple warning alert—check it out!
          </div>
          <div class="col-2 p-3">
            <button id="hideError" class="btn btn-danger">x</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <header class="fixed-top">
    <?php require 'header.php'; ?>
  </header>

  <main style="height: 100vh; padding-top: 55px">
    <?php if ($_SESSION['admin']) {?>
    <div class="container-fluid h-100 py-3">
      <div class="row h-100">
        <div class="col-3 h-100 pr-0">
          <div class="card p-3 shadow-sm h-100">
            <?php include 'includes/left-menu.php'?>
          </div>
        </div>
        <div class="col-9 h-100">
          <div id="VIEW" class="card p-3 shadow-sm h-100">
            <?php
              if ($tab) include 'includes/section-'.$tab.'.php';
            ?>
          </div>
        </div>
      </div>

    </div>

    <?php } else {?>

    <div class="d-flex align-items-center h-100">
      <div class="mx-auto" style="width: 45vw">
        <div class="card p-5 text-center"><i>
            <?php echo $_SESSION['nickname'] ?>, you don`t have permissions for looking this page</i></div>
      </div>
    </div>

    <?php } ?>
  </main>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
  <? if ($_GET['edit']) echo '<script src="js/pageEditor.js"></script>'?>
</body>

</html>
