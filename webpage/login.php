<?php include ("includes/functions.php") ?>
<?php include "includes/header.php"; ?>

        <div class="nav-container">
            <div>
                 <?php include "includes/nav.php"; ?>
            </div>
        </div>

<?php if (isset($_SESSION['msg'])) : ?>

<?php
echo "<script type='text/javascript'>notifier.alert('You need to login first!');</script>";
unset($_SESSION['msg']);
?>
<?php endif ?>

        <div class="main-container">
            <section class="height-90 imagebg text-center" data-overlay="9">
                <div class="background-image-holder"><img alt="background" src=""></div>
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-md-7 col-lg-5">
                            <h2>Login</h2>
                            <p class="lead"> Welcome back, sign in with your existing account credentials </p>
                            <form action="login.php" method="post">
                                <?php echo display_error(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                    <input type="text" placeholder="Username" name="username" class= "form-control">
                                    </div>

                                    <div class="form-group">
                                    <input type="password" placeholder="Password" name="password" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                    <input class="btn btn--primary type--uppercase" type="submit" name="login_btn" value="Login">
                                    </div>
                                    </div>
                                </div>
                            </form> <span class="type--fine-print block">Dont have an account yet? <a href="register.php">Create account</a></span> <span class="type--fine-print block">Forgot your username or password? <a href="recover.php">Recover account</a></span> </div>
                    </div>
                </div>
            </section>


<?php
include "includes/footer.php";
?>
