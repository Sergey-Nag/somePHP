<?php
require '../db.php';

$for = $_POST['for'];
$from = $_POST['from'];
$get = $_POST['get'];
$search = $_POST['search'];
$data = $_POST['data'];

$dEmail = $_POST['regEmail'];
$dName = $_POST['regName'];
$dNickname = $_POST['regNickname'];
$dPass = $_POST['regPass'];


$answer = 'false';

if ($for == 'check') {
  
// Поиск по никнейму
  $query = "SELECT * FROM `$from` WHERE `Nickname` LIKE '$search' ORDER BY `$get` ASC";
  $result = $mysqli->query($query);
  
  while ($row = $result->fetch_assoc()) {
    $answer = $row['Nickname'];
  }
  
//  if ($result[0]->Nickname == '') $answer = 'not found';
  
  
} else if ($for == 'register') {
  if (!empty($dEmail) &&
      !empty($dName) &&
      !empty($dNickname) &&
      !empty($dPass)) {
    
    $date = date('Y-m-d');
    $pass = password_hash($dPass, PASSWORD_BCRYPT, [
      'cost' => 12,
    ]);
    
    if ($pass !== false) {
//     Добавление пользователя в БД
      $res = $mysqli->query("INSERT INTO `users-mydb` (`ID`, `Nickname`, `Name`, `Email`, `Pass`, `RegDate`, `isAdmin`) VALUES (NULL, '$dNickname', '$dName', '$dEmail', '$pass', '$date', '0')");
      
      if ($res == true) $answer = 'done';
      else $answer = 'something wrong';
      
    } else $answer = 'error';
  }
}
  
echo $answer;

$mysqli->close();