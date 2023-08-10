<?php include("includes/admin_layouts/header.php"); ?>

<div class="row" style="padding:30px;">
<table class="table table-dark">
  <thead>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">نام کاربری</th>
          <th scope="col">پست الکترونیک</th>
          <th scope="col">وضعیت</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
      <?php
      foreach($all_user as $adm) {
        if ($adm["id"] == 1) { continue; }
        echo "<tr>";
        echo "<th scope='row'>1</th>";
        echo "<td>{$adm['username']}</td>";
        echo "<td>{$adm['email']}</td>";
        echo "<td>Admin</td>";
        echo "<td>";
        if ($adm["is_admin_access"] == 1) {
          echo "<a href='/admins/task/del/{$adm['id']}' class='btn btn-danger'>Delete from admin</a>";
        }else if ($adm["is_admin_access"] == 0) {
          echo "<a href='/admins/task/add/{$adm['id']}' class='btn btn-warning'>Add to admins</a>";
        }
          echo "</td>";
        echo "</tr>";
      }
      ?>

      </table></tbody>
</table>
</div>


<?php include("includes/admin_layouts/footer.php"); ?>
