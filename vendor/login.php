<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Login- E-Canteen</title>
<?php include 'includes/style.php'; ?>
<?php include 'includes/links.php'; ?>
</head>
<body>
   <?php
   include 'includes/conn.php';
   if(isset($_POST['submit'])){
       $handler_email=$_POST['handler_email'];
       $handler_password=$_POST['handler_password'];

       $handler_email_search = "Select * from canteen where handler_email = '$handler_email'";
       $query=mysqli_query($con,$handler_email_search);
       $email_count=mysqli_num_rows($query);
       if($email_count){
           $email_pass= mysqli_fetch_assoc($query);
           $pass=$email_pass['handler_password'];
           $_SESSION['handler_username']=$email_pass['handler_username'];
           $pass_decode = password_verify($handler_password, $pass);
           if($pass_decode)
           {
               ?>
               <script>
               location.replace("vendor_dashboard.php");
               </script>
               <?php    
           }
           else{
            ?>
            <script>
             alert("Password incorrect");
            </script>
            <?php
            }

       }
       else{
           ?>
           <script>
           alert("Invalid email");
           </script>
           <?php
       }
   }
   ?>

<div class="card bg-light">
<article class="card-title mx-auto" style="max-width: 400px;">
<h4 class="card-title mt-3 text-center">Login through</h4>
<p class="text-center">Get started with your Free Account</p>
<p>
<a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i> Login via Gmail</a>
<a href="" class="btn btn-block btn-facebook"><i class="fa fa-facebook-f"></i> Login via Facebook </a>
</p>
<p class="divider-text">
<span class="bg-light">OR</span>
</p>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" >
<div class="form-group input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fa fa-user"></i> </span>
</div>
<input name="handler_email" class="form-control" placeholder="Enter Email" type="email" >
</div>
<div class="form-group input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fa fa-lock"></i></span>
</div>
<input name="handler_password" class="form-control" placeholder="Create Password" type="password" required>
</div>
<div class="form-group">
<button type="submit" name="submit" class="btn btn-primary btn-block"> Log In </button>
</div>

<br><br><br><br><br><br>

        </form>
    </article>
</div>
    
</body>
</html>