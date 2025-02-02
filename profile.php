<!DOCTYPE html>
    <html lang="en">
    <?php
    include 'header.php'; 
    ?>
    <body>
    <?php
    $heading = "Profile";
    include 'sub-header.php';
    ?>
<?php
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Database query failed.");
}

// ดึงข้อมูล user
$user = mysqli_fetch_assoc($result);
// ดึง events ที่ user join
$joinedEventsQuery = "SELECT e.* FROM events e INNER JOIN event_user eu ON e.id = eu.event_id WHERE eu.user_id = $user_id";
$joinedEventsResult = mysqli_query($connect, $joinedEventsQuery);

if (!$joinedEventsResult) {
    die("Database query failed."); 
}

// ส่วนของ delete
if (isset($_POST['delete_event_id'])) {
    $event_id_to_delete = $_POST['delete_event_id'];
    $delete_query = "DELETE FROM event_user WHERE user_id = $user_id AND event_id = $event_id_to_delete";
    $delete_result = mysqli_query($connect, $delete_query);

    if ($delete_result) {
        echo "<p>Event deleted successfully.</p>";
        header("Location: profile.php");
        exit();
    } else {
        echo "<p>Error deleting event.</p>";
    }
}
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="assets/css/proflie.css">
</head>
<body>
    
<?php
include 'profile-box.php';
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