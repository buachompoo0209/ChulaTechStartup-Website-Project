<section class="sub-header">
    <nav class="nav">
        <div class="nav-logo">
            <a href="admin_index.php"><img src="assets/image/Cuts Logo.png"></a>
        </div>
        <div class="nav-menu">
            <ul>
                <li><a href="admin_events.php" class="link">Participant List</a></li>
                <li><a href="admin_reviews.php" class="link">Reviews</a></li>
            </ul>
        </div>
            <div>
                <p><?php echo $_SESSION['username']; ?></p>
            </div>
            <div class="nav-button">
                <a href="logout.php" class="btn white-btn">Log out</a>
            </div>
        <div class="nav-menu-btn">
            <i class="fa-solid fa-bars"></i>
        </div>
    </nav>

</section>

