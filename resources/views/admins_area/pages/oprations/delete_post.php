<?php 
include("../../../includes/db_config/db_connection.php");
include("../../../includes/functions.php");

if (isset($_GET["id"]) == 0 || empty($_GET["id"]) == 1) {
    $functions->header_to("../../index.php");
}else {
    $id = $_GET["id"];
    $sql_delete = "delete from blogs where id = ?";
    $query = $connection->prepare($sql_delete);
    $safe_id = $functions->safe_input($id);
    $query->bindValue(1,$safe_id);
    $query->execute();
    $functions->header_to("../add_post.php");
}

?>
