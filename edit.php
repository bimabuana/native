<?php
require('koneksi.php');

if(isset($_POST['update'])) {
    $userId = $_POST['txt_id'];
    $userPass = $_POST['txt_pass'];
    $userName = $_POST['txt_nama'];

    $query = "UPDATE user_detail SET user_password='$userPass', user_fullname='$userName' WHERE id='$userId'";
    $result = mysqli_query($koneksi, $query);
    
    if($result) {
        header('Location: home.php');
        exit;
    } else {
        echo "Update failed. Please try again.";
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM user_detail WHERE id='$id'";
    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

    if($row = mysqli_fetch_array($result)) {
        $userMail = $row['user_email'];
        $userPass = $row['user_password'];
        $userName = $row['user_fullname'];
    } else {
        echo "User not found.";
    }
} else {
    echo "ID parameter is missing.";
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
    <title>Edit User</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Optional CSS styles */
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-edit {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            margin-top: 50px; /* Menambahkan margin-top di sini */
        }

        .form-edit .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-edit .form-control:focus {
            z-index: 2;
        }

        .form-edit button {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body class="text-center">
    <form class="form-edit" action="edit.php" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Edit User</h1>
        <input type="hidden" name="txt_id" value="<?php echo $id; ?>"/>
        <input type="email" name="txt_email" class="form-control" value="<?php echo $userMail; ?>" readonly>
        <input type="password" name="txt_pass" class="form-control" value="<?php echo $userPass; ?>">
        <input type="text" name="txt_nama" class="form-control" value="<?php echo $userName; ?>">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="update">Update</button>
    </form>

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
