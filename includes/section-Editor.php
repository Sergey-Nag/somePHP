<?php 
require_once 'db.php';
$usersAmount = array_shift($result);

$allUsers = $mysqli->query("SELECT * FROM `users-mydb`");
$userId = $_GET['userid'];
$tables = $mysqli->query("SHOW TABLES FROM `mydb`");
$isPage = false;
$action = $_GET['action'];

while ($table = $tables->fetch_assoc()) {
  $name = preg_match("/-page/", $table['Tables_in_mydb']);
  if ($name) $isPage = true;
}
if ($action == 'CreatePage') { ?>

<div class="row p-0 mx-0">
  <h2>Создание страницы</h2>
</div>
<div class="row p-0 mx-0">
  <div class="col-10 m-auto">
    <form id="createPage">
      <div class="form-group row text-right">
        <label for="NamePage" class="col-sm-4 col-form-label">Название страницы</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="NamePage" name="NamePage" placeholder="Введите название страницы">
        </div>
      </div>
      <div class="form-group row text-right">
        <label for="DescrPage" class="col-sm-4 col-form-label">Описание страницы</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="DescrPage" rows="3" name="DescrPage"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="allowAll" class="col-sm-4 text-right col-form-label">Видна всем</label>
        <div class="col-sm-8">
          <input class="form-check-input m-0" type="checkbox" id="allowAll" checked style="position: relative; vertical-align: -webkit-baseline-middle" name="allowAll">
        </div>
      </div>
      <div class="form-group row">
        <div class="form-check form-check-inline col-5 justify-content-center">
          <label class="form-check-label template-sample" for="template1">
            <div class="wrapp-template">
              <div class="column"></div>
              <div class="column bg"></div>
              <div class="column"></div>
              <div class="column"></div>
              <div class="column bg"></div>
              <div class="column"></div>
              <div class="column"></div>
              <div class="column bg"></div>
              <div class="column"></div>
              <div class="column"></div>
              <div class="column bg"></div>
              <div class="column"></div>
            </div>
          </label><br>
          <input class="form-check-input" type="radio" name="template" id="template1" value="template1">
        </div>
        <div class="form-check form-check-inline col-5 justify-content-center">
          <label class="form-check-label template-sample" for="template2">
            <div class="wrapp-template">
              <div class="column bg"></div>
              <div class="column bg"></div>
              <div class="column bg"></div>
              <div class="column bg mr-1"></div>
              <div class="column bg"></div>
              <div class="column bg ml-1"></div>
              <div class="column bg mr-1"></div>
              <div class="column bg"></div>
              <div class="column bg ml-1"></div>
              <div class="column bg"></div>
              <div class="column bg"></div>
              <div class="column bg"></div>
            </div>
          </label><br>
          <input class="form-check-input" type="radio" name="template" id="template2" value="template2">
        </div>
      </div>
      <div class="form-group row">
        <button type="submit" class="btn btn-primary w-100">Submit</button>
      </div>
    </form>
  </div>
</div>

<? } else if ($action == 'edit') {
$pageForEdit = $_GET['edit'];
$PAGE = $mysqli->query("SELECT * FROM `$pageForEdit`");
?>
<section id="pageEditor">
  <? if ($PAGE->num_rows !== 0) {; ?>

  <div class="header-wrapp row pt-1 mx-0">
    <div class="col-9 p-0">
      <div class="btn-group btn-group-sm" role="group">
        <div class="btn-group btn-group-sm" role="group">
          <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Блок
          </button>
          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item" href="#">Section</a>
            <a class="dropdown-item" href="#">Div</a>
          </div>
        </div>
        <div class="btn-group btn-group-sm" role="group">
          <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Строка
          </button>
          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item" href="#">P</a>
            <a class="dropdown-item" href="#">span</a>
            <a class="dropdown-item" href="#">B</a>
            <a class="dropdown-item" href="#">I</a>
            <a class="dropdown-item" href="#">U</a>
          </div>
        </div>
        <!--
        <button type="button" class="btn btn-success">1</button>
        <button type="button" class="btn btn-success">2</button>
-->


      </div>
    </div>
    <div class="col-3 p-0">
      <div class="btn-group btn-group-sm float-right" role="group">
        <button type="button" class="btn btn-outline-primary"><i class="far fa-save"></i> Сохранить</button>
        <button type="button" class="btn btn-primary"><i class="fas fa-sync"></i> Обновить</button>     
      </div>
    </div>
  </div>
  <div class="pageView w-100" id="pageView">
    <? $DrawPage->inEditor($PAGE); ?>
<!--
    <div class="controls-item" data-p="asd">
      <div class="butts-wrapp text-center" data-p="asd">
        <button class="btn btn-sm p-1 px-3 btn-success" title="Edit text"><i class="far fa-file-alt"></i></button>
        <button class="btn btn-sm p-1 px-3 btn-success" title="Edit styles"><i class="far fa-edit"></i></button>
        <button class="btn btn-sm p-1 px-3 btn-success" title="Edit indents"><i class="fas fa-compress"></i></button>
      </div>
    </div>
-->
  </div>



  <? } else {?>
  <span>пусто...</span>
  <? }?>
</section>
<? } else { ?>

<section id="sectionEditor" class="h-100" style="overflow: scroll;">
  <? if ($isPage) { ?>
  <div class="row p-0 mx-0">
    <h3>Страницы для редактирования <button class="btn btn-primary" onclick="createPage()">Создать</button></h3>
    <div class="col-12">
      <div class="btn-group-vertical w-100" role="group" aria-label="Button group with nested dropdown">
        <?
        $tables = $mysqli->query("SHOW TABLES FROM `mydb`");
        while ($table = $tables->fetch_assoc()) {
          $name = preg_match("/-page/", $table['Tables_in_mydb']);
          if ($name) { ?>
        <a href="http://somephp/admin.php?page=Editor&action=edit&edit=<? echo $table['Tables_in_mydb']; ?>" class="btn btn-light">
          <? echo explode('-', $table['Tables_in_mydb'])[0]; ?></a>

        <? }} ?>
      </div>
    </div>

  </div>

  <? } else {  ?>

  <div class="d-flex align-items-center h-100">
    <div class="mx-auto" style="width: 45vw">
      <div class="card p-5 text-center">
        <h2><i>Таблиц не найдено!<br><button class="btn w-100 btn-primary" onclick="createPage()">Создать?</button></i></h2>
      </div>
    </div>
  </div>

  <? }}?>
</section>
