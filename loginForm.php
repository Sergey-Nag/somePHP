<div class="d-flex align-items-center h-100">
  <div id="loginRegister" class="mx-auto" style="width: 45vw">
    <ul class="nav nav-tabs" id="list-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="list-login-list" data-toggle="list" href="#list-login" role="tab" aria-controls="home">login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " id="list-reg-list" data-toggle="list" href="#list-reg" role="tab" aria-controls="profile">Register</a>
      </li>
    </ul>
    <div class="card p-4 tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-login" role="tabpanel" aria-labelledby="list-login-list">

        <form id="loginForm">
          <div class="form-group">
            <label for="loginEmail">Login or Email</label>
            <input type="text" class="form-control" id="loginEmail" name="loginEmail" placeholder="Enter login or email">
            <small id="loginEmail" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" name="password" id="pass" placeholder="Password">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" name="checkThisShit" class="form-check-input" id="checkThisShit">
            <label class="form-check-label"  for="checkThisShit">Check me out</label>
          </div>
          <input type="submit" class="btn btn-primary" value="Login">
        </form>

      </div>
      <div class="tab-pane fade" id="list-reg" role="tabpanel" aria-labelledby="list-reg-list">

        <form id="registerForm" name="register">
          <div class="form-group">
            <label for="regEmail">Email address</label>
            <input name="regEmail" type="email" class="form-control" id="regEmail" aria-describedby="email" placeholder="Enter email">
            <small id="regEmailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="regName">Name</label>
            <input name='regName' type="text" class="form-control" id="regName" aria-describedby="name" placeholder="Enter your name">
          </div>
          <div class="form-group">
            <label for="regNickname">Login</label>
            <input name="regNickname" type="text" class="form-control" id="regNickname" aria-describedby="login" placeholder="Enter your login">
          </div>
          <div class="form-group">
            <label for="regPass">Password</label>
            <input name="regPass" type="password" class="form-control" id="regPass" placeholder="Enter password">
            <input type="password" class="form-control mt-2" id="regPass1" placeholder="Confirm password">
          </div>
          <input id="registerSubmit" type="submit" class="btn btn-primary" value="Register" disabled>
        </form>

      </div>
    </div>
  </div>
  <div id="loginedRegistered" class="mx-auto card p-4" style="display: none">
    <h1 class="text-center" style="color:var(--success)"><i class="far fa-check-circle" style="font-size:6rem"></i><br>DONE</h1>
  </div>
</div>
