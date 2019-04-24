<?php  include('repo_control.php'); ?>

<?php
	if (isset($_GET['edit'])) {
		$repoID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM repo WHERE repoID= $repoID");

		if (@count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$repoName = $n['repoName'];
			$repoPath = $n['repoPath'];
		}
	}
?>

<?php
   if(isset($_FILES['text'])){
      $errors= array();
      $file_name = $_FILES['text']['name'];
      $file_size =$_FILES['text']['size'];
      $file_tmp =$_FILES['text']['tmp_name'];
      $file_type=$_FILES['text']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['text']['name'])));

      $extensions= array("txt","lab");

      if(in_array($file_ext,$extensions)=== false){
         $errors[]="File extension is not correct, please choose a txt or lab file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"files/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site Description Here">
	   <title>Repo Management</title>
        <link rel="stylesheet" type="text/css" href="css/repo.css">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/socicon.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flickity.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/jquery.steps.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
<body>

    <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

    <?php $results = mysqli_query($db, "SELECT * FROM repo"); ?>

<table>
	<thead>
		<tr>
			<th>Repo Name</th>
			<th>Repo Path</th>
			<th colspan="2"> &nbsp; &nbsp; Action</th>
		</tr>
	</thead>

	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['repoName']; ?></td>
			<td><?php echo $row['repoPath']; ?></td>
			<td>
				<a href="repo.php?edit=<?php echo $row['repoID']; ?>" class="edit_btn" onclick="myFunction()">Edit</a>
                &nbsp;
                <a href="repo_control.php?del=<?php echo $row['repoID']; ?>" class="del_btn" >Delete</a>
			</td>
			<!--<td>

			</td>-->
		</tr>
	<?php } ?>
</table>


	<form method="post" action="repo_control.php" >
<!--        class="hidden"-->
<!--        <div id="a" style="display:none">-->
        <div class="input-group">

			<input type="hidden" name="repoID" value="<?php echo $repoID; ?>">
		</div>
		<div class="input-group">
			<label>Repo Name</label>
			<input type="text" name="repoName" value="<?php echo $repoName; ?>">
		</div>
		<div class="input-group">
			<label>Repo Path</label>
			<input type="text" name="repoPath" value="<?php echo $repoPath; ?>">
		</div>
		<div class="input-group">
            <br>
			<?php if ($update == true): ?>
	           <button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
            <?php else: ?>

	           <button class="btn btn--primary" type="submit" name="save" >Save</button>
            <?php endif ?>
		</div>
<!--            </div>-->
	</form>

    <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="text" />
         <input type="submit"/>
      </form>



        <!--<script>
       function myFunction() {
  var x = document.getElementById("a");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>-->
</body>

</html>
