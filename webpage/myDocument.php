<?php
	session_start();
    $db = mysqli_connect('localhost', 'root', '', 'doc');

    if (mysqli_connect_errno())
    {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
    }

    $doc_veri= mysqli_query($db, "SELECT docID,docName,icerik FROM docs ");



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site Description Here">
	   <title>My Documents</title>
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
<table>
	<thead>
		<tr>
			<th>Document ID</th>
			<th>Document Name</th>
            <th>Labels</th>
		</tr>
	</thead>

	<?php while ($row = mysqli_fetch_array($doc_veri)) { ?>
		<tr>
            <td><?php echo $row['docID']; ?></td>
            <td> <?php echo'<a href="icerik.php">'.$row['docName'].'</a></br>';
                            $_SESSION['veri']=$row["docName"];?></td>
            <td><?php $lbl= mysqli_query($db, "SELECT * FROM label ");
                    $row= mysqli_fetch_array($lbl);
                    echo $row['labelName']; ?></td>

		</tr>
	<?php } ?>
</table>
</body>
</html>
