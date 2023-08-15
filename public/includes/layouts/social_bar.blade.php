<?php

?>
<?php
  $info = DB::table("site_info")->get();
  // dd($info[0]->site_information);
 ?>
   <div class="sidebar-text">
     <p><?php if (!is_null($info[0]->site_information)) { echo $info[0]->site_information; } ?></p>
   </div>

    <div class="sidebar-social">
        <ul>
           <li>
              <a href="<?php if (!is_null($info[0]->telegram) && $info[0]->telegram != "not yet") { echo $info[0]->telegram; } ?>" class="telegram"><i class="fa fa-send"></i>دنبال کردن در تلگرام</a>
           </li>
           <li>
              <a href="<?php if (!is_null($info[0]->twitter) && $info[0]->twitter != "not yet") { echo $info[0]->twitter; } ?>" class="twitter"><i class="fa fa-twitter"></i>صفحه توئیتر ما</a>
           </li>
           <li>
              <a href="<?php if (!is_null($info[0]->aparat) && $info[0]->aparat != "not yet") { echo $info[0]->aparat; } ?>" class="aparat"><i class="fa fa-video-camera"></i>دنبال کردن در آپارات</a>
           </li>
           <li>
              <a href="<?php if (!is_null($info[0]->youtube) && $info[0]->youtube != "not yet") { echo $info[0]->youtube; } ?>" class="youtube"><i class="fa fa-youtube"></i>کانال یوتیوب</a>
           </li>
           <li>
              <a href="<?php if (!is_null($info[0]->instagram) && $info[0]->instagram != "not yet") { echo $info[0]->instagram; } ?>" class="instagram"><i class="fa fa-instagram"></i>پیج اینستاگرام </a>
           </li>
           </ul>
     </div>
