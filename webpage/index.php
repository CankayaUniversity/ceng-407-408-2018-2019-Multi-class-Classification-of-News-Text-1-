<?php include "includes/functions.php";
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');}
?>

<?php include "includes/header.php"; ?>


<?php include "includes/navuser.php"; ?>


		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="" >
				<h3>
					<?php
						#echo $_SESSION['success'];


                      echo "<script type='text/javascript'>notifier.success('Login is successful!');</script>";
                    unset($_SESSION['success']);

                    ?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
<!--			<img src="images/user_profile.png"  >-->

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php #echo $_SESSION['user']['uName']; ?></strong>

					<small>
						<!--<i  style="color: #888;">(<?php #echo ucfirst($_SESSION['user']['uType']); ?>)</i>-->
						<br>
<!--						<a href="index.php?logout='1'" style="color: red;">Logout</a>-->
					</small>

				<?php endif ?>
			</div>
		</div>



<?php include "includes/footer.php"; ?>