<!DOCTYPE html>
<html lang="en">
<?php
include 'header.php'; 
?>
<body>
<?php
$heading = "EVENTS";
include 'sub-header.php';
?>
<?php
if(empty($_SESSION['user_id'])){
    $_SESSION['user_id']= null;
}
$loggedInUser = isset($_SESSION['user_id']);
$selectEventsQuery = "SELECT * FROM events";
$eventsResult = $connect->query($selectEventsQuery);
?>

<!-- Events -->
<?php
if ($eventsResult->num_rows > 0) {
    while ($event = $eventsResult->fetch_assoc()) {
        $joinedEventQuery = "SELECT * FROM event_user WHERE user_id = '{$_SESSION['user_id']}' AND event_id = '{$event['id']}'";
        $joinedEventResult = $connect->query($joinedEventQuery);
        $joinedEvent = $joinedEventResult->num_rows > 0;
        ?>
        <div class="box">
            <section class="hero">
                <div class="container">
                    <div class="content">
                        <img src="<?php echo $event['image']; ?>" alt="Hero Image">
                        <div class="text">
                            <h1><?php echo $event['name']; ?></h1>
                            <p><?php echo $event['description']; ?></p>
                            <?php if ($loggedInUser) { ?>
                                <form action="join_event.php" method="post" onsubmit="return confirmJoinEvent(<?php echo $joinedEvent ? 'true' : 'false'; ?>)">
                                    <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
                                    <button type="submit" class="btn"><?php echo $joinedEvent ? 'Joined Event' : 'Join Event'; ?></button>
                                </form>
                            <?php } else { ?>
                                <a href="#" class="btn" onclick="alert('Please log in to join the event'); window.location='login.php';">Join Event</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php
    }
} else {
    echo "No events found.";
}
?>

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
      function confirmJoinEvent(alreadyJoined) {
        if (alreadyJoined) {
            alert("You already joined this event.");
            return false; 
        }
        return confirm("Do you want to join this event?");
    }
    </script>

</body>
</html>
