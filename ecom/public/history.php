<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS ."header.php") ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-9">

                <div class="row"> 


                    <table class="table table-hover">
                        <thead>
                          <tr>
                               <th>Image</th>
                               <th>Model</th>
                               <th>Order Number</th>
                               <th>Quantity</th>
                               <th>Unit Price</th>
                               <th>Ship Date</th>
                               <th>Arrival Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php display_orders();?>

                        </tbody>
                    </table>

                </div><!-- Row ends here -->
 
            </div>

        </div>

    </div>
    <!-- /.container -->

<?php include(TEMPLATE_FRONT . DS ."footer.php") ?>





