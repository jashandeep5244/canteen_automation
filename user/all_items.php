<?php
  session_start();  

    if (!isset($_SESSION['user_username'])) {
        header('location:login.php');
        exit();
    }
?>
<body>
<?php
include 'includes/header1.php';
?>
<div class="container">
    <h1>Items</h1>
    <a href="viewCart.php" class="cart-link" title="View Cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    <br><br>
    <div id="products" class="row list-group">
        <?php
        include "includes/conn.php";
        $query = $con-> query("SELECT * FROM canteen_items  ORDER BY item_id ");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
        <div class="item col-lg-4">
            <div class="thumbnail">  
                <div class="caption">
                    <h4 class="list-group-item-heading"><?php echo $row["item_name"]; ?></h4>
                    <br>
                    <?php echo "<img src='../image/items/".$row["item_profile"].".jpg' height='200px;' width='300px;'> ";?>
                    <br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead">Rs.<?php echo $row["item_cost"];  ?></p>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["item_id"]; ?>">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } }else{ ?>
        <p>Item(s) not found.....</p>
        <?php } ?><?php

include 'includes/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-Canteen</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 50px;}
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
    </style>
</head>
</head>
    </div>
</div>
</body>
</html>