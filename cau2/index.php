<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bui Huu Nghia- Software Internship Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list_users.php">Danh sách users</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <h1 class="text-danger">Form</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Họ và tên</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nội dung</label>
                <textarea name="content" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button class="btn btn-success mt-4">Xác nhận</button>
            <input type="reset" class="btn btn-danger mt-4" id="btn" value="Reset">
        </form>
    </div>
</body>
<?php
function pg_connection_string_from_database_url()
{
    extract(parse_url($_ENV["DATABASE_URL"]));
    return "user=$user password=$pass host=$host dbname=" . substr($path, 1);
}
$db = pg_connect(pg_connection_string_from_database_url());

if (!$db) {
    echo "Lỗi : Không thể mở database\n";
}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['content'])) {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['content'])) {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $content = $_POST['content'];
        $sql = "INSERT INTO users (fullname, email, phone, content) VALUES ('$name', '$email', '$phone', '$content')";
        $ret = pg_query($db, $sql);
        if (!$ret) {
            echo pg_last_error($db);
        } else {
            echo "<script>alert('Thêm thành công')</script>";
            header("Location: list_users.php");
        }
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
