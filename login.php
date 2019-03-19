<?php

include "includes/header.php";



?>



    <body data-smooth-scroll-offset="77">
        <div class="nav-container">
            <div>
                <div class="bar bar--sm visible-xs">
                    <div class="container">
                        <div class="row">
                            <div class="col-3 col-md-2">
                                <a href="index.html"> <img class="logo logo-dark" alt="logo" src="img/logo-dark.png">  </a>
                            </div>
                            <div class="col-9 col-md-10 text-right">
                                <a href="#" class="hamburger-toggle" data-toggle-class="#menu1;hidden-xs hidden-sm"> <i class="icon icon--sm stack-interface stack-menu"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                 <?php include "includes/nav.php"; ?>
            </div>
        </div>
        <div class="main-container">
            <section class="height-100 imagebg text-center" data-overlay="9">
                <div class="background-image-holder"><img alt="background" src=""></div>
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-md-7 col-lg-5">
                            <h2>Login to continue</h2>
                            <p class="lead"> Welcome back, sign in with your existing account credentials </p>
                            <form action="login.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                    <input type="text" placeholder="E-mail" name="email" class= "form-control">
                                    </div>

                                    <div class="form-group">
                                    <input type="password" placeholder="Password" name="password" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                    <input class="btn btn--primary type--uppercase" type="submit" name="submit" value="Login">
                                    </div>
                                    </div>
                                </div>
                            </form> <span class="type--fine-print block">Dont have an account yet? <a href="page-accounts-create-1.html">Create account</a></span> <span class="type--fine-print block">Forgot your username or password? <a href="page-accounts-recover.html">Recover account</a></span> </div>
                    </div>
                </div>
            </section>


           <?php

include "includes/footer.php";



?>
