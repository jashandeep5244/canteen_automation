<?php
  session_start();  

    if (!isset($_SESSION['user_username'])) {
        header('location:login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>E-Canteen | Home</title>

	<link rel="stylesheet"  href="css/style.css" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body>


 
   <?php
   include 'includes/header1.php';
   include 'includes/slider.php';
   include 'includes/top_items.php';
   include 'includes/footer.php';
   
   ?>

</body>
</html>