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

                    $sql="SELECT model.modelId,model.modelName, model.parameter,model.modelPath, model.methodId,method.methodName,method.methodId from model,method WHERE model.methodId=method.methodId";
                    $res = $conn-> query($sql);




                        while ($sonuc = $res-> fetch_assoc()){
                            $modelId = $sonuc['modelId'];
                            $modelName = $sonuc['modelName'];
                            $parameter = $sonuc['parameter'];
                            $modelPath = $sonuc['modelPath'];
                            $methodName = $sonuc['methodName'];




                          ?>
           <tr>
        <td><?php echo $modelId; ?></td>
        <td><?php echo $modelName; ?></td>
        <td><?php echo $parameter; ?></td>
         <td><?php echo $modelPath; ?></td>
        <td><?php echo $methodName; ?></td>
        <td><a href="model.php?up=<?php echo $modelId; ?>" class="btn btn-primary">Düzenle</a></td>
        <td><a href="model.php?del=<?php echo $modelId; ?>" class="btn btn-danger">Sil</a></td>
    </tr>
        <?php
        }
        ?>
    </table>
    <?php

$sql = $conn->query("SELECT * FROM model WHERE modelId =".(int)$_GET['up']);



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


        if ($conn->query("UPDATE model SET modelName = '$modelName', modelPath = '$modelPath' WHERE modelId =".$_GET['up']))
        {
            header("location:model.php");

        }
        else
        {
            echo "Hata oluştu";
        }
    }
}
?>

     <?php

if (isset($_GET['del'])) {
	$modelId = $_GET['del'];
	 if($conn->query("DELETE FROM model WHERE modelId =".$_GET['del'])){

	header('location: model.php');}
else{
     echo "Hata oluştu";
}

}

?>


</body>

</html>
