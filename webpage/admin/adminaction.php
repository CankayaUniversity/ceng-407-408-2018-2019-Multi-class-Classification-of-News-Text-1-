<?php
    include('../includes/db.php');
    if(isset($_GET['type']))
    {
        $status2=$_GET['type'];
        $select=mysqli_query($con, "select * from user where uID='$status2'");
        while($row=mysqli_fetch_object ($select))
        {
            $status_vari=$row->uType;
            if($status_vari=='admin')
            {
                $status_state= 'user';
            }
            else
            {
                $status_state= 'admin';
            }
            $update=mysqli_query($con, "update user set uType='$status_state' where uID='$status2' ");
            if($update)
            {
                header("Location:members.php");
            }
            else
            {
                echo mysqli_error();
            }
        }
?>
    <?php
    }
    ?>
