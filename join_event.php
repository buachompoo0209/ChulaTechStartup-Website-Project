<?php
include 'connect.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $eventId = $_POST['event_id'];

    // user join event แล้ว
    $checkJoinedEventQuery = "SELECT * FROM event_user WHERE user_id = '$userId' AND event_id = '$eventId'";
    $checkJoinedEventResult = $connect->query($checkJoinedEventQuery);

    if ($checkJoinedEventResult->num_rows == 0) {
        // Insert เพิ่ม
        $insertEventUserQuery = "INSERT INTO event_user (user_id, event_id) VALUES ('$userId', '$eventId')";
        if ($connect->query($insertEventUserQuery) === TRUE) {
            echo "Event joined successfully.";
        } else {
            echo "Error joining the event: " . $connect->error;
        }
    } else {
        echo "You have already joined this event.";
    }
} else {
    echo "Please log in to join the event.";
}
header("Location: event.php");
exit;