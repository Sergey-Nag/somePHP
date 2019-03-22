<?php 
require_once 'db.php';
$result = $mysqli->query("SELECT COUNT(*) FROM `users-mydb`")->fetch_assoc();
$usersAmount = array_shift($result);

?>

<section id="sectionDatabase">
  <h2>Database</h2>
</section>
