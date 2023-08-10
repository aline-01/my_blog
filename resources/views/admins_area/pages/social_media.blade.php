<?php include("includes/admin_layouts/header.php"); ?>

<br>
<div class="row">
    <form  enctype="multipart/form-data" method="POST" >
      @csrf
        <input type="file" name="picture" class="form-control form-input" placeholder="" ><br>
        <input type="text" name="Youtube" class="form-control form-input" placeholder="Youtube   exam:my_chanel" ><br>
        <input type="text" name="Twitter" class="form-control form-input" placeholder="Twitter   exam:my_chanel"><br>
        <input type="text" name="Instagram" class="form-control form-input" placeholder="Instagram  exam:irbsoft"><br>
        <input type="text" name="Aparat" class="form-control form-input" placeholder="Aparat   exam:my_chanel"><br>
        <input type="text" name="Telegram" class="form-control form-input" placeholder="Telegram    exam:my_chanel"><br>
        <textarea name="descryption" placeholder="Please write your site descryption" class="form-control form-inpu" rows="8" cols="80"></textarea><br>
        <input type="submit" name="submit" value="Set the social media for the site" class="form-control form-input">
    </form>
</div>
