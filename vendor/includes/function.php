<?php

function edit_item(){
    include("includes/connection.php");
    if(isset($_GET['edit_item']))
    {
        $id=$_GET['edit_item'];
        $get_book=$con->prepare("select * from canteen_items where item_id='$id'");
        $get_book->setFetchMode(PDO:: FETCH_ASSOC);
        $get_book->execute();
        $query_row=$get_book->fetch();
      
            echo"<h3>Edit Item Details</h3><form id='edit_form' method='post' enctype='multipart/form-data'>
    
            <input type='text' name='item_name' value='".$query_row['item_name']."' placeholder='Enter Item Name Here'>
            <input type='longtext' name='item_des' placeholder='Enter Item Description Here' value='".$query_row['item_des']."'>
            <input type='text' name='item_cost' placeholder='Enter Cost of the Item' value='".$query_row['item_cost']."'>
            <input type='text' name='item_avail' placeholder='Enter Availability of the Item' value='".$query_row['item_avail']."'>
            <input type='text' name='item_time' placeholder='Enter preparation Time' value='".$query_row['item_time']."'>
            <input type='text' name='item_profile' placeholder='Food Image name' value='".$query_row['item_profile']."'>
            
            <center><button name='edit_item'>Edit Item Details</button></center></form>";
        if(isset($_POST['edit_item']))
        {
     
    
     $item_name =$_POST['item_name'];
     $item_des=$_POST['item_des'];
     $item_cost=$_POST['item_cost'];
     $item_avail=$_POST['item_avail'];
     $item_time=$_POST['item_time'];
     $item_profile=$_POST['item_profile'];
     
    $up=$con->prepare("update canteen_items set item_name='$item_name',item_des='$item_des',item_cost='$item_cost',item_avail='$item_avail', item_time='$item_time',item_profile='$item_profile' where item_id='$id'");
        if($up->execute())
        {
        echo"<script>alert('Item Updated Successfully')</script>";
        echo"<script>window.open('vendor_dashboard.php?add_items','_self'</script>";
        }
    else{
        echo"<script>alert('Item Not Updated Successfully')</script>";
        echo"<script>window.open('vendor_dashboard.php?add_items','_self'</script>";
        }
            
        }
        
   }}