<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CHULA TECH STARTUP</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://kit.fontawesome.com/ab02615246.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php
    include 'connect.php'; 
    session_start();
    
    if(isset($_SESSION['user_id'])) {
        if($_SESSION['role'] != 'ADMIN') {
            header("Location: index.php");
            exit();        
        }    
    }else{
        header("Location: index.php");
            exit();
    }

    $username = '';
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Database query failed.");
    }
    $user = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $user['username'];

?>

<body>
    <?php include 'navbar.php' ?>
    <h1>Welcome to Chula Tech Startup, <?php echo $user['username']; ?>!</h1>
    
    <h2>Your Profile Information:</h2>
    <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
    <p><strong>Firstname:</strong> <?php echo $user['firstname']; ?></p>
    <p><strong>Lastname:</strong> <?php echo $user['lastname']; ?></p>
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    <p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>
</body>