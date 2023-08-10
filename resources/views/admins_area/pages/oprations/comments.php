<?php 
include("../../../includes/functions.php");
include("../../../includes/db_config/db_connection.php");

$functions->access_to_admin();

if (isset($_GET["accept"]) == 0 && isset($_GET["delete"]) == 0) {
    $functions->header_to("../../index.php");
}else {
    if (isset($_GET["id"]) == 0 || empty($_GET["id"]) == 1) {
        $functions->header_to("../../index.php");   
    }else {
        $id = $functions->safe_input($_GET["id"]);
    }
}

if (isset($_GET["accept"]) == 1) {
    $sql_accept = "update comments set accepted = 1 where id = ?";
    $query_accept = $connection->prepare($sql_accept);
    $query_accept->bindValue(1,$id);
    $query_accept->execute();
    $functions->header_to("../comment.php");
}else if (isset($_GET["delete"]) == 1) {
    $sql_delete = "delete from comments where id = ?";
    $query_delete = $connection->prepare($sql_delete);
    $query_delete->bindValue(1,$id);
    $query_delete->execute();
    $functions->header_to("../comment.php");
}

?>