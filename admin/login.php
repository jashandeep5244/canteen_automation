<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Login- Admin</title>
<?php include 'includes/style.php'; ?>
<?php include 'includes/links.php'; ?>
</head>
<body>
   <?php
   include 'includes/conn.php';
   if(isset($_POST['submit'])){
       $admin_email=$_POST['admin_email'];
       $admin_password=$_POST['admin_password'];

       $admin_email_search = "Select * from admin where admin_email = '$admin_email'";
       $query=mysqli_query($con,$admin_email_search);
       $email_count=mysqli_num_rows($query);
       if($email_count){
           $email_pass= mysqli_fetch_assoc($query);
           $pass=$email_pass['admin_password'];
           $_SESSION['admin_username']=$email_pass['admin_username'];
           $pass_decode = password_verify($admin_password, $pass);
           if($pass_decode)
           {
               ?>
               <script>
               location.replace("admin_dashboard.php");
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
<input name="admin_email" class="form-control" placeholder="Enter Email" type="email" >
</div>
<div class="form-group input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fa fa-lock"></i></span>
</div>
<input name="admin_password" class="form-control" placeholder="Create Password" type="password" required>
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

