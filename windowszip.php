<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Unzip for Windows</title>
</head>

<body>
<form action="windowszip.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file"><input type="submit" name="submit" value="Extract">
</form>

<?php

if(isset($_POST['submit']))
{
	$array = explode(".",$_FILES["file"]["name"]);
	$fileName = $array[0];
	$fileExtension = strtolower(end($array));

	if($fileExtension == "zip")
	{
		if(is_dir("zips/".$fileName) == false)
		{
			move_uploaded_file($_FILES["file"]["tmp_name"],"tmp/".$_FILES["file"]["name"]);
			$zip = new ZipArchive();
			$zip -> open("tmp/".$_FILES["file"]["name"]);

			for($num = 0; $num < $zip->numFiles; $num++)
			{
				$fileInfo = $zip->statIndex($num);
				echo "Extracting: ".$fileInfo["name"];
				$zip->extractTo("zips/".$fileName);
				echo "<br />";
			}

			$zip->close();
			unlink("tmp/".$_FILES["file"]["name"]);
            /*echo "<pre>";
print_r(error_get_last());*/
		}
		else
		{
			echo $fileName." has already been unzipped";
		}
	}
	else
	{
		echo "Only .zip files are allowed";
	}
}

?>
</body>
</html>
