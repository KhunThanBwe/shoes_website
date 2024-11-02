<?php
    session_start();
    require 'config/db_connection.php';

    if(!isset($_SESSION['array'])) {

        header('location:index.php');
    }else {

        if(($_SESSION['array']['role']) != 'admin') {

            header('location:user_dashboard.php');
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

    <?php if(isset($_SESSION['msgs'])) { ?>
    <div class="alert-box alert alert-success text-center alert-dismissible fade show mt-2" role="alert">
        <strong>
        <?php 
            echo $_SESSION['msgs'];
            unset($_SESSION['msgs']);
        ?>
        </strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>



    <section>
        <nav>
            <div class="logo">
                <h1>Shoe<span>s</span></h1>
            </div>

            <a class="btn btn-danger btn-sm" href="./logout.php">logout</a>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <form action="" method="post">
                        <input type="text" name="id"> <br>
                        <div class="form-group">
                            <label for="user">User</label>
                            <input type="text" name="user" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="form-control">Edit</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <table class="table table-bordered hover">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Admin</td>
                            <td>admin@gmail.com</td>
                            <td>12345678</td>
                            <td>
                                <a name="edit_btn" href="admin_dashboard.php?edit_id=">edit</a>
                                <a href="">deledte</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   
</body>
</html>