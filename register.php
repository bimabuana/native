<?php
require ('koneksi.php');

if( isset($_POST['register'])) {
    $userMail = $_POST['txt_email'];
    $userPass = $_POST['txt_pass'];
    $userName = $_POST['txt_nama'];

    $query = "INSERT INTO user_detail VALUES ('', '$userMail', '$userPass', '$userName',2)";
    $result     = mysqli_query($koneksi, $query);
    header('Location:login.php');
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
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Optional CSS styles */
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-register {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            margin-top: 50px; /* Menambahkan margin-top di sini */
        }

        .form-register .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-register .form-control:focus {
            z-index: 2;
        }

        .form-register button {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body class="text-center">
    <form class="form-register" action="register.php" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Register</h1>
        <input type="email" name="txt_email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" name="txt_pass" class="form-control" placeholder="Password" required>
        <input type="text" name="txt_nama" class="form-control" placeholder="Nama" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
    </form>

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
