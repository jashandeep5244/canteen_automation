<div id='bodyright'>
<h3>View All Items</h3>
   <div id='add'>
   <div id='top_books'>
  <ul >
 <?php
  $count = 0;
  
  include 'includes/conn.php';

  $query = "SELECT item_name,item_cost,item_profile  FROM canteen_items";
  $result = mysqli_query($con, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($con);
    exit;
  }
?>
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
     <li style="height:300px;">
      
        <img src="image/<?php echo $query_row['item_profile'];?>.jpg">
       <center>
       <h3 ><?php echo $query_row['item_name']; ?></h3>  
       <h3 style="height:30px;">Rs.<?php echo $query_row['item_cost'] ;?> </h3>
       </center>
  
      </li>
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          } ?>
        

<?php
      }
      if(isset($_GET['del_product'])){
      $id=$_GET['del_product'];
      $del=$con->prepare("delete from products where PID='$id'");
      if($del->execute()){
          echo"<script>alert('Product Deleted Successfully')</script>";
          echo"<script>window.open('index.php?products','_self')</script>";
      }
      else{
          echo"<script>alert('Product Not Deleted Successfully')</script>";
          echo"<script>window.open('index.php?products','_self')</script>";
      }
          } 

  if(isset($con)) { mysqli_close($con); }
 
?>
</ul> 
      
</div><br clear="all">


    
   </div>
</div> 
