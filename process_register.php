<?php
require('connect.php'); //เชื่อมต่อข้อมูล
require('init_db.php'); //requied create table
//รับค่าที่ส่งมาจากฟอร์มลงในตัวแปร
if(isset($_POST['firstname']) && (isset($_POST['lastname'])) && (isset($_POST['email'])) && (isset($_POST['phone'])) && 
    (isset($_POST['username'])) && (isset($_POST['password']))){
        $firstname_acc = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['firstname']));
        $lastname_acc = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['lastname']));
        $email_acc = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['email']));
        $phone_acc = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['phone']));
        $username_acc = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['username']));
        $password_acc = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['password']));
        
        if(empty($firstname_acc)){
            die(header('Location: register.php')); //ไม่กรอกชื่อ
        }
        elseif(empty($lastname_acc)){
            die(header('Location: register.php')); //ไม่กรอกนามสกุล
        }
        elseif(empty($email_acc)){
            die(header('Location: register.php')); //ไม่กรอกเมล
        }
        elseif(empty($phone_acc)){
            die(header('Location: register.php')); //ไม่กรอกเบอร์
        }
        elseif(empty($username_acc)){
            die(header('Location: register.php')); //ไม่กรอกusername
        }
        elseif(empty($password_acc)){
            die(header('Location: register.php')); //ไม่กรอกพาสเวิร์ด
        }
        else{
            $query_check_email = "SELECT email FROM users WHERE email = '$email_acc'";
            $call_back_query_check_email = mysqli_query($connect, $query_check_email);
            if(mysqli_num_rows($call_back_query_check_email) > 0){
                die(header('Location: register.php')); //เมลซ้ำ
            }else{
                $query_create_acc = "INSERT INTO users (firstname, lastname, email, phone, username, password) 
                     VALUES ('$firstname_acc', '$lastname_acc', '$email_acc', '$phone_acc', '$username_acc', '$password_acc')";
                $call_back_create_acc = mysqli_query($connect, $query_create_acc);
                if($call_back_create_acc){
                    die(header('Location: login.php')); //สร้างเสร็จ เด้งไป login
                }
                else{
                    die(header('Location: register.php')); //ล้มเหลว
                }
            }
        }

    }else{
        die(header('Location: register.php')); //ไม่มีข้อมูล
    }

?>
