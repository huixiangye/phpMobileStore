<?php

//helper functions
function set_message($msg){

	if(!empty($msg)){
		$_SESSION['message'] = $msg;
	}else{
		$msg = "";
	}

}

function display_message(){
	if(isset($_SESSION['message'])){

		echo $_SESSION['message'] ;
		unset($_SESSION['message']);
	}
}


function redirect($location){
 
header("Location: $location ");
}

function query($sql){
	global $connection;

	return mysqli_query($connection,$sql);
}


function confirm($result){

	global $connection;

	if(!$result){
		die("QUERY FAILED" . mysqli_error($connection));
	}
}

function escape_string($string){

	global $connection;
	return mysqli_real_escape_string($connection,$string);
}

function fetch_array($result){

	return mysqli_fetch_array($result);
}


/*******************************FRONT END FUNCTIONS**********************/

//get products

function get_products(){
	
	$query = query("SELECT * FROM  phone");
	confirm($query);

	while($row = fetch_array($query)){

		if ($row['stock_quantity'] > 0) {

			$product = <<<DELIMETER

	  <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <a href="item.php?id={$row['item_id']}">
                        		<img style="height: 200px;width:200px"; src="image/{$row['img']}" alt="">
                        </a>
                        <div class="caption">
                            <h4 class="pull-right">&#36;{$row['price']}</h4>
                            <h4><a href="item.php?id={$row['item_id']}">{$row['model']}</a>
                            </h4>
                            <p>See more information <a target="_blank" href="{$row['link']}">
                            {$row['link']}</a>.</p>
                             <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['item_id']}">Add to cart</a>

                        </div>
                        

                    </div>
                </div>
DELIMETER;

			echo $product;
		}

	}

}



//
function get_categories(){

	 	$query = query("SELECT DISTINCT name, maker_id FROM phone INNER JOIN maker ON phone.maker_id=maker.id");
	    confirm($query);

	    while($row = fetch_array($query)) {

	    		$categories_link = <<<DELIMETER
<a href='category.php?id={$row['maker_id']}' class='list-group-item'>{$row['name']}</a>
				  
DELIMETER;
echo $categories_link;



	    }

  }


//
  function get_products_in_cat_page(){
	
	$query = query("SELECT * FROM phone INNER JOIN maker ON phone.maker_id=maker.id WHERE phone.maker_id = ". escape_string($_GET['id'])." ");
	confirm($query);

	while($row = fetch_array($query)){

$product = <<<DELIMETER

	
                <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="image/{$row['img']}" style="height: 200px;width:200px"; alt="">
                    <div class="caption">
                        <h3>{$row['model']}</h3>
                        
                        <p>
                            <a href="../resources/cart.php?add={$row['item_id']}" class="btn btn-primary">Buy Now!</a> 
                            <a href="item.php?id={$row['item_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

DELIMETER;

echo $product;

}

}


//
  function get_products_in_shop_page() {
	
	$query = query("SELECT * FROM  Phone");
	confirm($query);

	while($row = fetch_array($query)){

		if ($row['stock_quantity'] > 0) {

			$product = <<<DELIMETER

	
                <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="image/{$row['img']}" style="height: 200px;width:200px"; alt="">
                    <div class="caption">
                        <h3>{$row['model']}</h3>
                                               <p>
                            <a href="../resources/cart.php?add={$row['item_id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['item_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

DELIMETER;

			echo $product;
		}
	}

}

function login_user(){
	if(isset($_POST['password'])){
		$username = escape_string($_POST['username']);
		$password = escape_string($_POST['password']);

		$query = query("SELECT user_type, id FROM User INNER JOIN UserLogin ON User.id = UserLogin.user_id WHERE userlogin.username = '$username' AND userlogin.password = '$password' ");
		confirm($query);

		if(mysqli_num_rows($query) == 0) {
			set_message("Your password or username is wrong.");
			redirect("login.php");
		}
		else {
			$arr = mysqli_fetch_array($query);
			$_SESSION['username'] = $username;
			$_SESSION['user_id'] = $arr['id'];

			if ($arr['user_type'] == 1) {
				redirect("index.php");
			}
			else {
                redirect("admin/index.php");
			}
		}
	}
}


function logout_user() {

	session_start();
	session_destroy();
	header("Location: ../public");


}

function send_message(){

	if(isset($_POST['submit'])){

		$to   = "hxy153530@gmail.com";
		$from_name = $_POST['name'];
		$subject = $_POST['subject'];
		$email = $_POST['email'];
		$message = $_POST['message'];

		$headers = "From: {$from_name} {$email}";
		$result = mail($to,$subject,$message,$headers);

		if(!$result){
			echo "ERROR";
		}else{
			echo "SENT";
		}

	}

}














/*******************************BACK END FUNCTIONS**********************/

// for customer
function display_orders(){

	$query = "";

	if(isset($_SESSION['user_id'])) {

		$id = $_SESSION['user_id'];

		$query = query("SELECT * FROM CustomerOrder
						INNER JOIN Phone 
						ON CustomerOrder.item_id=Phone.item_id 
						INNER JOIN Maker 
						ON Phone.maker_id=Maker.id
						WHERE customer_id =$id ORDER BY CustomerOrder.order_id"); 
		confirm($query);

		$query2 = query("SELECT first_name FROM User WHERE id =$id");
		confirm($query2);

		$arr = mysqli_fetch_row($query2);
		$name = $arr[0];

		echo "<h1>$name's Order History</h1>";


		while($row = fetch_array($query)) {
			$orders = <<<DELIMETER

<tr>
	<td><img src=image/{$row['img']} style=width:110px; height:110px></td>
   	<td>{$row['model']}</td>
   	<td>{$row['order_id']}</td>
   	<td>{$row['quantity']}</td>
   	<td>\${$row['price']}</td>
   	<td>{$row['ship_date']}</td>
   	<td>{$row['arrival_date']}</td>

</tr>

DELIMETER;

			echo $orders . "<br>"; 


		}

	}
	else {
		redirect("../public/index.php");
	}

}


function display_all_orders() {

	$query = query("SELECT * FROM CustomerOrder
								INNER JOIN Phone 
								ON CustomerOrder.customer_id=Phone.item_id 
								INNER JOIN Maker 
								ON Phone.maker_id=Maker.id
								ORDER BY CustomerOrder.order_id"); 
	confirm($query);


	while($row = fetch_array($query)){
	$orders = <<<DELIMETER


	<tr>
		<td><img src=../../resources/uploads/{$row['img']} style=width:110px; height:110px></td>
	   	<td>{$row['model']}</td>
	   	<td>{$row['order_id']}</td>
	   	<td>{$row['quantity']}</td>
	   	<td>\${$row['price']}</td>
	   	<td>{$row['ship_date']}</td>
	   	<td>{$row['arrival_date']}</td>

	</tr>

DELIMETER;

	echo $orders . "<br>"; 


		}
}



function get_products_in_admin(){

$query = query("SELECT * FROM  phone");
	confirm($query);

	while($row = fetch_array($query)){

		$category = show_product_category_title($row['maker_id']);

$product = <<<DELIMETER

	   <tr>
            <td>{$row['item_id']}</td>
            <td>{$row['model']}<br>
            <a href = "index.php?edit_product&id={$row['item_id']} "> <img width='100' src="../../resources/uploads/{$row['img']}" alt=""> </a>            </td>
            <td>{$category}</td>
            <td>{$row['price']}</td>
            <td>{$row['stock_quantity']}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['item_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
      
DELIMETER;

echo $product;

}


}


function add_product(){

	if(isset($_POST['publish'])){
		
		$model       = escape_string($_POST['model']);
		$maker_id    = escape_string($_POST['maker_id']);
		$price		 = escape_string($_POST['price']);
		//$product_description = escape_string($_POST['product_description']);
		//$short_desc			 = escape_string($_POST['short_desc']);
		$stock_quantity	 = escape_string($_POST['stock_quantity']);
		$img	     = escape_string($_FILES['file']['name']);
		$image_temp_location = escape_string($_FILES['file']['tmp_name']);


		move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY.DS.$img);

		$query = query("INSERT INTO Phone(model,maker_id,price,stock_quantity,img) VALUES('{$model}','{$maker_id}','{$price}','{$stock_quantity}','{$img}')");
		
		confirm($query);
		set_message("New product was Added");
		redirect("index.php?products");


     }


}


//
function show_caregories_add_product_page(){

	 	$query = query("SELECT * FROM maker");
	    confirm($query);

	    while($row = fetch_array($query)) {

	    		$categories_option = <<<DELIMETER
          <option value="{$row['id']}">{$row['name']}</option>				  
DELIMETER;
echo $categories_option;



	    }

  }



function show_product_category_title($maker_id){


	$category_query = query("SELECT * FROM maker WHERE id =  {$maker_id} ");
	confirm($category_query);

	while($category_row = fetch_array($category_query)){
		 return $category_row['name'];

	}

}

function register_user(){
	if(isset($_POST['submit'])){
		$username = escape_string($_POST['username']);
		$pw = escape_string($_POST['password']);
        $fname = escape_string($_POST['firstname']);
		$lname = escape_string($_POST['lastname']);
		$dob = escape_string($_POST['dob']);
		$street = escape_string($_POST['street']);
		$city = escape_string($_POST['city']);
		$state = escape_string($_POST['state']);
		$zip = escape_string($_POST['zip']);
		$phone = escape_string($_POST['phone']);
		$email = escape_string($_POST['email']);
		$hashedPassword = password_hash($pw, PASSWORD_DEFAULT);
		$query = query("SELECT * FROM UserLogin WHERE username = '{$username}'");
		confirm($query);
        $query_1 = query("SELECT *from user WHERE email = '{$email}'");
        confirm($query_1);
        if(mysqli_num_rows($query_1) >= 1 ){
        	set_message("This Email is already used. Please try again!");
        	redirect("register.php");
        }
        else{
					if(mysqli_num_rows($query) == 0 )
					{  
						$sql_3 = query("SELECT zip from Region where zip=$zip"); // test for uniqueness of zip

						if ($mysqli_num_rows == 0) { // insert new zip
							$sql_4 = query("INSERT INTO region (zip, city, state) 
								VALUES ('$zip', '$city', '$state')");
							confirm($sql_4);
						}
						
						// insert user info into user table
						$sql_1 = query("INSERT INTO user (user_type, first_name, last_name, dob, street, zip, phone, email) 
							VALUES ('1', '$fname', '$lname', '$dob', '$street',  '$zip', '$phone', '$email')");
						confirm($sql_1);
						
						// get user_id
						$sql = query("SELECT id from user where email = '{$email}'");
						confirm($sql);
			            $arr = mysqli_fetch_row($sql);
						$id = $arr[0]; // store user_id
		
						// insert user into userlogin table
						$sql_2=query("INSERT INTO userlogin(user_id, username, password,date_joined,last_login)
							VALUES ('$id','$username', '$hashedPassword', NOW(), NOW())");
						confirm($sql_2);

						// header("refresh:1;url = index.php");
						echo "<h5>You are registered! Welcome to Smart Mobile!</h5>";
					}else{
						set_message("This username is already used. Please try another username!");
						redirect("register.php");

					}
	        }

	}
	
}

function search_result(){
	if(isset($_POST['search'])){
		$keyword = escape_string($_POST['search']);
		//$query = query("SELECT * FROM phone WHERE model LIKE '%" . $keyword . "%'");
		$query = query("SELECT item_id, img, model FROM phone INNER JOIN maker ON item_id=id WHERE model LIKE '%" . $keyword . "%' OR name LIKE '%" . $keyword . "%' ");
		confirm($query);
		$row = fetch_array($query);
		
				if(mysqli_num_rows($query) > 0){
					$result = <<<DELIMETER

			
		                <div class="col-md-3 col-sm-6 hero-feature">
		                <div class="thumbnail">
		                    <img src="image/{$row['img']}" style="height: 200px;width:200px"; alt="">
		                    <div class="caption">
		                        <h3>{$row['model']}</h3>
		                                               <p>
		                            <a href="../resources/cart.php?add={$row['item_id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['item_id']}" class="btn btn-default">More Info</a>
		                        </p>
		                    </div>
		                </div>
		            </div>

DELIMETER;

					echo $result;
	}
	else{
		echo "<h1>No matched result found.</h1>";
	}			
		
	}
}


//

function update_product(){

	if(isset($_POST['update'])){
		
		$model       = escape_string($_POST['model']);
		$maker_id    = escape_string($_POST['maker_id']);
		$price		 = escape_string($_POST['price']);
		//$product_description = escape_string($_POST['product_description']);
		//$short_desc			 = escape_string($_POST['short_desc']);
		$stock_quantity	 = escape_string($_POST['stock_quantity']);
		//$img	     = escape_string($_FILES['file']['name']);
		//$image_temp_location = escape_string($_FILES['file']['tmp_name']);


		//move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY.DS.$img);

		$query = "UPDATE phone SET ";
		$query .= "model       	= '{$model}'        , ";
		$query .= "maker_id       	= '{$maker_id}'        , ";
		$query .= "price       	= '{$price}'        , ";
		$query .= "stock_quantity       	= '{$stock_quantity}'         ";
		//$query .= "img       	= '{$img}'         ";
		$query .= "WHERE item_id=" . escape_string($_GET['id']);

		
		$send_update_query = query($query);
		confirm($send_update_query);
		set_message("New product was Updated");
		redirect("index.php?products");



     }


}



// add row to database, called from buy.php
function checkout() {

	if (isset($_SESSION['user_id'])) {

		$id = $_SESSION['user_id']; 

		$query = query("SELECT item_id FROM CustomerCart WHERE customer_id=$id");
		confirm($query);
	

		while ($row = mysqli_fetch_array($query)) {
			$item = $row['item_id'];

			$query2 = query("INSERT INTO CustomerOrder (customer_id, item_id, order_date, ship_date, arrival_date, quantity) 
						     VALUES ('$id', '$item', CURDATE(), DATE_ADD(CURDATE(), INTERVAL 2 DAY), DATE_ADD(CURDATE(), INTERVAL 5 DAY), 1)");
			confirm($query2);

			$query3 = query("DELETE FROM CustomerCart WHERE customer_id=$id AND item_id=$item");
			confirm($query3);

		}	


		

	}



    redirect("../public");
}






 ?>