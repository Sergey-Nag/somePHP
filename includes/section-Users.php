<?php 
require_once 'db.php';
$result = $mysqli->query("SELECT COUNT(*) FROM `users-mydb`")->fetch_assoc();
$usersAmount = array_shift($result);

$allUsers = $mysqli->query("SELECT * FROM `users-mydb`");
?>

<section id="sectionUser" class="h-100" style="overflow: scroll;">
  <div class="header-wrapp row pt-1">
    <div class="col-3">
      <h2>Users</h2>
    </div>
    <div class="col-9">

      <div class="input-group input-group-sm mb-3">
        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
        </div>
      </div>

    </div>
  </div>
  <div class="row p-3">
    <table class="table table-sm">
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
        <tr class="<? echo ($row['isAdmin'])?  'text-green':''?>">
          <th scope="row">
            <? echo $row['ID'] ?>
          </th>
          <td>
            <? echo $row['Nickname'] ?>
          </td>
          <td>
            <? echo $row['Name'] ?>
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
