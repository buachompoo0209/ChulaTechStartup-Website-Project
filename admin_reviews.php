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
?>

<body>
    <?php include 'navbar.php' ?>

    <?php
        // ดึงรีวิวออกมา
        $selectReviewsQuery = "SELECT reviews.rating, reviews.description, reviews.review_date, users.firstname, users.lastname FROM reviews INNER JOIN users ON reviews.user_id = users.id";
        $reviewsResult = $connect->query($selectReviewsQuery);
    ?>

    <div class="reviews-list">
        <?php
        // เช็คว่ามีรีวิวไหม
        if ($reviewsResult->num_rows > 0) {
            while ($review = $reviewsResult->fetch_assoc()) {
                ?>
                <div class="review">
                    <div class="user"><?php echo 'name: ' . $review['firstname'] . ' ' . $review['lastname']; ?></div>
                    <div class="rating"><?php echo 'rating: ' . $review['rating']; ?></div>
                    <div class="description"><?php echo 'description: ' .  $review['description']; ?></div>
                    <div class="review-date"><?php echo 'review_date: ' . $review['review_date']; ?></div>
                </div>
                <?php
            }
        } else {
            echo "<p>No reviews available.</p>";
        }
        ?>
    </div>
</body>