
<div class="col-md-12">
<div class="row">
<h1 class="page-header">All Orders<h4><?php display_message();?></h4></h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>
      <tr>
           <th>Item</th>
           <th>Model</th>
           <th>Order ID</th>
           <th>Quantity</th>
           <th>Price</th>
           <th>Ship Date</th>
           <th>Arrival Date</th>
      </tr>
    </thead>
    <tbody>
      <?php display_all_orders();?>

    </tbody>
</table>
</div>



