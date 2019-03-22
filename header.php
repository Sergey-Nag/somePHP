<?php
$ip = 'none';
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }

if ($_SERVER['PHP_SELF'] == '/index.php') {
?>

<nav class="navbar shadow justify-content-center navbar-dark bg-primary">
  <span class="navbar-text">
    Hello
    <? echo (!empty($_SESSION['nickname']))? $_SESSION['nickname']: $ip; ?>
    <i class="far fa-laugh"></i>
  </span>
</nav>

<?php } else {; ?>

<nav class="navbar shadow-sm justify-content-center navbar-dark bg-primary">
  <div class="container">
    <div class="col-6">
      <span class="navbar-text">
        Hello
        <? echo $_SESSION['nickname']; ?>
        <i class="far fa-laugh"></i>
      </span>
    </div>
    <div clss="col-6">
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-outline-warning">Logout</button>
      </div>
    </div>
  </div>

</nav>

<?php }; ?>
