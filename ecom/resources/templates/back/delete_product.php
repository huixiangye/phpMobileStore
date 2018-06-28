<?php require_once("../../config.php"); 


if(isset($_GET['id'])){

	$query = query("SELECT * FROM phone WHERE item_id = ".escape_string($_GET['id'])." ");
	confirm($query);

	$row = fetch_array($query);
	$quantity = $row['stock_quantity'];

	if ($quantity > 0) {
		$quantity -= 1;
		$query1 = query("UPDATE phone SET stock_quantity='$quantity' WHERE item_id = ".escape_string($_GET['id'])." ");
		confirm($query1);
	}

	set_message("Product deleted");
	redirect("../../../public/admin/index.php?products");
}
else {
	redirect("../../../public/admin/index.php?products");
}











?>