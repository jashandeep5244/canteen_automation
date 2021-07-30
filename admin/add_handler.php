<?php

ob_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registeration | E-Canteen</title>
    <?php include 'includes/style.php' ?>
    <?php include 'includes/links.php' ?>
</head>
<body>

<?php 
include 'includes/conn.php';
 if(isset($_POST['submit'])){
    $handler_name = mysqli_real_escape_string($con,$_POST['handler_name']);
     $handler_username = mysqli_real_escape_string($con,$_POST['handler_username']);
     $handler_email =mysqli_real_escape_string($con,$_POST['handler_email']);
     $handler_mobile = mysqli_real_escape_string($con,$_POST['handler_mobile']);
     $handler_password =mysqli_real_escape_string($con,$_POST['handler_password']);
     $handler_cpassword = mysqli_real_escape_string($con,$_POST['handler_cpassword']);
     $admin_id = mysqli_real_escape_string($con,$_POST['admin_id']);
    
     $handler_pass=password_hash($handler_password,PASSWORD_BCRYPT);
     $handler_cpass=password_hash($handler_cpassword,PASSWORD_BCRYPT);
    $emailquery="select * from canteen where handler_email='$handler_email'";
    $query=mysqli_query($con,$emailquery);
    $emailcount=mysqli_num_rows($query);
    if($emailcount>0)
    {
        echo "Email already exists";
    }
    else{
        if($handler_password === $handler_cpassword)
        {
            $insertquery="insert into canteen (handler_name,handler_username,handler_email,handler_mobile,handler_password,handler_cpassword,admin_id) values('$handler_name','$handler_username','$handler_email','$handler_mobile','$handler_pass','$handler_cpass','$admin_id')";
            $iquery=mysqli_query($con,$insertquery);
            if($iquery)
            {
               
                    echo ("Inserted Successfully");
                        ?>
                        <script>
                        location.replace('admin_dashboard.php?edit_handler');
                        </script>
                        <?php
            }
            else{
              
                     echo("Not Inserted Successfully");
                
            }
        }
        
            else{
            echo ("Password are not matching");
        }
    }
 }
?>
    <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">

    <div class="form-group">
                <button  class="btn btn-primary btn-block" float:left;><a href="admin_dashboard.php?edit_handler" style="color:white; text-decoration:none;"> Back To Dashboard </a></button>
            </div>
        <h4 class="card-title mt-3 text-center">Add Canteen</h4>
        
       
        <p class="divider-text">
         
        </p>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input name="handler_name" class="form-control" placeholder="Full Name" type="text" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input name="handler_username" class="form-control" placeholder="User Name" type="text" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input name="handler_email" class="form-control" placeholder="Email Address" type="email" required>
            </div>
            <div class="form-group input-group"> 
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <input name="handler_mobile" class="form-control" placeholder="Phone number" type="number" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input name="handler_password" class="form-control" placeholder="Create Password" type="password" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input name="handler_cpassword" class="form-control" placeholder="Repeat Password" type="password" required>
            </div>   
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input name="admin_id" class="form-control" placeholder="Admin id" type="text" required>
            </div>  
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block"> Create Account </button>
            </div>
         
            <br>
        </form>
    </article>
    </div>
    </div>
    </div>
    </div>
    
</body>
</html>
