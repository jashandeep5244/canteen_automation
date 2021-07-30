<?php
  

    if (!isset($_SESSION['user_username'])) {
        header('location:user_dashboard.php');
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>E-Learning | Cart</title>

	<link rel="stylesheet"  href="css/style.css" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body>
   


<div id='header'>
    <div id='up_head'>
        <div id='link'>
            <?php include ('includes/connection.php');
    	$get_link=$con->prepare("select * from admin");
    	$get_link->setFetchMode(PDO :: FETCH_ASSOC);
    	$get_link->execute();
    	$row=$get_link->fetch();

    	echo"



 <ul>
                
            </ul>
  	";
 ?>
        </div>
        <div id='date'>
            <p><?php echo date('l, d F Y '); ?></p>
        </div>
        <div id='slog'>
            <p><?php 
                                 
                                  
                                 
                                   include('includes/conn.php');
                                 $query=mysqli_query($con,"SELECT * FROM `users` WHERE user_username='".$_SESSION['user_username']."'");
                                 $row=mysqli_fetch_array($query);
                                 echo "Hello  ".$row['user_username'].""; 
                               
                          
                            ?></p>
        </div>
    </div>
    <div id='title'>
        <h2><a href='user_dashboard.php'>E-Canteen</a></h2>
    </div>
    <div id="menu">
         <h2><i class="fas fa-bars"></i></h2>
        <ul> 
            </ul>
    </div>
    <div id='head_search'>
         <form method="post" enctype="multipart/form-data" action="Result.php">
         
            <input type="search" name="query" placeholder="Search Dishes From here">
            <button name="search"><i class="fas fa-search"></i></button>
         </form>
    </div>
    <div id='head_cart'>
        <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
    </div>
    
    <div id='head_profile'>
      <h4>
        
      
      <a href="logout.php" style="color:white;text-decoration: none;"><i class="fas fa-user"></i> Logout</a>
    
</h4>
    </div>
</div>
</body>
</html>