<?php
include 'connect.php'; 

$tableUserExistsQuery = "SHOW TABLES LIKE 'users'";
$tableUserExistsResult = $connect->query($tableUserExistsQuery);

if ($tableUserExistsResult->num_rows == 0) {
    $createTableQuery = "CREATE TABLE `users` (
        id INT AUTO_INCREMENT PRIMARY KEY,
        `role` varchar(7) DEFAULT('USER'),
        `firstname` varchar(40) DEFAULT NULL,
        `lastname` varchar(40) DEFAULT NULL,
        `email` varchar(50) DEFAULT NULL,
        `phone` varchar(10) DEFAULT NULL,
        `username` varchar(50) DEFAULT NULL,
        `password` varchar(50) DEFAULT NULL)";

    if ($connect->query($createTableQuery) === TRUE) {
 //       echo "Table 'users' created successfully";
    } else {
        echo "Error creating table: " . $connect->error;
    }
} else {
 //  echo "Table 'users' already exists, skip";
}

$adminUsername = "admin";
$adminPassword = "password";
$adminEmail = "admin@gmail.com";
$adminPhone = "0811111111";
$adminFirstName = "admin";
$adminLastName = "admin";

$checkAdminQuery = "SELECT * FROM users WHERE username = '$adminUsername'";
$checkAdminResult = $connect->query($checkAdminQuery);

if ($checkAdminResult->num_rows == 0) {
    $addAdminQuery = "INSERT INTO users (role, username, password, email, phone, firstname, lastname) VALUES ('ADMIN', '$adminUsername', '$adminPassword', '$adminEmail', '$adminPhone', '$adminFirstName', '$adminLastName')";

    if ($connect->query($addAdminQuery) === TRUE) {
        
    }
}
//echo "<br>";

$tableEventExistsQuery = "SHOW TABLES LIKE 'events'";
$tableEventExistsResult = $connect->query($tableEventExistsQuery);

if ($tableEventExistsResult->num_rows == 0) {
    $createTableQuery = "CREATE TABLE events (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        image VARCHAR(255),
        location VARCHAR(255),
        event_date DATE
    )";

    if ($connect->query($createTableQuery) === TRUE) {
  //      echo "Table 'events' created successfully<br>";
        $insertDefaultRowsQuery = "INSERT INTO events (name, description, image, location, event_date) 
                                   VALUES 
                                   ('YSEP', ' Young Startup Entreprenuer Program', 'assets/image/ysepslide.png', 'Default Location 1', '2024-04-13'),
                                   ('UniHack', 'Hackathon by Chula Tech Startup', 'assets/image/unitslide.png', 'Default Location 2', '2024-04-14'),
                                   ('Start It Now', 'Inspirational talk', 'assets/image/stslide1.png', 'Default Location 2', '2024-04-14'),
                                   ('Design Thinking Class', 'class in YSEP', 'assets/image/messageImage_1711610687439.jpg', 'Default Location 3', '2024-04-15')";

        if ($connect->query($insertDefaultRowsQuery) === TRUE) {
    //        echo "Multiple default rows inserted successfully";
        } else {
            echo "Error inserting multiple default rows: " . $connect->error;
        }
    } else {
        echo "Error creating table: " . $connect->error;
    }
} else {
 //   echo "Table 'events' already exists, skip";
}
//echo "<br>";

$tableUserEventExistsQuery = "SHOW TABLES LIKE 'event_user'";
$tableUserEventExistsResult = $connect->query($tableUserEventExistsQuery);

if ($tableUserEventExistsResult->num_rows == 0) {
    $createTableQuery = "CREATE TABLE `event_user` (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        event_id INT NOT NULL,
        join_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        UNIQUE KEY unique_user_event (user_id, event_id),
        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (event_id) REFERENCES events(id)
    )";

    if ($connect->query($createTableQuery) === TRUE) {
   //     echo "Table 'event_user' created successfully";
    } else {
        echo "Error creating table: " . $connect->error;
    }
} else {
  //  echo "Table 'event_user' already exists, skip";
}
//echo "<br>";

//bonus
$tableReviewExistsQuery = "SHOW TABLES LIKE 'reviews'";
$tableReviewExistsResult = $connect->query($tableReviewExistsQuery);


if ($tableReviewExistsResult->num_rows == 0) {
    $createTableQuery = "CREATE TABLE `reviews` (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        rating INT(1) NOT NULL,
        description VARCHAR(200) NOT NULL,
        review_date DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    )";
    if ($connect->query($createTableQuery) === TRUE) {
  //      echo "Table 'reviews' created successfully";
    } else {
        echo "Error creating table: " . $connect->error;
    }
} else {
 //   echo "Table 'reviews' already exists, skip";
}
//echo "<br>";
?>