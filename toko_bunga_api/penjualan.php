<?php
require_once "method.php";

$obj = new Penjualan();
$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "GET":
        $id = !empty($_GET["id"]) ? intval($_GET["id"]) : 0;
        $obj->get_penjualan($id);
        break;
    case "POST":
        if (!empty($_GET["id"])) {
            $obj->update_penjualan(intval($_GET["id"]));
        } else {
            $obj->insert_penjualan();
        }
        break;
    case "DELETE":
        $obj->delete_penjualan(intval($_GET["id"]));
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
?>
