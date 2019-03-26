<!DOCTYPE html>
<html>
<head>
    <title>My Document Page User</title>
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


    <table >
        <tr>
           <th>Document ID</th>
          <th>Document Name</th>
         </tr>
        <?php
                  $conn=mysqli_connect("localhost", "root", "", "deneme") or die("Unable to connect".$conn-> connect_error);

                    $sql="SELECT document.docId,document.docName,users.userType,document.userId,users.userId FROM document,users WHERE document.userId=users.userId AND users.userType=0";

                    $res=mysqli_query($conn,$sql);




                        while ($sonuc = mysqli_fetch_assoc($res)){
                            $docId = $sonuc['docId'];
                            $docName = $sonuc['docName'];

                          ?>
            <tr>
        <td><?php echo $docId; ?></td>
        <td><?php echo $docName; ?></td>


    </tr>
           <?php
        }
        ?>
    </table>


</body>

</html>
