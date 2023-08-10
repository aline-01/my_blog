<?php include("../../layouts/header.php"); ?>
<?php include("../../../includes/db_config/db_connection.php"); ?>
<?php include("../../../includes/functions.php"); ?>
<?php 
$functions->access_to_admin();

if (isset($_GET["id"]) == 0 || empty($_GET["id"]) == 1) {
    $functions->header_to("../add_post.php");
}else {
    $id = $_GET["id"];
    $this_blog = $functions->get_post_by_id($id);   

}

if (isset($_POST["submit"]) == 1) {
  $errors = array();
  $title = $_POST["title"];
  if (empty($title) == 1) {
    array_push($errors,"عنوان را وارد کنید");
  }else if (strlen($title) > 70) {
    array_push($errors,"عنوان خیلی طولانی است");
  }

  if ($_FILES["blog_img"]["error"] == 0) {
    $upload_path = "../../../img/blog/". $_FILES["blog_img"]["name"];
    echo $upload_path;
  }else {
    $upload_path = "../" . $this_blog[0]["image_addr"];
  }

  $content = $_POST["content"];
  if (empty($content) == 1) {
    array_push($errors,"محتوا را وارد کنید");
  }

  if (empty($errors) == 1) {
    $move_file = move_uploaded_file($_FILES["blog_img"]["tmp_name"],$upload_path);
    var_dump($move_file);
    $sql_update = "update blogs set image_addr = ? , title = ? , content = ? where id = ?";
    $query_update = $connection->prepare($sql_update);
    $safe_title = $functions->safe_input($title);
    $safe_file = $functions->safe_input($file_blog);
    $query_update->bindValue(1,$upload_path);    
    $query_update->bindValue(2,$safe_title);
    $query_update->bindValue(3,$content);
    $query_update->bindValue(4,$id);
    $query_update->execute();
    $functions->header_to("../add_post.php");
  }

}



?>

<br><br>
<div class="row">
        <form enctype="multipart/form-data" action="Edit_post.php?id=<?php echo $id; ?>" method="POST">
            <input type="text" value="<?php echo $this_blog[0]["title"]; ?>" name="title" class="form-control form-input" placeholder="title"><br>
            <input class="form-control form-input" value="<?php echo $this_blog[0]['image_addr'] ?>" type="file" id="formFile" name="blog_img"><br>
            <textarea placeholder="enter the content for blog" name="content" class="form-input" id="editor1"><?php echo $this_blog[0]["content"]; ?></textarea>
            <script>
                CKEDITOR.replace('editor1');
           </script><br>
          <!-- <input type="text" name="tag" class="form-control form-input" placeholder="tab"><br> -->
          <?php 
            if (isset($_POST["submit"]) == 1 && empty($errors) == 0) {
              echo "<div class='errors'>";
              echo "<ul>";
              foreach($errors as $err) {
                echo "<li style='font-size:20px;'>{$err}</li>";
              }
              echo "</ul>";
              echo "</div><br>";
            }
            ?>
            <input type="submit" value="submit" class="btn btn-success" class="form-input" name="submit">
        </form>
    </div>

<?php include("../../layouts/footer.php"); ?>