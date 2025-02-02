<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CHULA TECH STARTUP</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://kit.fontawesome.com/ab02615246.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
</head>

<?php
include 'connect.php'; 
session_start();

if(empty($_SESSION['user_id'])){
    $_SESSION['user_id']= null;
}
$loggedInUser = isset($_SESSION['user_id']);
$username = '';
if ($loggedInUser) {
    $userId = $_SESSION['user_id'];
    $query = "SELECT username FROM users WHERE id = $userId";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
    }
}
?>

<!--sub-header-->
<body>
<section class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <a href="index.php"><img src="assets/image/Cuts Logo.png"></a>
        </div>
        <div class="nav-menu">
            <ul>
                <li><a href="index.php" class="link">HOME</a></li>
                <li><a href="ourteam.php" class="link">OUR TEAM</a></li>
                <li><a href="event.php" class="link">EVENTS</a></li>
                <li><a href="contactus.php" class="link">CONTACT US</a></li>
            </ul>
        </div>
        <?php if ($loggedInUser) { ?>
            <div class="nav-button">
                <a href="profile.php" class="btn white-btn"><?php echo $username; ?></a>
            </div>
        <?php } else { ?>
            <div class="nav-button">
                <a href="login.php" class="btn white-btn">Log In</a>
            </div>
        <?php } ?>
        <div class="nav-menu-btn">
            <i class="fa-solid fa-bars"></i>
        </div>
    </nav>

    <header class="text-center mt-4 mb-2">
        <h2>SIGN UP</h2>
    </header>
    <div class="form-box">
        <div class="register-container" id="register">
        <form action="process_register.php" method="POST">
            <div class="two-forms">
                <div class="input-box">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstname" class="input-field" placeholder="firstname" required>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastname" class="input-field" placeholder="lastname" required>
                    <i class="bx bx-user"></i>
                </div>
            </div>
            <div class="input-box">
                <label for="email">E-mail</label>
                <input type="text" name="email" class="input-field" placeholder="email" required>
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" class="input-field" placeholder="phone" required> <!-- New input for phone number -->
                <i class="bx bx-phone"></i>
            </div>
            <div class="input-box">
                <label for="username">Username</label>
                <input type="text" name="username" class="input-field" placeholder="username" required> <!-- New input for username -->
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" name="password" class="input-field" placeholder="password" required>
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="submit" name="submit" class="submit" value="Submit">
            </div>
            <div class="last">
                <span>Have an account? <a href="login.php">Login</a></span>
            </div>
        </div>
    </div>
    <?php
include 'footer.php'; 
?>   
    
<!--javascript-->
    <script>
      var navLinks = document.getElementById("navLinks");
      function showMenu(){
        navLinks.style.right = "0";
      }
      function hideMenu(){
        navLinks.style.right = "-200px";
      }
    </script>
</body>
</html>