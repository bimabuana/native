<?php
require ("koneksi.php");

session_start();

if(!isset( $_SESSION['id'])){
    $_SESSION['msg'] = 'Anda harus login untuk mengakses halaman ini';
    header("Location:login.php");
}
$sesID  = $_SESSION['id'];
$sesName=  $_SESSION['name'];
$sesLvl =  $_SESSION['level'];
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
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Optional CSS styles */
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 960px;
            padding: 15px;
            margin: 0 auto;
        }

        .btn-logout {
            margin-top: 20px;
        }

        /* Menambahkan margin-top untuk tabel */
        .table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Selamat datang <?php echo $sesName;?></h1>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM user_detail";
                $result = mysqli_query($koneksi, $query);
                $no = 1;

                if ($sesLvl == 1){
                    $dis = "";
                }else{
                    $dis = "disabled";
                }

                while ($row = mysqli_fetch_array($result)) {
                    $userMail = $row["user_email"];
                    $userName = $row["user_fullname"];
                    ?>
                    <tr>
                        <td><?php echo $no?></td>
                        <td><?php echo $userMail?></td>
                        <td><?php echo $userName?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm <?php echo $dis; ?>">Edit</a>
                            <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm <?php echo $dis; ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                }?>
            </tbody>
        </table>
        <a href="login.php" class="btn btn-secondary btn-logout">Logout</a>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>