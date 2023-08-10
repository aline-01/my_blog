<?php 
include("../../../includes/db_config/db_connection.php");
include("../../../includes/functions.php");
$functions->access_to_admin();

if (isset($_GET["remove"]) == 0 && isset($_GET["add"]) == 0) {
    $functions->header_to("../../index.php");
}

if (isset($_GET["id"]) == 0 || empty($_GET["id"]) == 1) {
    $functions->header_to("../../index.php");
}else {
    $id = $functions->safe_input($_GET["id"]);
}

if (isset($_GET["remove"]) == 1) {
    $sql_remove_admin = "update users set add_access = 0 where id = ?";
    $query_remove_admin = $connection->prepare($sql_remove_admin);
    $query_remove_admin->bindValue(1,$id);
    $query_remove_admin->execute();
    $functions->header_to("../add_admin.php");
}else if (isset($_GET["add"]) == 1) {
    $sql_add_admin = "update users set add_access = 1 where id = ?";
    $query_add_admin = $connection->prepare($sql_add_admin);
    $query_add_admin->bindValue(1,$id);
    $query_add_admin->execute();
    $functions->header_to("../add_admin.php");  


}


?>