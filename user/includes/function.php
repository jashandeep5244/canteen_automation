<?php

function head_link(){
    	include 'includes/connection.php';
    	$get_link=$con->prepare("select * from admin");
    	$get_link->setFetchMode(PDO :: FETCH_ASSOC);
    	$get_link->execute();
    	$row=$get_link->fetch();

    	echo"



 <ul>
                
                <li><a href='https://www.google.com/".$row['admin_email']."' target='_blank'><i class='fab fa-google-plus'></i></a></li>
                <li><a href=".$row['admin_mobile']." target='_blank'><i class='fab fa-phone'></i></a></li>
               
            </ul>
  	";

    }

    ?>