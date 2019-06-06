<?php

$con=mysqli_connect('localhost','root','', 'mtlbl')or die(mysqli_error());
//$db=mysqli_select_db('mtlbl',$con) or die(mysqli_error());


/*ob_start();

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "mtlbl";

foreach($db as $key => $value){
define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);*/


//later on use it
//$query = "SET NAMES utf8";
//mysqli_query($connection,$query);

/*if($connection) {

echo "Connected!"; //for testing don't uncomment in realtime

}*/


?>
