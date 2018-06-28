<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS ."header.php") ?>
    <!-- Page Content -->
    <div class="container">

      <header>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="js/loginvalidation.js"></script>
        <div class="col-sm-4 col-sm-offset-5">         
            <?php logout_user(); ?>
        </div>  


    </header>


        
    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS ."footer.php") ?>