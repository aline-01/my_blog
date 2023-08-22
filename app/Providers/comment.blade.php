<?php include("includes/admin_layouts/header.php"); ?>
<?php //use DB;?>
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
          <td>mdo</td>
          <td>
            <a href="#" class="btn btn-warning">ویرایش</a>
            <a href="#" class="btn btn-danger">حذف </a>
          </td>
        </tr> -->
        <?php foreach($all_comments as $alm) { ?>
            </tr>
            <td>1</td>
            <td><?php echo $alm->writer_name; ?></td>
            <td><textarea name="" id="" cols="7" class="form-control" rows="4"><?php echo $alm->text; ?></textarea></td>
            <?php $blog_from_comment = DB::table("blog")->where("id",$alm->blog_id)->get(); ?>
            <td>><img src="/img/blog/<?php echo $blog_from_comment[0]->picture ?>" width="150px" height="120px" alt=""></td>
            <td>
                <a href='/admins/comments/accept/<?php echo $alm->id; ?>' class='btn btn-warning'>Accept</a>
                <a href='/admins/comments/delete/<?php echo $alm->id; ?>' class='btn btn-danger' style='margin-right:20px;'>Delete</a>
            </td>
          </tr>
          <?php } ?>

    </tbody>
    </table> </tbody>
</table>

</div>
