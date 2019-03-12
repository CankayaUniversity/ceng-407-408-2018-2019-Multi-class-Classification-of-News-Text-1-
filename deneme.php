<!DOCTYPE html>
<html>
<head>
    <title>Repo</title>
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
    <button type="button">Add Repo</button>
    <table>
        <tr>
          <th>Repo ID</th>
          <th>Repo Name</th>
          <th>Repo Path</th>
        </tr>
               <?php
                    $conn= mysqli_connect("localhost", "root", "", "proje") or die("Unable to connect".$conn-> connect_error);

                    $sql="SELECT repoID, repoName, repoPath from repo";
                    $result = $conn-> query($sql);
                    if ($result-> num_rows > 0){
                        while ($row = $result-> fetch_assoc()){
                            echo "<tr><td>".$row["repoID"]."</td><td>".$row["repoName"]."</td><td>".$row["repoPath"]."</td></tr>";
                        }
                        echo "</table>";
                    }
                    else{
                        echo "0 result";
                    }
                $conn-> close();


                ?>

    </table>

<form name="form1" method="post" action="checkbox.php">
  <input name="deger[]" type="checkbox" id="deger" value="$repoID">
  <input name="deger[]" type="checkbox" id="deger" value="$repoID">
  <input type="submit" name="button" id="button" value="Gönder">
</form>

</body>
</html>
