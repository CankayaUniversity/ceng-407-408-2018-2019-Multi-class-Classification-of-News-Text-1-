<?php
if($_FILES["upload_file"]["name"] != '')
{
 $data = explode(".", $_FILES["upload_file"]["name"]);
 $extension = $data[1];
 $allowed_extension = array("txt");
 if(in_array($extension, $allowed_extension))
 {
  //$new_file_name = rand() . '.' . $extension;

     $new_file_name = $_FILES["upload_file"]["name"];
  // $path = 'D:/xampp/htdocs/mtlbl/webpage/admin/classify' . $_POST["hidden_model_name"] . '/' . $new_file_name;
     $a = $_POST["hidden_model_name"];
     if (!file_exists("D:/xampp/htdocs/mtlbl/webpage/admin/classify/$a")) {
     mkdir("D:/xampp/htdocs/mtlbl/webpage/admin/classify/$a");
         $path = "D:/xampp/htdocs/mtlbl/webpage/admin/classify/$a/" . $new_file_name;
     }
     else{
     $path = "D:/xampp/htdocs/mtlbl/webpage/admin/classify/$a/" . $new_file_name; }
  if(move_uploaded_file($_FILES["upload_file"]["tmp_name"], $path))
  {
     /* echo $_FILES["upload_file"]["tmp_name"];
      echo '--';
      echo $_POST["hidden_model_name"];
      echo '<br>';
      echo $path;*/

     /*
      $model_name = $_POST["hidden_model_name"];
      $vec_dim =  $_POST["hidden_vec_dim"];

      $labels = $_POST["hidden_labels"];
      $test_ratio = $_POST["hidden_test_ratio"];
    $epoch = $_POST["hidden_epoch"];
      $datName = $_POST["hidden_dataset_name"];*/

     /* $b = popen("python -u D:\\xampp\\htdocs\\mtlbl\\webpage\\admin\\classify.py $model_name $vec_dim $test_ratio $epoch $path $labels", "r");


      while (!feof($b)) {
          $buffer = fgets($b);
        echo "$buffer<br>\n";
        ob_flush();
        }
        pclose($b);
      */

     /* mysqli_query($db, "INSERT INTO model (modelName, modelPath, modelVec, modelEp, modelLabel, modelRatio, datasetName) VALUES ('$model_name', '$model_name', '$vec_dim', '$epoch', '$labels', '$test_ratio', '$folder_name')");
      */
      $_SESSION['path'] = $path;
   echo 'Text Uploaded';
  }
  else
  {
   echo 'There is some error';
  }
 }
 else
 {
  echo 'Invalid Text File';
 }
}
else
{
 echo 'Please Select Text File';
}
?>
