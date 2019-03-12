

<?php

    require('config.php');

    $sql = "SELECT * FROM model";
    $res = $mysqli->query($sql);


while($row = $res->fetch_array(MYSQLI_ASSOC)){
    $data[] = $row;

}
    $ress = ["sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data];

    echo json_encode($ress);
//



?>
