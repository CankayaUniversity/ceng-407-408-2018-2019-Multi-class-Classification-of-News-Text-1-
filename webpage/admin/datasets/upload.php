<?php
if($_FILES["upload_file"]["name"] != '')
{
 $data = explode(".", $_FILES["upload_file"]["name"]);
 $extension = $data[1];
 $allowed_extension = array("zip");
 if(in_array($extension, $allowed_extension))
 {
     $zip = new ZipArchive();
     $file = $_FILES["upload_file"]["name"]; //test.zip
     //$res = $zip->open($file); //test.zipi aç
  $new_file_name = rand() . '.' . $extension;

     //$file_name = $_FILES["upload_file"]["name"];
  $path = $_POST["hidden_folder_name"] . '/' . $new_file_name;
     $pathu = $_POST["hidden_folder_name"] . '/';


  if(move_uploaded_file($_FILES["upload_file"]["tmp_name"], $path))
    // if ($res === TRUE)
  {
      //$paths = pathinfo(realpath($path), PATHINFO_DIRNAME);
      $zip->open($path);
          $zip->extractTo($pathu);
  $zip->close();
      unlink($path);
   echo 'Dataset Uploaded';
     // echo $new_file_name;
     // echo $pathu;
     // echo $path;
  }
  else
  {
   echo 'There is some error';
      echo $file;
      echo $pathu;
  }
 }
 else
 {
  echo 'Invalid Dataset File';
 }
}
else
{
 echo 'Please Select Dataset';
}
?>
