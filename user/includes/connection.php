<?php
   $con = new pdo("mysql:host=Localhost;dbname=ecanteen","root","");
   if(!$con)
    {
        echo 'Not Connected ';
    }
  
?>