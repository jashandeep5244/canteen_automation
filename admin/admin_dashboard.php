<?php
    session_start();

    if (!isset($_SESSION['admin_username'])) {
        header('location:login.php');
        exit();
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
<title>Canteen Automation</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php  include("includes/header.php"); ?>
   <div id="header1">
    <div id="logo1">
        <h4><a href="admin_dashboard.php">Hello!
         <?php
                                 include('includes/conn.php');
                                 $query=mysqli_query($con,"SELECT * FROM admin WHERE admin_username='".$_SESSION['admin_username']."'");
                                 $row=mysqli_fetch_array($query);
                                 echo  $row['admin_username'];
                                ?>
        </a></h4>
    </div>
    <div id="title1">
        <h4> Welcome to Admin Panel</h4>
    </div>
    <div id="link1">
        <h4><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; &nbsp;Profile</a></h3>
    </div>

</div>
<?php
    include("includes/bodyleft.php"); 
    include("includes/bodyright.php");
?>
 
</body>
</html>