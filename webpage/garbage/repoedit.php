<?php

include 'includes/header.php';  ?>

<?php
include("connect.php"); //connect.php replace or add to files
?>

<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Repo Managment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    </head>
    <body>

    <?php

    $sorgu = $baglanti->query("SELECT * FROM repo_n WHERE repoID =".(int)$_GET['repoID']);


    $sonuc = $sorgu->fetch_assoc();

    ?>

    <div class="container">
    <div class="col-md-6">

    <form action="" method="post">

        <table class="table">

            <tr>
                <td>Repo Name</td>
                <td><input type="text" name="repoName" class="form-control" value="<?php echo $sonuc['repoName'];
                     ?>">
                </td>
            </tr>

            <tr>
                <td>İcerik</td>
                <td><textarea name="icerik" class="form-control"><?php echo $sonuc['icerik']; ?></textarea></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-primary" value="Save"></td>
            </tr>

        </table>

    </form>
    </div>
    <div>
    <?php

    if ($_POST) {

        $repoName = $_POST['repoName'];
        $icerik = $_POST['icerik'];

        if ($repoName<>"" && $icerik<>"") {


            if ($baglanti->query("UPDATE repo_n SET repoName = '$repoName', icerik = '$icerik' WHERE repoID =".$_GET['repoID']))
            {
                header("location:repoadd.php");

            }
            else
            {
                echo "Hata oluştu";
            }
        }
    }
    ?>

  </body>
</html>






<?php

include 'includes/footer.php'
?>
