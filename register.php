<?php

include 'config.php';

error_reporting(0); 

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $username = $_POST['email'];
    $username = md5($_POST['password']);
    $username = md5($_POST    ['cpassword']);
    
    if($password == $cpassword) {
       $sql = "SELECT * FROM users WHERE email='$email'";
       $result = mysqli_query($conn, $sql);
       if(!$result->num_rows > 0){
          
           echo "<script>alert('Woops! Email already exists')</script>";
   
       }else{
       }
       $sql = "INSERT INTO users (username, email, password)
               VALUES ('$username', '$email', '$password')";
       $result = mysqli_query($conn, $sql);
       
       if ($result){
           echo "<script>alert('Wow! User registration completed')</script>";
           $username = "";
           $email = "";
           $_POST['password'] = "";
           $_POST['cpassword'] = "";
      
       }else {
           echo "<script>alert('Woops! Something went wrong.')</script>";
    } else {
        echo "<script>alert('Password Not Matched.')</scipt>";
    }
}

?>



<DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewreport" content="width=device-width,initial-scale=1.0">
   
     <link rel="stylesheet" type"text/css" href="style.css">
     <title>Register Form</title>
</head>
<body>
     <div class="container">
         <form action="" method="POST" class="login-email">
             <p class="login-text" style="font-size: Zrem; font-weight: 800;">Register</p>
             <div class="input-group">
                 <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
             </div>
             <div class="input-group">
                 <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
             </div>
             <div class="input-group">
                 <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>"  required>
             </div>
             <div class="input-group">
                 <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
             </div>
             <div class="input-group">
                 <button name="submit" class"btn">Register</button>
             </div>
             p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
          </form>
     </div>
</body>
</html>
