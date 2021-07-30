<?php

function handler_edit(){
    include("includes/connection.php");
    if(isset($_GET['handler_edit']))
    {
        $id=$_GET['handler_edit'];
        $get_cat=$con->prepare("select * from canteen where canteen_id='$id'");
        $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $get_cat->execute();
        $row=$get_cat->fetch();
        
            echo"<h3>Edit Canteen</h3><form id='edit_form' method='post' enctype='multipart/form-data'>
            <input type='text' name='handler_name' value='".$row['handler_name']."' placeholder='Enter Canteen Name Here'>
            <input type='text' name='handler_username' value='".$row['handler_username']."' placeholder='Enter Canteen Username Here'>
            <input type='text' name='handler_email' value='".$row['handler_email']."' placeholder='Enter Canteen Email Here'>
            <input type='text' name='handler_mobile' value='".$row['handler_mobile']."' placeholder='Enter Canteen Mobile Number Here'>
            <center><button name='handler_edit'>Edit Canteen</button></center></form>";

       
        if(isset($_POST['handler_edit']))
        {
            $handler_name=$_POST['handler_name'];
            $handler_username=$_POST['handler_username'];
            $handler_email=$_POST['handler_email'];
            $handler_mobile=$_POST['handler_mobile'];
           
            $check=$con->prepare("select * from canteen ");
            $check->setFetchMode(PDO:: FETCH_ASSOC);
            $check->execute();
            $count=$check->rowCount();
            
      if($count==0){
          echo"<script>alert('Canteen Already Added')</script>";
          echo"<script>window.open('admin_dashboard.php?edit_handler','_self')</script>";
      }else{
            $up=$con->prepare("update canteen set handler_name='$handler_name',handler_username='$handler_username',handler_email='$handler_email', handler_mobile='$handler_mobile' where canteen_id=$id");
        if($up->execute())
        {
        echo"<script>alert('Canteen Updated Successfully')</script>";
        echo"<script>window.open('admin_dashboard.php?edit_handler','_self'</script>";
        }
    else{
        echo"<script>alert('Canteen Not Updated Successfully')</script>";
        echo"<script>window.open('admin_dashboard.php?edit_handler','_self'</script>";
        }
            
        }
        
   }}}


function view_handler(){
    include 'includes/connection.php';
    $get_cat=$con->prepare("select * from canteen");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    $i=1;
    while($row=$get_cat->fetch()):
       echo"<tr>
               <td>".$i++."</td>
               <td>".$row['handler_name']."</td>
               <td><a href='admin_dashboard.php?edit_handler&handler_edit=".$row['canteen_id']."' title='Edit'><i class='far fa-edit'></i></a>
                &nbsp;<a style='color:#f00;' href='admin_dashboard.php?edit_handler&del_handler=".$row['canteen_id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td>
            <tr>";
    endwhile;

    if(isset($_GET['del_handler'])){
        $id=$_GET['del_handler'];
        $del=$con->prepare("delete from canteen where canteen_id='$id'");
        if($del->execute()){
            echo"<script>alert('Canteen Deleted Successfully')</script>";
            echo"<script>window.open('admin_dashboard.php?edit_handler','_self')</script>";
        }
        else{
            echo"<script>alert('Canteen Not Deleted Successfully')</script>";
            echo"<script>window.open('admin_dashboard.php?edit_handler','_self')</script>";
        }
    }}

    function edit(){
        include("includes/connection.php");
        if(isset($_GET['edit']))
        {
            $id=$_GET['edit'];
            $get_cat=$con->prepare("select * from users where user_id='$id'");
            $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $get_cat->execute();
            $row=$get_cat->fetch();
          
                echo"<h3>Edit User</h3><form id='edit_form' method='post' enctype='multipart/form-data'>
                <input type='text' name='user_name' value='".$row['user_name']."' placeholder='Enter User Name Here'>
                <input type='text' name='user_username' value='".$row['user_username']."' placeholder='Enter User Username Here'>
                <input type='email' name='user_email' value='".$row['user_email']."' placeholder='Enter User Email Here'>
                <input type='text' name='user_mobile' value='".$row['user_mobile']."' placeholder='Enter User Mobile Number Here'>
                <center><button name='edit'>Edit User</button></center></form>";
    
            if(isset($_POST['edit']))
            {
                $user_name=$_POST['user_name'];
                $user_username=$_POST['user_username'];
                $user_email=$_POST['user_email'];
                $user_mobile=$_POST['user_mobile'];
               
                
                //Post
                $check=$con->prepare("select * from users");
                $check->setFetchMode(PDO:: FETCH_ASSOC);
                $check->execute();
                $count=$check->rowCount();
                
          if($count==0){
              echo"<script>alert('User Already Added')</script>";
              echo"<script>window.open('admin_dashboard.php?edit_user','_self')</script>";
          }else{
                $up=$con->prepare("update users set user_name='$user_name',user_username='$user_username',user_email='$user_email', user_mobile='$user_mobile' where user_id='$id'");
            if($up->execute())
            {
            echo"<script>alert('User Updated Successfully')</script>";
            echo"<script>window.open('admin_dashboard.php?edit_user','_self'</script>";
            }
        else{
            echo"<script>alert('User Not Updated Successfully')</script>";
            echo"<script>window.open('admin_dashboard.php?edit_user','_self'</script>";
            }
                
            }
            
       }}}

function view_user(){
        include 'includes/connection.php';
        $get_cat=$con->prepare("select * from users");
        $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $get_cat->execute();
        $i=1;
        while($row=$get_cat->fetch()):
           echo"<tr>
                   <td>".$i++."</td>
                   <td>".$row['user_name']."</td>
                   <td><a href='admin_dashboard.php?edit_user&edit=".$row['user_id']."' title='Edit'><i class='far fa-edit'></i></a>
                    &nbsp;<a style='color:#f00;' href='admin_dashboard.php?edit_user&del_user=".$row['user_id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td>
                <tr>";
        endwhile;
        if(isset($_GET['del_user'])){
            $id=$_GET['del_user'];
            $del=$con->prepare("delete from users where user_id='$id'");
            if($del->execute()){
                echo"<script>alert('User Deleted Successfully')</script>";
                echo"<script>window.open('admin_dashboard.php?edit_user','_self')</script>";
            }
            else{
                echo"<script>alert('User Not Deleted Successfully')</script>";
                echo"<script>window.open('admin_dashboard.php?edit_user','_self')</script>";
            }
        }}
?>