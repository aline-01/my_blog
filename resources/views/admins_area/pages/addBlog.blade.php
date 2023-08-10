<?php include("includes/admin_layouts/header.php"); ?>
<?php  ?>

<div class="row">
        <form enctype="multipart/form-data" action="/admins/addBlog" method="POST">
            @csrf
            <input type="text" name="title" class="form-control form-input" placeholder="title"><br>
            <input class="form-control form-input" type="file" id="formFile" name="blog_img"><br>
            <textarea placeholder="enter the content for blog" name="content" class="form-input" id="editor1"></textarea>
            <script>
                CKEDITOR.replace('editor1');
           </script><br>
          <!-- <input type="text" name="tag" class="form-control form-input" placeholder="tab"><br> -->
          <?php
            if ($errors->any) {
              echo "<div class='errors'>";
              echo "<ul>";
              foreach($errors->all() as $err) {
                echo "<li style='font-size:20px;'>{$err}</li>";
              }
              echo "</ul>";
              echo "</div><br>";
            }
            ?>
            <input type="submit" value="submit" class="btn btn-success" class="form-input" name="submit">
        </form>
    </div>
<?php
   // $all_blogs = $functions->get_all_posts();

?>
<div class="row">
        <table class="table table-dark">
  <thead>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">title</th>
          <th scope="col">image</th>
          <th scope="col">writer</th>
          <th scope="col">date</th>
          <th scope="col">opreatin</th>
        </tr>
      </thead>
      <tbody>
        <?php $row_number = 1; ?>
        <?php foreach($all_blogs as $alb) { ?>
          <tr>
          <th scope="row"><?php echo $row_number;$row_number+=1; ?></th>
          <td><?php echo $alb["title"]; ?></td>
          <td><img src="/img/blog/<?php echo $alb['picture']; ?>" height="100px" alt=""></td>
          <td><?php $admin_writer = DB::table("users")->where("id",$alb["writer"])->get();echo $admin_writer[0]->username; ?></td>
          <td><?php echo $alb["created_at"]; ?></td>
          <td style="float:left;">
            <a href="oprations/Edit_post.php?id=<?php //echo $alb["id"]; ?>" class="btn btn-warning">Edit</a>
            <a href="/admins/delete/<?php echo $alb["id"]; ?>" class="btn btn-danger">Delete</a>
          </td>
        </tr>
          <?php } ?>
      <table class="table table-dark">
      <thead>
      <table class="table table-striped">

  </thead>
<tbody>

</body>
    <script src="/js/jquery.1.8.3.min.js"></script>
    <script src="/js/bootstrap.js"></script>
</html>
