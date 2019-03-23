<?php 
require_once 'db.php';
$usersAmount = array_shift($result);

$allUsers = $mysqli->query("SELECT * FROM `users-mydb`");
$userId = $_GET['userid'];
$tables = $mysqli->query("SHOW TABLES FROM `mydb`")->fetch_assoc();
$isPage = true;
$action = $_GET['action'];

foreach ($tables as $table) {
  $name = preg_match("/-page/",$table);
  if (!$name) $isPage = false;
}
?>

<section id="sectionEditor" class="h-100" style="overflow: scroll;">
  <? if ($isPage) { ?>
  <div class="row p-0 mx-0">
    <? print_r($tables)?>
  </div>

  <? } else { if ($action !== 'CreatePage') { ?>

  <div class="d-flex align-items-center h-100">
    <div class="mx-auto" style="width: 45vw">
      <div class="card p-5 text-center">
        <h2><i>Таблиц не найдено!<br><button class="btn w-100 btn-primary" onclick="createPage()">Создать?</button></i></h2>
      </div>
    </div>
  </div>

  <? } else { ?>

  <div class="row p-0 mx-0">
    <h2>Создание страницы</h2>
  </div>
  <div class="row p-0 mx-0">
    <div class="col-10 m-auto">
      <form>
        <div class="form-group row text-right">
          <label for="NamePage" class="col-sm-4 col-form-label">Название страницы</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="NamePage" placeholder="Введите название страницы">
          </div>
        </div>
        <div class="form-group row text-right">
          <label for="DescrPage" class="col-sm-4 col-form-label">Описание страницы</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="DescrPage" rows="3"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="allowAll" class="col-sm-4 text-right col-form-label">Видна всем</label>
          <div class="col-sm-8">
            <input class="form-check-input m-0" type="checkbox" id="allowAll" checked style="position: relative; vertical-align: -webkit-baseline-middle">
          </div>
        </div>
        <div class="form-group row">
        <div class="form-check form-check-inline col-5 justify-content-center">
          <label class="form-check-label template-sample" for="inlineRadio1">
            <div class="wrapp-template"></div>
          </label><br>
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
        </div>
        <div class="form-check form-check-inline col-5 justify-content-center">
          <label class="form-check-label" for="inlineRadio2">2</label>
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
        </div>
        </div>
      </form>
    </div>
  </div>

  <? }} ?>
</section>
