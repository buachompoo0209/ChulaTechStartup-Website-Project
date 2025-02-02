<?php
error_reporting(E_ALL); // เอาไว้ดู log
ini_set('display_errors', 1); // เอาไว้ดู log
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'G6_DB';
$port = '3306';
$socket = 'NULL';
$connect = mysqli_connect($hostname, $username, $password);

if (!$connect){
    die("connect failed : " . mysqli_connect_error($connect));
}
else{
    mysqli_set_charset($connect, 'utf8');
}

//บรรทัด19-29เมื่อเอาไปอัพบนserver ไม่ต้องรัน
$databaseExistsQuery = "SHOW DATABASES LIKE 'G6_DB'";
$databaseExistsResult = $connect->query($databaseExistsQuery);
if ($databaseExistsResult->num_rows == 0) {
    $sql = "CREATE DATABASE G6_DB";
    if ($connect->query($sql) === TRUE) {
 //     echo "Database created successfully";
    } else {
      echo "Error creating database: " . $connect->error;
    }
}

$connect = mysqli_connect($hostname, $username, $password, $database);
if (!$connect){
    die("connect failed : " . mysqli_connect_error($connect));
}
else{
    $tablesQuery = "SELECT table_name FROM information_schema.tables WHERE table_schema = '$database'";
    $result = mysqli_query($connect, $tablesQuery);
    if ($result === false || mysqli_num_rows($result) == 0) {        
        mysqli_set_charset($connect, 'utf8');
        require_once 'init_db.php';        
    }
}
?>