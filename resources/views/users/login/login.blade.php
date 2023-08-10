<?php include("includes/layouts/login_header.blade.php"); ?>
<body>
<?php
if (!is_null(session()->get("login_info"))) {
  $username_crt = session()->get("login_info")[0];
  $password_crt = session()->get("login_info")[1];
}else {
  $username_crt = "";
  $password_crt = "";
}

?>
<br><br><br><br><br><br>
  <div class="container">
    <h2>فرم ورود</h2>
    <form method="POST" action="/users/login">
      @csrf
      <div class="form-group">
        <label for="username">نام کاربری</label>
        <input type="text" value="<?php echo $username_crt; ?>" id="username" name="username" placeholder="نام کاربری خود را وارد کنید">
      </div>
      <div class="form-group">
        <label for="password">رمز عبور</label>
        <input type="password" value="<?php echo $password_crt; ?>" id="password" name="password" placeholder="رمز عبور خود را وارد کنید">
      </div>
      <?php if ($errors->any()) { ?>
      <div class="errors">
          <ul>
              <?php
                  foreach ($errors->all() as $err) {
                    echo "<li>{$err}</li>";
                  }
               ?>
          </ul>
      </div>
    <?php } ?>
      <div class="form-group">
        <a class="change_login" href="/users/register">حساب ندارید ؟</a><br><br>
        <button name="submit" value="submit" type="submit">ورود</button>
      </div>
    </form>
  </div>
</body>
</html>
