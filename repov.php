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
<!DOCTYPE html>
<html>
<head>
	<title>Repo Management</title>
    <link rel="stylesheet" type="text/css" href="css/repo.css">
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
				<a href="repov.php?edit=<?php echo $row['repoID']; ?>" class="edit_btn" >Edit</a>
                &nbsp;
                <a href="repo_control.php?del=<?php echo $row['repoID']; ?>" class="del_btn" >Delete</a>
			</td>
			<!--<td>

			</td>-->
		</tr>
	<?php } ?>
</table>


	<form method="post" action="repo_control.php" >
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
			<?php if ($update == true): ?>
	           <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
            <?php else: ?>
	           <button class="btn" type="submit" name="save" >Save</button>
            <?php endif ?>
		</div>
	</form>
</body>
</html>
