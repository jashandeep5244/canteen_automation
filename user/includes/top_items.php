<div id='top_books'>
    <br><br><br><br>
	<h2>Best Selling Dishes</h2>
	<ul>
       <?php
       $count=0;
       include 'includes/conn.php';
   
    function select5LatestProducts($con){
    $row = array();
    $query = "SELECT item_id,item_profile, item_cost, item_name FROM canteen_items ORDER BY item_name DESC";
    $result = mysqli_query($con, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($con);
        exit;
    }
    for($i = 0; $i < 5; $i++){
      array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
  }
 $row=select5LatestProducts($con);
       ?>
       <?php foreach($row as $book) {
       $path='../image/items/'.$book['item_profile'].'.jpg';
         
echo '
       <li>
       	<a href="all_items.php">
       	
		    <img src="'.$path.'">
		   <center>
		   <h3>'.$book['item_name'].'</h3>
		   <h4><button><a href="all_items.php">Price : Rs. '.$book['item_cost'].'</a></button></h4>
       <h4><button><a href="all_items.php">Buy Now</a></button></h4>
		   </center>
		</a>
	    </li>
';?>

<?php } ?>
  
	</ul><br clear="all">

	<h2><a href="all_items.php" style="text-decoration:none; color: #3f3f3f;">Items In The menu</a></h2>
	<ul>
       <?php
       $count=0;
       include 'includes/conn.php';
   
    function select5LatestProduct($con){
    $row = array();
    $query = "SELECT item_id,item_profile, item_cost, item_name FROM canteen_items ORDER BY item_cost DESC";
    $result = mysqli_query($con, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($con);
        exit;
    }
    for($i = 0; $i < 5; $i++){
      array_push($row, mysqli_fetch_assoc($result));
    }
    return $row;
  }
 $row=select5LatestProduct($con);
       ?>
       <?php foreach($row as $book) {
       $path='../image/items/'.$book['item_profile'].'.jpg';
        
echo '
       <li>
       	<a href="all_items.php">
		    <img src="'.$path.'">
		   <center>
		   <h3>'.$book['item_name'].'</h3>
		   <h4><button><a href="all_items.php">Price : Rs. '.$book['item_cost'].'</a></button></h4>
       <h4><button><a href="all_items.php">Buy Now</a></button></h4>
		   </center>
		</a>
	    </li>
';?>

<?php } ?>
  
	</ul><br clear="all">





</div>
