<?php
include 'connect.php';
session_start();

if(empty($_SESSION['user_id'])){
    $_SESSION['user_id']= null;
}
// เช็คว่า login ไหม
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
<section class="sub-header">
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
    <h1><?php echo $heading; ?></h1>

</section>
