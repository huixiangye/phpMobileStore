<?php require_once("../../config.php"); 


if(isset($_GET['id'])){

$query = query("DELETE FROM CustomerOrder WHERE order_id = ".escape_string($_GET['id'])." ");
confirm($query);
set_message("Order deleted");
redirect("../../../public/admin/index.php?orders");
}else{
	redirect("../../../public/admin/index.php?orders");
}











?>