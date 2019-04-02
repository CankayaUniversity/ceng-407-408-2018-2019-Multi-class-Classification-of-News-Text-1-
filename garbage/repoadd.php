<?php

include 'includes/header.php';  ?>


 <?php
include 'includes/db.php';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Repo Managment</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="col-md-6">

<form action="" method="post">

    <table class="table">

        <tr>
            <td>Repo Name</td>
            <td><input type="text" name="repoName" class="form-control" ></td>
        </tr>

        <tr>
            <td>Repo Path</td>
            <td><textarea name="repoPath" type="text" class="form-control" ></textarea></td>
        </tr>

        <tr>
            <td></td>
            <td><input class="btn btn-primary"  type="submit" value="Submit"></td>
        </tr>

    </table>

</form>



<?php

if ($_POST) {
    $repoName = $_POST['repoName'];
    $repoPath = $_POST['repoPath'];

    if ($repoName<>"" && $repoPath<>"") {

        if ($connection->query("INSERT INTO repo (repoName, repoPath) VALUES ('$repoName','$repoPath')"))
        {
            echo "Veri Eklendi";
        }
        else
        {
            echo "Hata oluştu";
        }

    }

}

?>
</div>

<div class="col-md-7">
<table class="table">
    <tr>
        <th>Repo ID</th>
        <th>Repo Name</th>
        <th>Repo Path</th>
<!--        <th>Icerik</th>-->
        <th></th>
        <th></th>
        <th></th>
    </tr>


<?php

$sorgu = $connection->query("SELECT * FROM repo");

while ($sonuc = $sorgu->fetch_assoc()) {

$repoID = $sonuc['repoID'];
$repoName = $sonuc['repoName'];
$repoPath = $sonuc['repoPath'];
//$icerik = $sonuc['icerik']

?>

    <tr>
        <td><?php echo $repoID;   ?></td>
        <td><?php echo $repoName; ?></td>
        <td><?php echo $repoPath; ?></td>

        <td><a href="repoedit.php?id=<?php echo $repoID; ?>" class="btn btn-primary">Edit</a></td>
        <td><a href="sil.php?id=<?php echo $repoID; ?>" class="btn btn-danger">Sil</a></td>
    </tr>

<?php
}

?>

</table>
</div>
</div>
</body>
</html>








<?php

include 'includes/footer.php';
?>
