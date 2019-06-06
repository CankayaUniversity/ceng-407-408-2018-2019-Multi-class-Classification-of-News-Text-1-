<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'multi');

	// initialize variables
	$repoName = "";
	$repoPath = "";
	$repoID = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$repoName = $_POST['repoName'];
		$repoPath = $_POST['repoPath'];

		mysqli_query($db, "INSERT INTO repo (repoName, repoPath) VALUES ('$repoName', '$repoPath')");
		$_SESSION['message'] = "Repo Info Saved!";
		header('location: repo.php');
	}

// ...

if (isset($_POST['update'])) {
	$repoID = $_POST['repoID'];
	$repoName = $_POST['repoName'];
	$repoPath = $_POST['repoPath'];

	mysqli_query($db, "UPDATE repo SET repoName='$repoName', repoPath='$repoPath' WHERE repoID=$repoID");
	$_SESSION['message'] = "Repo Info Updated!";
	header('location: repo.php');
}
// ...

if (isset($_GET['del'])) {
	$repoID = $_GET['del'];
	mysqli_query($db, "DELETE FROM repo WHERE repoID=$repoID");
	$_SESSION['message'] = "Repo Deleted!";
	header('location: repo.php');
}
