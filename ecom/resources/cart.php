<?php require_once("config.php"); ?>

<?php 


	if (isset($_GET['add'])) {

		$id = $_SESSION['user_id'];
		$item = escape_string($_GET['add']);

		$query = query("SELECT * FROM phone WHERE item_id = ".escape_string($_GET['add'])." ");
		confirm($query);

		while ($row = fetch_array($query)) {

			if($row['stock_quantity'] != $_SESSION['item_'.$_GET['add']]){
				$insert = query("INSERT INTO CustomerCart VALUES ('$id', '$item', 1, NOW());");
				redirect("../public/checkout.php");
			}else{

				set_message("We only have ".$row['stock_quantity']." ".$row['model']." "."available");
				redirect("../public/checkout.php");
			}
		}
	}



function cart(){


	$id = $_SESSION['user_id'];

	$query = query("SELECT * FROM CustomerCart INNER JOIN Phone ON CustomerCart.item_id=Phone.item_id WHERE customer_id=$id");

	confirm($query);

	while ($row = fetch_array($query)) {

	$phone = <<<DELIMETER

	<tr>
	    <td>{$row['model']}</td>
	    <td>&#36;{$row['price']}</td>
	    <td><a class="btn btn-danger" href="../resources/templates/back/delete_cart_item.php?id={$row['item_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
	</tr>
DELIMETER;

	echo $phone;

	}

}









?>