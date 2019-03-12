<!DOCTYPE html>
<html>
<head>
    <title>Model</title>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }
</style>
    </head>
<body>
    <button type="button">Apply</button>
    <button type="button">Train Model</button>
    <table>
        <tr>
          <th>Model Name</th>
          <th>Parameter</th>
          <th>Method Name</th>
        </tr>
               <?php
                  $conn= mysqli_connect("localhost", "root", "", "deneme") or die("Unable to connect".$conn-> connect_error);

                    $sql="SELECT modelName, parameter, methodId from model";
                    $res = $conn-> query($sql);


                    if ($res-> num_rows > 0){
                        while ($row = $res-> fetch_assoc()){
                            echo "<tr><td>".$row["modelName"]."</td><td>".$row["parameter"]."</td><td>".$row["methodId"]."</td></tr>";
                        }
                        echo "</table>";
                    }
                    else{
                        echo "0 result";
                    }
                $conn-> close();


                ?>

    </table>

<!--
<form name="form1" method="post" action="checkbox.php">
  <input name="deger[]" type="checkbox" id="deger" value="$repoID">
  <input name="deger[]" type="checkbox" id="deger" value="$repoID">
  <input type="submit" name="button" id="button" value="Gönder">
</form>
 $conn= mysqli_connect("localhost", "root", "", "proje") or die("Unable to connect".$conn-> connect_error);

                    $sql="SELECT repoID, repoName, repoPath from repo";
                    $result = $conn-> query($sql);
-->

</body>
</html>
