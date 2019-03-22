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

$login = $_POST['loginEmail'];
$password = $_POST['password'];
$checkbox = $_POST['checkThisShit'];

$logout = $_GET['logout'];

$answer = 'false';

if (isset($logout) && $logout == true) {
  session_start();
  session_unset();
  session_destroy();
  setcookie(session_name(), '', time() - 60*60*24*32, '/');
  header('Location: /');
  exit();
}
session_start();

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
} else if ($for == 'login') {

  if (!empty($login) && !empty($password)) {
    $res = false;
    if (preg_match("/@/", $login)) $res = $mysqli->query("SELECT * FROM `users-mydb` WHERE `Email` LIKE '$login'");
    else $res = $mysqli->query("SELECT * FROM `users-mydb` WHERE `Nickname` LIKE '$login'");
    
    if ($res !== NULL) {
      while ($row = $res->fetch_assoc()) {
        $pass_hash = $row['Pass'];
        $user_id = $row['ID'];
        $isAdmin = $row['isAdmin'];
        $username = $row['Name'];
        $nickname = $row['Nickname'];
      }

      if (password_verify($password, $pass_hash)) {
        if ($checkbox == 'on') {
            session_unset();
            session_destroy();
            setcookie(session_name(), '', time() - 60*60*24*32, '/');
            $answer = 'beye';
        } else {
            $answer = 'confirm';
            $_SESSION['username'] = $username;
            $_SESSION['nickname'] = $nickname;
            $_SESSION['admin'] = $isAdmin;
            $_SESSION['user_id'] = $user_id;
        }
      }
    } else $answer = 'user not found';
    // $answer = $login.' '.gettype($res).' '.$res[0]['ID'].'_';

  } else $answer = 'login/pass is empty';

}

echo $answer;

$mysqli->close();
