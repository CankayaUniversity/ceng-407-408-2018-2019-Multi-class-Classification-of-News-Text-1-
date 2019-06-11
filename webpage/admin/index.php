<?php
include "includes/header.php";

include('../includes/functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
?>

<div class="bar bg--dark bar--sm visible-sm visible-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-3 col-md-2">
                            <a href="admin/index.php">

                                <img class="logo logo-light" alt="logo" src="img/ceng.png" />
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

<?php
include "includes/nav.php";
?>

<?php if (isset($_SESSION['success'])) : ?>
			<div class="" id="msg">

					<?php
						#echo $_SESSION['success'];
						#

         /*   echo '<div class="alert bg--success"><div class="alert__body"> <span>Login is successful!</span></div> <div class="alert__close"> &times; </div></div>';*/

               /*  echo '<div class="notification col-md-2 col-lg-2  pos-top " data-animation="from-top" data-autoshow="200"><div class="boxed boxed--border border--round box-shadow"><div class="text-block"> <h5>Login is succesful!</h5> </div></div></div>';*/


               echo "<script type='text/javascript'>notifier.success('Login is successful!');</script>";
unset($_SESSION['success']);

					?>

<!--      <script language="JavaScript" type="text/javascript">timedMsg()</script>-->
			</div>
		<?php endif ?>


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

