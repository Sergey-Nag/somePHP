<?php 
require_once 'db.php';
$usersAmount = array_shift($result);

$allUsers = $mysqli->query("SELECT * FROM `users-mydb`");
$userId = $_GET['userid'];

 if (!isset($userId)) { 
$result = $mysqli->query("SELECT COUNT(*) FROM `users-mydb`")->fetch_assoc();

?>
<section id="sectionUser" class="h-100" style="overflow: scroll;">
  <div class="header-wrapp row pt-1 mx-0">
    <div class="col-3 p-0">
      <h2>Users</h2>
    </div>
    <div class="col-9 p-0">

      <div class="input-group input-group mb-3">
        <input type="text" class="form-control" placeholder="Users search" aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
        </div>
      </div>

    </div>
  </div>
  <div class="row p-0 mx-0">
    <table class="table table-sm table-hover">
      <?php 
        $keys = $mysqli->query('SHOW COLUMNS FROM `users-mydb`')->fetch_assoc();
        $keysAmount = $keys->num_rows;
      ?>
      <thead>
        <tr>
          <th scope='col'>ID</th>
          <th scope='col'>Nickname</th>
          <th scope='col'>Name</th>
          <th scope='col'>Email</th>
          <th scope='col'>RegDate</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $allUsers->fetch_assoc()) {?>
        <tr class="<? echo ($row['isAdmin'])?  'text-green':''?>" ondblclick="openUser(this)">
          <th scope="row">
            <? echo $row['ID'] ?>
          </th>
          <td>
            <? echo $row['Nickname'] ?>
          </td>
          <td>
            <? echo ($row['isAdmin'])? $row['Name'].' <i class="fas fa-shield-alt"></i>': $row['Name'] ?>
          </td>
          <td>
            <? echo $row['Email'] ?>
          </td>
          <td>
            <? echo $row['RegDate'] ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</section>
<? } else { 
$User = $mysqli->query("SELECT * FROM `users-mydb` WHERE `ID` = $userId");
$User = $User->fetch_assoc();
?>

<section id="userInfo" class="h-100" style="overflow: scroll;">
  <div class="header-wrapp row pt-1 mx-0">
    <div class="col-3 p-0">
      <button class="btn btn-sm float-left mr-3 ml-1 py-2" onclick="backToUsers()"><i class="fas fa-arrow-left"></i></button>
      <h2 id="user-name">
        <? echo ($User['isAdmin'])? $User['Name'].' <i class="fas fa-user-shield"></i>': $User['Name'] ?>
      </h2>
    </div>
    <div class="col-9 p-0">

    </div>
  </div>
  <div class="row p-0 mx-0">
    
  </div>
</section>

<? } ?>
