<?php
    session_start();
    require 'config/db_connection.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $user = $_POST['user'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        
        if(!empty($user) && !empty($email) && !empty($password) && !empty($confirm_password) && strlen($password) >= 8 && $confirm_password==$password) {

            $encrptpassword = md5($password);

            $result = mysqli_query($connect, "INSERT INTO register (user, email, password) VALUES('$user', '$email', '$encrptpassword')");
             
            if($result) {
                $_SESSION['Msg'] = 'Registration successfully';
                header('location:index.php');
            }
            
        }else {
            if(empty($user)) {
                $userError = "The user Name field is require";
            }else {
                $userError = "";
            }
            if(empty($email)) {
                $emailError = "The user Email field is require";
            }else {
                $emailError = "";
            }
            if(empty($password)) {
                $pass = "The user pass field is require";
            }else {
                $pass = "";
            }
            if(empty($confirm_password)) {
                $cpError = "The user pass field is require";
            }else {
                $cpError = "";
            }
            if($password != $confirm_password) {
                $matchError = "Password or confirm_password does not match";
            }else {
                $matchError = "";
            }
            if (strlen($password) >= 8) {
                $countpass = "";
            } else {
                $countpass = "Password must be at least 8 characters long.";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="image/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!--Register Form-->

    <?php if(isset($_SESSION['msgs'])) { ?>
    <div class="alert alert-danger text-center alert-dismissible fade show mt-2" role="alert">
        <strong>
        <?php 
            echo $_SESSION['msgs'];
            unset($_SESSION['msgs']);
        ?>
        </strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>
    
    <div class="login_form">
        <div class="left">
            <img src="image/logshoes.png">
        </div>

        <div class="right">
            <h1>Register Form!</h1>

            <form action="register.php" method="post">
                <p>User Name</p>
                <div class="user">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="user" placeholder="User Name" class="username">
                </div>
                <p class="error"><?php echo $userError; ?></p>

                <p>User Email</p>
                <div class="user">
                    <i class="fa-solid fa-user"></i>
                    <input type="email" name="email" placeholder="User Email" class="username">
                </div>
                <p class="error"><?php echo $emailError; ?></p>

                <p class="passworg_tag">Password</p>
                <div class="password">
                    <i class="fa-solid fa-lock"></i>
                    <input type="text" name="password" placeholder="Password">
                </div>
                <p class="error"><?php echo $pass; ?></p>
                <p class="error"><?php echo $countpass; ?></p>


                <p class="passworg_tag">Confirm_password</p>
                <div class="password">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="confirm_password" placeholder="Confirm_password">
                </div>
                <p class="error"><?php echo $cpError; ?></p>
                <p class="error"><?php echo $matchError; ?></p>

                

                <p class="forget">Forget Password ?<a href="index.php"> login Here</a></p>

                <button type="submit">Register</button>
                <div class="loging_icon">
                    <a href="#"><img src="image/google.png"></a>
                    <a href="#"><img src="image/facebook.png"></a>
                    <a href="#"><img src="image/twitter.png"></a>
                </div>

            </form>

        </div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
</body>
</html>