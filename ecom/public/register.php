 <?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS ."header.php") ?>
    <!-- Page Content -->
    <div class="container">

      <header>
            <link rel="stylesheet" href="css/styles.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="js/registervalidation.js"></script>
            <h1 class="text-center">Register</h1>
            <h5></h5>
            <h4 class="text-center bg-warning"><?php display_message(); ?></h4>
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">

               <?php register_user(); ?>
                <p><span class="error">* required field.</span></p>
                <div class="form-group"><label for="">
                    Username<span class="error">*</span><input type="text" name="username" class="form-control" id="username"></label>
                </div>
                <div class="form-group">
                    <label for="password">
                    Password<span class="error">*</span><input type="password" name="password" class="form-control" id="password" placeholder="at least 5 characters" required></label>
                </div>
                <div class="form-group"><label for="">
                    Email<span class="error">*</span><input type="text" name="email" class="form-control" id="email"></label>
                </div>
                <div class="form-group"><label for="">
                    Firstname<span class="error">*</span><input type="text" name="firstname" class="form-control" id="firstname"></label>
                </div>
                <div class="form-group"><label for="">
                    Lastname<span class="error">*</span><input type="text" name="lastname" class="form-control" id="lastname"></label>
                </div>
                <div class="form-group"><label for="">
                    Date of Birth<span class="error">*</span><input type="text" name="dob" class="form-control" id="dob"></label>
                </div>
                <div class="form-group"><label for="">
                    Street<span class="error">*</span><input type="text" name="street" class="form-control" id="street"></label>
                </div>
                <div class="form-group"><label for="">
                    City<span class="error">*</span><input type="text" name="city" class="form-control" id="city"></label>
                </div>
                <div class="form-group"><label for="">
                    State<span class="error">*</span><input type="text" name="state" class="form-control" id="state"></label>
                </div>
                <div class="form-group"><label for="">
                    Zip<span class="error">*</span><input type="text" name="zip" class="form-control" id="zip"></label>
                </div>
                <div class="form-group"><label for="">
                    Phone<span class="error">*</span><input type="text" name="phone" class="form-control" id="phone"></label>
                </div>
                
                 

                <div class="form-group">
                  <input type="submit" name="submit" value="Create your account" class="btn btn-primary" >
                </div>
            </form>
        </div>  
    </header>       
    </div>
    <!-- /.container -->

<?php include(TEMPLATE_FRONT . DS ."footer.php") ?>
