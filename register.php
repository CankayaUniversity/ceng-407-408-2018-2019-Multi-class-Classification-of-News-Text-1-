<?php include "includes/functions.php"; ?>
<?php include "includes/header.php"; ?>

        <div class="nav-container">
            <div>
                 <?php include "includes/nav.php"; ?>
            </div>
        </div>

  <div class="main-container">
            <section class="height-100 imagebg text-center" data-overlay="9">
                <div class="background-image-holder"><img alt="background" src=""></div>
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-md-7 col-lg-5">
                            <h2>Register to continue</h2>
                            <p class="lead"> Welcome, create a new account by filling the form below </p>
                            <form action="register.php" method="post">
                                <?php echo display_error(); ?>
                                <div class="row">
                                    <div class="col-md-12">

                                    <div class="form-group">
                                    <input type="text" placeholder="Username" name="username" class= "form-control" value="<?php echo $username; ?>">
                                    </div>

                                    <div class="form-group">
                                    <input type="email" placeholder="E-mail" name="email" class= "form-control" value="<?php echo $email; ?>">
                                    </div>

                                    <div class="form-group">
                                    <input type="password" placeholder="Password" name="password_1" class="form-control">
                                    </div>
                                        <div class="form-group">
                                    <input type="password" placeholder="Confirm Password" name="password_2" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                    <input class="btn btn--primary type--uppercase" type="submit" name="reg_btn" value="Register">
                                    </div>
                                    </div>
                                </div>
                            </form> <span class="type--fine-print block">Already have an account? <a href="login.php">Login</a></span>
                            <!--<span class="type--fine-print block">Forgot your username or password? <a href="recover.php">Recover account</a></span> -->
                        </div>
                    </div>
                </div>
            </section>


<?php
include "includes/footer.php";
?>
