const regEmail = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
const regName = /[A-zА-я]/;
const regPass = /[A-z-_1-9]/g;
$(document).ready(function () {

  $('#regEmail').keyup(function (e) {
    let text = $(this).val();
    correctConfirm(regEmail, text, $(this));
    allowRegButton();
  });
  $('#regName').keyup(function (e) {
    let text = $(this).val();
    correctConfirm(regName, text, $(this));
    allowRegButton();
  });
  $('#regNickname').keyup(function (e) {
    let text = $(this).val();
    correctConfirmNickName(regName, text, $(this));
    allowRegButton();
  });

  $('#regPass').keyup(function (e) {
    let text = $(this).val();
    if (text.length > 5) {
      correctConfirm(regPass, text, $(this))
    } else $(this).removeClass('correct');
    allowRegButton();
  });

  $('#regPass1').keyup(function (e) {
    let text = $(this).val();
    let passw = $('#regPass').val();

    if (passw !== '' && passw === text) $(this).addClass('correct');
    else $(this).removeClass('correct');
    allowRegButton();
  });

  $('form#registerForm').on('submit', function (e) {
    e.preventDefault();
    let data = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'query/datab.php',
      data: 'for=register&' + data,
      success: function (res, stat) {
        if (res == 'done') {
          $('#loginRegister').fadeOut(500, function () {
            $('#loginedRegistered').fadeIn(350, function () {
              setTimeout(() => {
                window.location.reload();
              }, 300);
            });
          });
        }
      }
    });
  });

  $('form#loginForm').on('submit', function (e) {
    e.preventDefault();
    let data = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'query/datab.php',
      data: 'for=login&' + data,
      success: function (res, stat) {
        console.log(res)
        if (res == 'confirm') {
          $('#loginRegister').fadeOut(500, function () {
            $('#loginedRegistered').fadeIn(350, function () {
              setTimeout(() => {
                window.location.reload();
              }, 300);
            });
          });
        }
      }
    });

  });

  $('button[data-link-q]').click(function () {
    goToDataLinkQ($(this).attr('data-link-q'));
  });
  
  $('form#createPage').on('submit', function(e){
    e.preventDefault();
    let data = $(this).serialize();
    console.log(data);
    $.ajax({
      type: 'POST',
      url: 'query/datab.php',
      data: 'for=createTable&' + data,
      success: function (res, stat) {
        console.log(res);
        if (res == 'done') window.location.reload()
      }
    })
  });

});


function correctConfirm(reg, txt, input) {
  if (reg.test(txt)) input.addClass('correct');
  else input.removeClass('correct');
}

function correctConfirmNickName(reg, txt, input) {
  if (reg.test(txt) && txt.length > 2) {
    input.addClass('correct');

    $.ajax({
      type: 'POST',
      url: 'query/datab.php',
      data: 'for=check&from=users-mydb&get=Nickname&search=' + txt,
      success: function (res, stat) {
        if (res == 'false') input.addClass('correct');
        else input.removeClass('correct');
      },
      beforeSend: function (data) {
        input.removeClass('correct');
      }
    });

  } else input.removeClass('correct');
}

function allowRegButton() {
  let res = $('#registerForm').find('.form-group input.correct');
  if (res.length == 5) $('#registerSubmit').attr('disabled', false);
  else $('#registerSubmit').attr('disabled', true);
}

function goToDataLinkQ(path) {
  window.location.assign('http://somephp/admin.php' + path);
}

function openUser(row) {
  let userScetion = $('#sectionUser');

  let userId = $(row).children().first().text().match(/\S+/g)[0];
  userScetion.fadeOut(200, function () {
    window.location.assign('http://somephp/admin.php?page=Users&userid=' + userId);
  });
}

function backToUsers() {
  $('#userInfo').fadeOut(200, function () {
    window.location.assign('http://somephp/admin.php?page=Users');
  });
}

function createPage() {
  $('#sectionEditor').fadeOut(200, function () {
    window.location.assign('http://somephp/admin.php?page=Editor&action=CreatePage');
  });
  
}
