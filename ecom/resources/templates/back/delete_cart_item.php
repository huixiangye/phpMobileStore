<?php require_once("../../config.php"); 


if(isset($_SESSION['user_id'])) {
	$item = escape_string($_GET['id']);
	$id = $_SESSION['user_id'];

	$query = query("DELETE FROM CustomerCart WHERE item_id=$item AND customer_id=$id");
	confirm($query);

	redirect("../../../public/checkout.php");

} 
else {
	redirect("../../../public/index.php");
}


?>




