<?php
session_start();
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
    $admin_name = mysqli_real_escape_string($con,$_POST['admin_name']);
     $admin_username = mysqli_real_escape_string($con,$_POST['admin_username']);
     $admin_email =mysqli_real_escape_string($con,$_POST['admin_email']);
     $admin_mobile = mysqli_real_escape_string($con,$_POST['admin_mobile']);
     $admin_password =mysqli_real_escape_string($con,$_POST['admin_password']);
     $admin_cpassword = mysqli_real_escape_string($con,$_POST['admin_cpassword']);
     
     $admin_pass=password_hash($admin_password,PASSWORD_BCRYPT);
     $admin_cpass=password_hash($admin_cpassword,PASSWORD_BCRYPT);
    $emailquery="select * from admin where admin_email='$admin_email'";
    $query=mysqli_query($con,$emailquery);
    $emailcount=mysqli_num_rows($query);
    if($emailcount>0)
    {
        echo "Email already exists";
    }
    else{
        if($admin_password === $admin_cpassword)
        {
            $insertquery="insert into admin (admin_name,admin_username,admin_email,admin_mobile,admin_password,admin_cpassword) values('$admin_name','$admin_username','$admin_email','$admin_mobile','$admin_pass','$admin_cpass')";
            $iquery=mysqli_query($con,$insertquery);
            if($iquery)
            {
               
                    echo ("Inserted Successfully");
                    ?>
                    <script>
                    location.replace("login.php");
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
        <h4 class="card-title mt-3 text-center">Create Account</h4>
        <p class="text-center">Get Started with your Free Account</p>
        <p>
            <a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i>    Login via Gmail</a>
            <a href="" class="btn btn-block btn-facebook"><i class="fa fa-facebook"></i>     Login via Facebook</a>
        </p>
        <p class="divider-text">
            <span class="bg-light">OR</span>
        </p>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input name="admin_name" class="form-control" placeholder="Full Name" type="text" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input name="admin_username" class="form-control" placeholder="User Name" type="text" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input name="admin_email" class="form-control" placeholder="Email Address" type="email" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <input name="admin_mobile" class="form-control" placeholder="Phone number" type="number" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input name="admin_password" class="form-control" placeholder="Create Password" type="password" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input name="admin_cpassword" class="form-control" placeholder="Repeat Password" type="password" required>
            </div>
            
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block"> Create Account </button>
            </div>
            <p class="text-center"> Have an account? <a href="login.php">Log In</a></p>
            <br>
        </form>
    </article>
    </div>
    </div>
    </div>
    </div>
    
</body>
</html>
