<?php
include "includes/header.php";
?>


<div class="bar bg--dark bar--sm visible-sm visible-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-3 col-md-2">
                            <a href="index.html">
                                <img class="logo logo-dark" alt="logo" src="img/logo-dark.png" />
                                <img class="logo logo-light" alt="logo" src="img/logo-light.png" />
                            </a>
                        </div>
                        <div class="col-9 col-md-10 text-right">
                            <a href="#" class="hamburger-toggle" data-toggle-class="#menu5;hidden-xs hidden-sm">
                                <i class="icon icon--sm stack-interface stack-menu"></i>
                            </a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </div>
            <!--end bar-->
            <nav class="bar bar--sm bg--dark" id="menu5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 hidden-xs hidden-sm">
                            <div class="bar__module">
                                <a href="index.html">
                                    <img class="logo logo-dark" alt="logo" src="img/logo-dark.png" />
                                    <img class="logo logo-light" alt="logo" src="img/logo-light.png" />
                                </a>
                            </div>
                            <!--end module-->
                        </div>
                        <div class="col-lg-5">
                            <div class="bar__module">
                                <ul class="menu-horizontal">
                                    <li>
                                        <a href="#">
                                            <i class="stack-interface stack-plus-circled"></i> Create
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="stack-interface stack-cog"></i> Manage
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--end columns-->
                        <div class="col-lg-6 text-right text-left-xs">
                            <div class="bar__module">
                                <ul class="menu-horizontal">
                                    <li class="dropdown">
                                        <span class="dropdown__trigger">
                                            <img alt="avatar" class="avatar image--xxs" src="img/avatar-round-1.png" /> Username
                                        </span>
                                    </li>
                                    <li class="dropdown">
                                        <span class="dropdown__trigger">
                                            <i class="stack-interface stack-bell"></i> Alerts
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="bar__module">
                                <a class="btn btn--primary btn--sm type--uppercase" href="#">
                                    <span class="btn__text">
                                        Upgrade
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!--end columns-->
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </nav>
            <section class="height-50 imagebg text-center" data-overlay="4">
                <div class="background-image-holder">
                    <img alt="background" src="img/landing-13.jpg" /> <!--some background image-->
                </div>
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Welcome!</h1>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
</section>

<?php
include "includes/footer.php";
?>

