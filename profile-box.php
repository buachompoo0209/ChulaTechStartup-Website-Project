<div class="profile-box">
    <h1>Welcome to Chula Tech Startup, <?php echo $user['username']; ?>!</h1>
    
    <h2>Your Profile Information:</h2>
    <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
    <p><strong>Firstname:</strong> <?php echo $user['firstname']; ?></p>
    <p><strong>Lastname:</strong> <?php echo $user['lastname']; ?></p>
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    <p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>

    <h3>Events You Have Joined:</h3>
    <?php if (mysqli_num_rows($joinedEventsResult) > 0) { ?>
        <ul>
            <?php while ($event = mysqli_fetch_assoc($joinedEventsResult)) { ?>
                <li>
                    <?php echo $event['name']; ?>
                    <form method="post" action="">
                        <input type="hidden" name="delete_event_id" value="<?php echo $event['id']; ?>">
                        <button type="submit">Delete Event</button>
                    </form>
                </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p>You haven't joined any events yet.</p>
    <?php } ?>

    <a href="logout.php">Logout</a>
</div>
