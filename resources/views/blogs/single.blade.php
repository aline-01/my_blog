<?php include("includes/layouts/header.blade.php"); ?>
      <div class="top-section">
         <div class="container">
            <div class="row">
               <div class="col-md-2">
                  <img src="" alt="" class="logo">
               </div>
               <div class="col-md-5">
                  <form method="" action="" class="search-form">
                     <input type="text" name="" placeholder="جستجو کنید ...">
                     <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
               </div>
               <div class="col-md-5">
                  <div class="index-h1">
                     <h1>بهترین و متفاوت ترین مقالات آموزشی</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br>
      <center>خانه / عنوان مطلب</center>
      <hr>
      <div class="container">
         <div class="row">
            <div class="col-md-3">
               <div class="sidebar">
                 <?php include("includes/layouts/social_bar.blade.php"); ?>

               </div>
            </div>
            <div class="col-md-9">
               <div class="col-md-12">
                  <div class="single-content">
                     <div class="single-img">
                        <img src="/img/blog/<?php echo $blog_content[0]["picture"]; ?>">
                     </div>
                     <div class="single-meta">
                        <ul>
                           <li><a href="#" title="98/6/21" data-toggle="tooltip"><i class="fa fa-calendar-o"></i></a></li>
                           <li><a href="#" title="98/8/8" data-toggle="tooltip"><i class="fa fa-reply"></i></a></li>
                           <li><a href="#" title="نویسنده:<?php echo $writer;  ?>" data-toggle="tooltip"><i class="fa fa-user-o"></i></a></li>
                           <li><a href="#" title="بازدید:<?php echo $blog_view; ?>" data-toggle="tooltip"><i class="fa fa-eye"></i></a></li>
                           <li><a href="#" title="اشتراک در توئیتر" data-toggle="tooltip"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="#" title="اشتراک در فیس بوک" data-toggle="tooltip"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="#" title="اشتراک در لینکدین" data-toggle="tooltip"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                     </div>
                     <div class="single-title">
                        <h1><?php echo $blog_title; ?></h1>
                     </div>
                     <p><?php echo $blog_content[0]->content; ?></p>
                     <hr>
                     <div class="comment">
                        <span><i class="fa fa-comments"></i>نظری برای این مطلب بنویسید</span>
                        <form action="/blogs/addComment" method="post">
                           @csrf
                           <input type="hidden" name="blog_id" value="<?php echo  $blog_content[0]->id; ?>">
                           <div class="form-group col-md-6">
                              <input class="form-control" type="text" name="user_name" placeholder="نام خود را وارد کنید" >
                           </div>
                           <div class="form-group col-md-6">
                              <input class="form-control" type="email" name="user_email" placeholder="ایمیل را واردکنید" >
                           </div>
                           <div class="form-group col-md-12">
                              <textarea class="form-control" name="user_comment" placeholder="متن نظر" rows="7"></textarea>
                           </div>
                           <div class="form-group col-md-12">
                              <button class="btn btn-default" type="submit">ارسال نظر</button>
                           </div>
                        </form>
                     </div>
                     <div class="comments-note">
                        نظرات این مطلب
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
      <br><br>
   
<?php include("includes/layouts/footer.blade.php"); ?>