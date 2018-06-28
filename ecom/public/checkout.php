<?php 
  require_once("../resources/config.php"); 
  include(TEMPLATE_FRONT . DS ."header.php");

  if (!isset($_SESSION['user_id'])) {

    redirect("index.php");
  }
?>


    <!-- Page Content -->
    <div class="container">


<!-- /.row --> 

<div class="row">
      <h4 class="text-center bg-danger"><?php display_message(); ?></h4>
      <h1>Checkout</h1>

<form action="" method="POST">

    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Remove</th>
     
          </tr>
        </thead>
        <tbody>
        <?php cart(); ?>
        </tbody>
    </table>
</form>


 </div><!--Main Content-->

  <form action="../resources/buy.php">
    <input type="submit" value="Checkout" name="checkout" class="btn btn-primary">
  </form>

    </div>
    <!-- /.container -->

<?php include(TEMPLATE_FRONT . DS ."footer.php") ?>