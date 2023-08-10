<?php include("includes/layouts/login_header.blade.php"); ?>
<body>
<br><br><br>
<?Php

?>
  <div class="container">
    <h2>فرم ورود</h2>
    <form action="/users/register" method="POST">
      @csrf
      <div class="form-group">
        <label for="username">نام</label>
        <input type="text" id="username" name="name" placeholder="نام خود را وارد کنید">
      </div>
      <div class="form-group">
        <label for="password">نام کاربری</label>
        <input type="text" id="password" name="username" placeholder="نام کاربری خود را وارد کنید">
      </div>
      <div class="form-group">
        <label for="password">ادرس ایمیل</label>
        <input type="email" id="password" name="email" placeholder="ادرس ایمیل خود را وارد کنید">
      </div>
      <div class="form-group">
        <label for="password">رمز عبور</label>
        <input type="password" id="password" name="password" placeholder="رمز عبور خود را وارد کنید">
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
        <a style="" href="#">در حال حاضر حساب دارید</a><br><br>
        <button value="submit" name="submit" type="submit">ثبت نام</button>
      </div>
    </form>
  </div>
</body>
</html>
