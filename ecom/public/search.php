<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS ."header.php") ?>

<!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-9">

                <div class="row">


                <?php search_result(); ?> 

                </div><!-- Row ends here -->
 
            </div>

        </div>

    </div>
    <!-- /.container -->

<?php include(TEMPLATE_FRONT . DS ."footer.php") ?>
