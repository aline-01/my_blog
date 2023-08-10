<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, maximum-scale=1">
      <title>قالب سایت شرکتی</title>
      <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="/css/font-awesome.css" rel="stylesheet" type="text/css">
      <link href='https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css' rel='stylesheet' type='text/css'>
      <link href="/css/style.css" rel="stylesheet" type="text/css">
      <!--[if IE]>
      <style type="text/css">.pie {behavior:url(PIE.htc);}</style>
      <![endif]-->
      <!--[if lt IE 9]>
      <script src="js/respond-1.1.0.min.js"></script>
      <script src="js/html5shiv.js"></script>
      <script src="js/html5element.js"></script>
      <![endif]-->
   </head>

   <body>
      <div class="main-menu">
         <div class="container">
            <ul>
               <li><a href="/">صفحه اصلی</a></li>
               <?php if (is_null(request()->cookie("users_access"))) { ?>
               <li><a href="/users/login">ورود</a></li>
               <?php } else { ?>
               <li><a href="/users/exit">خروج</a></li>
               <?php } ?>
               <li><a href="#">تماس</a></li>
               <li><a href="#">درباره</a></li>
            </ul>
            <ul style="float:left;font-size:15px;">
              <?php if (!is_null(request()->cookie("users_access"))) {
                $current_user = DB::table("users")->where("id",request()->cookie("users_access"))->get();
                // dd($corect_user[0]->is_admin_access);
                if ($current_user[0]->is_admin_access == 1) {
                  echo "<li style='font-size:17px;color:white;'><a href='/admins'>ادمین</a></li>";
                }
              }
              ?>
            </ul>
         </div>
      </div>
