<?php 
require_once 'db.php';
$result = $mysqli->query("SELECT COUNT(*) FROM `users-mydb`")->fetch_assoc();
$usersAmount = array_shift($result);
$tab = $_GET['page'];
?>
<div class="btn-group-vertical" role="group" aria-label="Button group with nested dropdown">
  <button type="button" class="btn btn-outline-info" data-link-q="?page=Users">Users
    <span class="badge badge-primary">
      <?echo$usersAmount?></span>
  </button>
  <button type="button" class="btn btn-outline-info" data-link-q="?page=Database">Database
  </button>

  <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Dropdown
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <a class="dropdown-item" href="#">Dropdown link</a>
      <a class="dropdown-item" href="#">Dropdown link</a>
    </div>
  </div>
</div>
<?php if ($tab) {?>


<script>
  document.querySelectorAll('button[data-link-q]').forEach((el) => {
    if (el.getAttribute('data-link-q').split('=')[1] == '<?php echo $tab ?>') el.classList.add('active');
  });

</script>


<?php } ?>
