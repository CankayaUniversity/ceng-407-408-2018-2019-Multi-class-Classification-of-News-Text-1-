<!DOCTYPE html>
<html>
<head>
    <title>Model</title>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
/*          width: 100%;*/
            table-layout:fixed;
            width:600px;
            margin:200px auto;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #DDD;
        }

</style>
    </head>
<body>

    <button type="button">Apply</button>
    <button type="button">Train Model</button>
    <table >
        <tr>
           <th>Model Id</th>
          <th>Model Name</th>
          <th>Parameter</th>
          <th>Model Path</th>
           <th>Method Name</th>

        </tr>
               <?php
                  $conn=mysqli_connect("localhost", "root", "", "deneme") or die("Unable to connect".$conn-> connect_error);

                    $sql="SELECT modelId,modelName, parameter,modelPath, methodId from model";
                    $res = $conn-> query($sql);




                        while ($sonuc = $res-> fetch_assoc()){
                            $modelId = $sonuc['modelId'];
                            $modelName = $sonuc['modelName'];
                            $parameter = $sonuc['parameter'];
                            $modelPath = $sonuc['modelPath'];
                            $methodId = $sonuc['methodId'];




                          ?>
           <tr>
        <td><?php echo $modelId; ?></td>
        <td><?php echo $modelName; ?></td>
        <td><?php echo $parameter; ?></td>
         <td><?php echo $modelPath; ?></td>
        <td><?php echo $methodId; ?></td>
        <td><a href="xx.php?id=<?php echo $modelId; ?>" class="btn btn-primary">Düzenle</a></td>
        <td><a href="xx.php?id=<?php echo $modelId; ?>" class="btn btn-danger">Sil</a></td>
    </tr>
        <?php
        }
        ?>
    </table>
    <?php

$sql = $conn->query("SELECT * FROM model WHERE modelId =".(int)$_GET['id']);



$sonuc = $sql->fetch_assoc();

?>

<div class="container">
<div class="col-md-6">

<form action="" method="post">

    <table class="table">

        <tr>
            <td>Model Name</td>
            <td><input type="text" name="modelName" class="form-control" value="<?php echo $sonuc['modelName'];
                 ?>">
            </td>
        </tr>

        <tr>
            <td>Model Path</td>
            <td><textarea name="modelPath" class="form-control"><?php echo $sonuc['modelPath']; ?></textarea></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" class="btn btn-primary" value="Kaydet"></td>
        </tr>

    </table>

</form>
</div>
<div>

    <?php

if ($_POST) {

    $modelName = $_POST['modelName'];
    $modelPath = $_POST['modelPath'];

    if ($modelName<>"" && $modelPath<>"") {


        if ($conn->query("UPDATE model SET modelName = '$modelName', modelPath = '$modelPath' WHERE modelId =".$_GET['id']))
        {
            header("location:xx.php");

        }
        else
        {
            echo "Hata oluştu";
        }
    }
}
?>

     <?php

if ($_GET)
{

if ($conn->query("DELETE FROM model WHERE modelId =".(int)$_GET['id']))
{
    header("location:model.php");
}
}

?>


</body>

</html>
