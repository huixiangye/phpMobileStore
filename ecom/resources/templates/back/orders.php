

<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Orders
   <h4><?php display_message();?></h4>

</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>order_id</th>
           <th>customer_id</th>
           <th>item_id</th>
           <th>order_date</th>
           <th>ship_date</th>
           <th>arrival_date</th>
           <th>quantity</th>
      </tr>
    </thead>
    <tbody>
      <?php display_orders();?>

    </tbody>
</table>
</div>



