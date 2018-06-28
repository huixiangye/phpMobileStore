   <?php
   

   if(isset($_GET['id'])){ 

    $query = query("SELECT * FROM phone WHERE item_id = ".escape_string($_GET['id'])." ");
    confirm($query);

    while ($row = fetch_array($query)) {
    $model        = escape_string($row['model']);
    $maker_id  = escape_string($row['maker_id']);
    $price        = escape_string($row['price']);
    $stock_quantity  = escape_string($row['stock_quantity']);
    $img           = escape_string($row['img']);
  
    }

   update_product();


   }


  ?>


<div class="row">
<h1 class="page-header">
   EDIT Product
     
</h1>
</div>
               


<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="model" class="form-control" value="<?php echo $model; ?>">
       
    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="price" class="form-control" size="60" value="<?php echo $price; ?>">
      </div>
    </div>



    <div class="form-group">
           <label for="product-title">Product Short Description</label>
      <textarea name="short_desc" id="" cols="30" rows="3" class="form-control"></textarea>
    </div>




    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
        <select name="maker_id" id="" class="form-control">
            <option value="<?php echo $maker_id; ?>"><?php echo show_product_category_title($maker_id); ?></option>
           <?php show_caregories_add_product_page();?>
        </select>


</div>





    <!-- Product Brands-->


    <div class="form-group">
      <label for="product-title">Product Quantity</label>
         <input type="number" name="stock_quantity" class="form-control" value="<?php echo $stock_quantity; ?>" >
    </div>


<!-- Product Tags -->


   <!--  <div class="form-group">
          <label for="product-title">Product Keywords</label>
          <hr>
        <input type="text" name="product_tags" class="form-control">
    </div>
 -->
    <!-- Product Image -->
   <!--  <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="file">

        <img width = "100" src="../../public/image/<?php echo $img; ?>">
      
    </div>
 -->


</aside><!--SIDEBAR-->


    
</form>

             
