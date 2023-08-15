<?php include("../layouts/header.php"); ?>
<?php include("../../includes/db_config/db_connection.php"); ?>
<?php include("../../includes/functions.php"); ?>
<?php 
$functions->access_to_admin();

$all_comments = $functions->get_all_comments_accepting();

?>

<div class="row" style="padding:30px;">
 <table class="table table-dark">
  <thead>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">user</th>
          <th scope="col">content</th>
          <th scope="col">post</th>
          <th scope="col">oprations</th>
        </tr>
      </thead>
      <tbody>
        <!-- <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>
            <a href="#" class="btn btn-warning">ویرایش</a>
            <a href="#" class="btn btn-danger">حذف </a>
          </td>
        </tr> -->
        <?php foreach($all_comments as $alm) { ?>
            </tr>
            <td></td>
            <td><?php echo $alm["name"]; ?></td>
            <td><textarea name="" id="" cols="7" class="form-control" rows="4"><?php echo $alm["content"]; ?></textarea></td>
            <td>><img src="<?php echo $functions->get_post_by_id($alm["blog_id"])[0]["image_addr"]; ?>" width="150px" height="120px" alt=""></td>
            <td>
                <a href='oprations/comments.php?accept&id=<?php echo $alm["id"]; ?>' class='btn btn-warning'>Accept</a>
                <a href='oprations/comments.php?delete&id=<?php echo $alm["id"]; ?>' class='btn btn-danger' style='margin-right:20px;'>Delete</a>
            </td>
          </tr>
        <?php } ?>
                      
    </tbody>
    </table> </tbody>
</table>

</div>


<?php include("../layouts/footer.php"); ?>