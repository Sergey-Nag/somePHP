<?php
$ip = 'none';
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
?>
<header class="fixed-top">

  <nav class="navbar shadow justify-content-center navbar-dark bg-primary">
    <span class="navbar-text">
      Hello
      <? echo (!empty($ip))? $ip: 'boy'; ?>
      <i class="far fa-laugh"></i>
    </span>
  </nav>

</header>
