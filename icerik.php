<?php
      $db = mysqli_connect('localhost', 'root', '', 'doc');
      $doc_name=mysqli_query($db,"SELECT docName FROM docs" ); 
      if($_SESSION['veri'] == $doc_name){
        $icerik=mysqli_query($db,"SELECT icerik FROM docs" );
        echo $icerik;
      }
      
      
?>