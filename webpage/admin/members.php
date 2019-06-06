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

<?php
include "includes/nav.php";
?>

<?php if (isset($_SESSION['success'])) : ?>
			<div class="" id="msg">

<?php
echo "<script type='text/javascript'>notifier.success('Login is successful!');</script>";
unset($_SESSION['success']); ?>

			</div>
		<?php endif ?>
 <table>
	<thead>
		<tr>
			<th>User Name</th>
			<th>User Status</th>
			<th>Action</th>
		</tr>
	</thead>

<?php


    include('../includes/db.php');
$select=mysqli_query($con,"select * from user");
while($row= mysqli_fetch_array ($select))
{
$id=$row['uID'];
$type=$row['uType'];
$data=$row['uName'];
$status=$row['isActive'];
?>
     <tr>
         <td> <?php echo $data; ?> <i>(<?php echo ucfirst($type); ?>)</i></td>
<td>
<?php
if(($status)=='0')
{
?>
<a href="memaction.php?status=<?php echo $row['uID'];  ?>"
 class="act" onclick="return confirm('Activate <?php echo $data; ?>');"> Not Active </a>
<?php
        }
            if(($status)=='1')
    {
    ?>
<a href="memaction.php?status=<?php echo $row['uID']; ?>"
 class="deact" onclick="return confirm('De-activate <?php echo $data; ?>');"> Active</a>
  <?php
        }
    ?>

</td>
         <td>

             <?php
             if(($type) == 'user')
             {

             ?>
         <a href="members.php?type=<?php echo $row['uID']; ?>" class="btn bg--twitter" onclick="myFunction()"><span class="btn__text">Promote to Admin</span></a>
          <?php
             }
             if(($type) == 'admin')
             {

             ?>
         <a href="members.php?type=<?php echo $row['uID']; ?>" class="btn bg--pinterest" onclick="myFunction()"><span class="btn__text">Demote to User</span></a>
         <?php
                }
            ?>

         </td>
</tr>
<?php }?>
</table>




