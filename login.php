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
                <nav id="menu1" class="bar bar-1 hidden-xs bg--dark">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-1 col-md-2 hidden-xs">
                                <div class="bar__module">
                                    <a href="index.html"> <img class="logo logo-light" alt="logo" src="img/logo-light.png"> </a>
                                </div>
                            </div>
                            <div class="col-lg-11 col-md-12 text-right text-left-xs text-left-sm">
                                <div class="bar__module">
                                    <ul class="menu-horizontal text-left">
                                        <li> <a href="#">
                                        Single Link
                                    </a> </li>
                                        <li class="dropdown"> <span class="dropdown__trigger">
                                        Dropdown Slim
                                    </span>
                                            <div class="dropdown__container">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="dropdown__content col-lg-2">
                                                            <ul class="menu-vertical">
                                                                <li> <a href="#">Single Link</a> </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown"> <span class="dropdown__trigger">
                                        Dropdown Wide
                                    </span>
                                            <div class="dropdown__container">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="dropdown__content row w-100">
                                                            <div class="col-lg-3">
                                                                <h5>Menu Title</h5>
                                                                <ul class="menu-vertical">
                                                                    <li> <a href="#">Single Link</a> </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <h5>Menu Title</h5>
                                                                <ul class="menu-vertical">
                                                                    <li> <a href="#">Single Link</a> </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <h5>Menu Title</h5>
                                                                <ul class="menu-vertical">
                                                                    <li> <a href="#">Single Link</a> </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <h5>Menu Title</h5>
                                                                <ul class="menu-vertical">
                                                                    <li> <a href="#">Single Link</a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bar__module">
                                    <a class="btn btn--sm type--uppercase" href="#customise-template"> <span class="btn__text">
                                    Sign Up
                                </span> </a>
                                    <a class="btn btn--sm btn--primary type--uppercase" href="#purchase-template"> <span class="btn__text">
                                    Login
                                </span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
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
