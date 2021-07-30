<div id='bodyright'>
 <?php 
 if(isset($_GET['edit_item'])) {
    echo edit_item();
  }
else{

 ?>
 <?php 
 require_once "includes/function.php";
include 'includes/conn.php';
 if(isset($_POST['add_item'])){
    $item_profile = mysqli_real_escape_string($con,$_POST['item_profile']);
     $item_name = mysqli_real_escape_string($con,$_POST['item_name']);
     $item_des =mysqli_real_escape_string($con,$_POST['item_des']);
     $item_cost = mysqli_real_escape_string($con,$_POST['item_cost']);
     $item_time =mysqli_real_escape_string($con,$_POST['item_time']);
     $item_avail = mysqli_real_escape_string($con,$_POST['item_avail']);
     
  
    $itemquery="select * from canteen_items where item_profile='$item_profile'";
    $query=mysqli_query($con,$itemquery);
    $itemcount=mysqli_num_rows($query);
    if($itemcount>0)
    {
        echo "Item already exists";
    }
    else{

            $insertquery="insert into canteen_items(item_profile,item_name,item_des,item_cost,item_time,item_avail) values('$item_profile', '$item_name', '$item_des', '$item_cost' , '$item_time','$item_avail')";
            $iquery=mysqli_query($con,$insertquery);
            if($iquery)
            {
               
                    echo ("Inserted Successfully");
                           
            }
            else{
              
                     echo("Not Inserted Successfully");
                
            }
        }
    }
?>
   
<h3>View All Items</h3>
   <div id='add'>
      <details>
          <summary>Add Item</summary>
          <form method="post" enctype="multipart/form-data">
            
             <input type="text" name="item_profile" placeholder="Enter Profile Image">
            <input type="text" name="item_name" placeholder="Enter Name Here">
            <input type="longtext" name="item_des" placeholder="Enter Description Of Item">
            <input type="text" name="item_cost" placeholder="Enter Item Cost">
            <input type="text" name="item_time" placeholder="Enter Preparation Time Here">
            <input type="text" name="item_avail" placeholder="Enter Item Availability Here">
           
            
            
           
            <center><button name="add_item">Add Item</button></center>
          </form>
      </details>
   </div>

<div id='cat_bodyright' style="margin-left:10%;">
  <br>
<div id='top_books'>
  <ul >
 <?php
  $count = 0;
  include 'includes/conn.php';

  $query = "SELECT item_id, item_profile,item_name  FROM canteen_items";
  $result = mysqli_query($con, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($con);
    exit;
  }
?>
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
     <li style="height:300px;">
      
        <img src="../image/items/<?php echo $query_row['item_profile'];?>.jpg">
       <center>
       <h3 style="height:40px;"><?php echo $query_row['item_name']; ?></h3>  
       <?php 
       echo "<a href='vendor_dashboard.php?add_items&edit_item=".$query_row['item_id']."' title='Edit'><i class='far fa-edit'></i></a>
       <a style='color:#f00;' href='vendor_dashboard.php?add_items&del_item=".$query_row['item_id']."' title='Delete'><i class='far fa-trash-alt'></i></a>"; ?>
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
      if(isset($_GET['del_item'])){
      $id=$_GET['del_item'];
      $del=$con->prepare("delete from canteen_items where item_id='$id'");
      if($del->execute()){
          echo"<script>alert('Item Deleted Successfully')</script>";
          echo"<script>window.open('vendor_dashboard.php?add_items','_self')</script>";
      }
      else{
          echo"<script>alert('Product Not Deleted Successfully')</script>";
          echo"<script>window.open('vendor_dashboard.php?add_items','_self')</script>";
      }
          } 

  if(isset($con)) { mysqli_close($con); }
 
?>
</ul> 
      </div>
</div><br clear="all">
<?php } ?>
</div>