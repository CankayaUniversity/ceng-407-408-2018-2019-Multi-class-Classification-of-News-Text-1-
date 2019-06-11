<?php
function callClassify(){
    $output=shell_exec('/usr/bin/python test.ipynb');
           echo "<pre>";
           print_r($output);
            echo "</pre>";
}
   ?>
