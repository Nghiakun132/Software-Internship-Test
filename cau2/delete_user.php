<?php
function pg_connection_string_from_database_url()
{
    extract(parse_url($_ENV["DATABASE_URL"]));
    return "user=$user password=$pass host=$host dbname=" . substr($path, 1);
}
$db = pg_connect(pg_connection_string_from_database_url());

if (!$db) {
    echo "Error : Unable to open database\n";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = $id";
    $ret = pg_query($db, $sql);
    if (!$ret) {
        echo pg_last_error($db);
    } else {
        echo "<script>alert('Xóa thành công')</script>";
        header("Location: list_users.php");
    }
}
