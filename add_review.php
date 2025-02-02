<?php
session_start();
include 'connect.php';

// create unique ID
function create_unique_id() {
   return md5(uniqid());
}

// ตรวจสอบว่ามีการส่งข้อมูลแบบ POST มาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // รับข้อมูลจากฟอร์ม
   $description = $_POST['description'];
   $rating = $_POST['rating'];
   $user_id = $_SESSION['user_id']; // ควรใช้ตัวแปรที่เก็บ session user_id ที่เข้าสู่ระบบเพื่อให้เชื่อมโยงกับผู้ใช้ที่เข้าสู่ระบบอยู่


   // เช็คว่าผู้ใช้คนนี้เคยรีวิวแล้วหรือไม่
   $check_query = "SELECT * FROM reviews WHERE user_id = $user_id";
   $result = $connect->query($check_query);


   if ($result->num_rows > 0) {
       // ถ้ามีรีวิวของผู้ใช้นี้อยู่แล้ว
       $warning_msg[] = 'Your review already added!';
   } else {
       // ถ้ายังไม่มีรีวิวของผู้ใช้นี้
       // เตรียมคำสั่ง SQL เพื่อเพิ่มข้อมูลลงในฐานข้อมูล
       $query = "INSERT INTO reviews (user_id, description, rating) VALUES ('$user_id', '$description', '$rating')";
       if ($connect->query($query) === TRUE) {
           // หากบันทึกลงในฐานข้อมูลสำเร็จ
           $success_msg[] = 'Review added!';
           echo "<script>
                   /*swal('Success', 'Review submitted successfully!', 'success').then(() => {
                       window.location.href = 'index.php';
                   });*/
                   window.location.href = 'index.php';
               </script>";
       } else {
         $error_msg[] = 'There is a problem from our server, please try again later.';
           // หากมีข้อผิดพลาดในการบันทึก
         //   echo "<script>
         //           swal('Error', 'Error: " . $connect->error . "', 'error');
         //       </script>";
       }
   }
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
   // รับข้อมูลจากฟอร์ม
   $description = $_PUT['description'];
   $rating = $_PUT['rating'];
   $user_id = $_SESSION['user_id']; // ควรใช้ตัวแปรที่เก็บ session user_id ที่เข้าสู่ระบบเพื่อให้เชื่อมโยงกับผู้ใช้ที่เข้าสู่ระบบอยู่

       // ถ้ายังไม่มีรีวิวของผู้ใช้นี้
       // เตรียมคำสั่ง SQL เพื่อเพิ่มข้อมูลลงในฐานข้อมูล
      //  $query = "INSERT INTO reviews (user_id, description, rating) VALUES ('$user_id', '$description', '$rating')";
       $sql = "UPDATE reviews SET rating=$rating description=$description WHERE user_id=$user_id";
      //  $statement = $connect->prepare($query);
      //  $result =  $statement->execute($data);


       if ($connect->query($query) === TRUE) { //$sql
           // หากบันทึกลงในฐานข้อมูลสำเร็จ
           $success_msg[] = 'Review updated!';
           echo "<script>
                   /*swal('Success', 'Review submitted successfully!', 'success').then(() => {
                       window.location.href = 'index.php';
                   });*/
                   window.location.href = 'index.php';
               </script>";
       } else {
         $error_msg[] = 'There is a problem from our server, please try again later.';
           // หากมีข้อผิดพลาดในการบันทึก
         //   echo "<script>
         //           swal('Error', 'Error: " . $connect->error . "', 'error');
         //       </script>";
       }
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>add review</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.php'; ?>
<section class="account-form">
   <form action="" method="post">
      <h3>post your review</h3>
      <p class="placeholder">review description</p>
      <textarea name="description" class="box" placeholder="enter your review" required maxlength="200" cols="30" rows="10"></textarea>
      <p class="placeholder">review rating</p>
      <select name="rating" class="box" required>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
      </select>
      <input type="submit" value="submit review" name="submit" class="btn" style="align-items: center">
      <a href="index.php" class="option-btn">go back</a>
   </form>


</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/alers.php'; ?>

</html>