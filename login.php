<?php
require('koneksi.php');

session_start();

// Proses login saat pengguna mengirimkan formulir login
if(isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass  = $_POST['txt_pass'];

    if(!empty(trim($email)) && !empty(trim($pass))) {
        $query  = "SELECT * FROM user_detail WHERE user_email = '$email'";
        $result = mysqli_query($koneksi, $query);
        $num    = mysqli_num_rows($result);

        if ($num > 0) {
            $row   = mysqli_fetch_array($result);
            $id    = $row['id'];
            $userVal = $row['user_email'];
            $passVal = $row['user_password'];
            $userName = $row['user_fullname'];
            $level = $row['level'];

            if($userVal == $email && $passVal == $pass){
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $userName;
                $_SESSION['level'] = $level; 
                header('Location: home.php');
                exit;

            } else {
                $error = 'User atau password salah!!';
                header('Location: login.php');
                exit;
            }
        } else {
            $error = 'User tidak ditemukan!';
            header('Location: login.php');
            exit;
        }
    } else {
        $error = 'Data tidak boleh kosong !!!';
        echo $error;
    }
}
?>

<?php
$pageTitle = "Register";
require_once('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Optional CSS styles */
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-login {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            margin-top: 50px; /* Menambahkan margin-top di sini */
        }

        .form-login .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-login .form-control:focus {
            z-index: 2;
        }

        .form-login button {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body class="text-center">
    <form class="form-login" action="login.php" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        <input type="email" name="txt_email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" name="txt_pass" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
    </form>

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
