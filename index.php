<?php 
    session_start();
    require 'config/db_connection.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && empty(!$password)) {

            $encptpass = md5($password);

            $select = "select * from register where email='$email' and password='$encptpass'";
            $select_result = mysqli_query($connect, $select);


            if(mysqli_num_rows($select_result) > 0) {
                $array = mysqli_fetch_assoc($select_result);
                $_SESSION['array'] = $array;
                if($_SESSION['array']['role'] == 'user') {

                    $_SESSION['msgs'] = 'Successfully Logined';
                    header('location:user_dashboard.php');

                }else if($_SESSION['array']['role'] == 'admin'){

                    $_SESSION['msgs'] = 'Successfully Logined';
                    header('location:admin_dashboard.php');
                    
                }else {

                    $_SESSION['msgs'] = 'Successfully Logined';
                    header('location:index.php');
                }


            }else {

                die('error: '.mysqli_error($connect));
            }

        }else {
            if(empty($email)) {
                $eError = 'Requried Email';
            }else {
                $eError = '';
            }
            if(empty($password)) {
                $pError = "Requried Password";
            }else {
                $pError = '';
            }
        }
        


    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike - Just Do It</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="image/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!--Login Form-->

    <?php if(isset($_SESSION['Msg'])) { ?>
    <div class="alert alert-success text-center alert-dismissible fade show mt-2" role="alert">
        <strong>
        <?php 
            echo $_SESSION['Msg'];
            unset($_SESSION['Msg']);
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
            <h1>Welcome Back!</h1>
            <form action="index.php" method="post">
                <p>User Email</p>
                <div class="user">
                    <i class="fa-solid fa-user"></i>
                    <input type="email" name="email" placeholder="User Email" class="username">
                </div>
                <p class="text-danger"><?php echo $eError; ?></p>

                <p class="passworg_tag">Password</p>
                <div class="password">
                    <i class="fa-solid fa-lock"></i>
                    <input type="text" name="password" placeholder="Password">
                </div>
                <p class="text-danger"><?php echo $pError; ?></p>


                <p class="forget">Forget Password ?<a href="register.php"> Register Here</a></p>

                <button type="submit">Login</button>
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