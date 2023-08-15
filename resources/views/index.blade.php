<?php include("includes/layouts/header.blade.php"); ?>
<?php  ?>
      <div class="top-section">
         <div class="container">
            <div class="row">
               <div class="col-md-2">
                  <!-- <img src="img/logo.png" alt="" class="logo"> -->
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
      <center>
         <p style="font-size: 16px;color: #444;">آخرین مطالب وبلاگ</p>
      </center>
      <hr>
      <div class="container">
         <div class="row">
            <div class="col-md-3">
               <div class="sidebar">

                  <?php include("includes/layouts/social_bar.blade.php"); ?>
                  <!-- <div class="category-sidebar">
                     <span><i class="fa fa-bookmark"></i>دسته بندی مطالب</span>
                     <ul>
                        <li><a href="#">دنبال کردن در تلگرام</a></li>
                        <li><a href="#">صفحه توئیتر ما</a></li>
                        <li><a href="#">دنبال کردن در آپارات</a></li>
                        <li><a href="#">کانال یوتیوب</a></li>
                        <li><a href="#">پیج اینستاگرام</a></li>
                     </ul>
                  </div>
                  <div class="category-sidebar ads-sidebar">
                     <span><i class="fa fa-slack"></i>تبلیغات</span>
                     <ul>
                        <li>
                           <a href="#">
                              <figure>
                                 <img src="img/ads/ads1.jpg" alt="">
                                 <figcaption></figcaption>
                              </figure>
                           </a>
                        </li>
                     </ul>
                  </div> -->
               </div>
            </div>
            <div class="col-md-9">
               <div class="col-md-12">
                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                     <!-- Indicators -->
                     <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                     </ol>
                     <!-- Wrapper for slides -->
                     <div class="carousel-inner">
                        <div class="item active">
                           <figure>
                              <img src="img/slide/Slide1.jpg" alt="">
                              <figcaption></figcaption>
                           </figure>
                           <div class="carousel-caption">
                              <h3>طراحی وب</h3>
                              <p>طراحی وب رو از همین امروز شروع کن</p>
                           </div>
                        </div>
                        <div class="item">
                           <figure>
                              <img src="img/slide/Slide1.jpg" alt="">
                              <figcaption></figcaption>
                           </figure>
                           <div class="carousel-caption">
                              <a href="">
                                 <h3>چرا شاد نباشیم</h3>
                                 <p>مجموعه مقالات روانشناسی سارتر</p>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php foreach($all_blogs->all() as $blog) { ?>
                 <div class="col-md-4">
                  <a href="<?php echo "/blogs/blog/{$blog['title']}" ?>">
                     <div class="post-content">
                        <figure>
                           <img src="/img/blog/<?php echo $blog['picture']; ?>">
                           <figcaption class="hover-fig">
                              <i class="fa fa-plus"></i>
                           </figcaption>
                           <figcaption class="date-fig">
                              <span><?php echo $blog["created_blog"]; ?></span>
                              <i class="fa fa-date"></i>
                           </figcaption>
                        </figure>
                        <p><?php echo $blog["content"]; ?></p>
                     </div>
                  </a>
               </div>
             <?php } ?>
            </div>
         </div>
      </div>
      <br><br>

<?php include("includes/layouts/footer.blade.php"); ?>
