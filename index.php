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
  <link rel="icon" href="assets/image/Logo.png" type="image/x-icon">
</head>

<?php
include 'connect.php';

session_start();

if(empty($_SESSION['user_id'])){
    $_SESSION['user_id']= null;
}
// เช็คว่า login ไหม
$loggedInUser = isset($_SESSION['user_id']);
// กำหนดค่าเริ่มต้นของ username
$username = '';

// ถ้าlogin ไปดึงusername ออกมาแสดง
if ($loggedInUser) {
    $userId = $_SESSION['user_id'];
    $query = "SELECT username FROM users WHERE id = $userId";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
    }
}
/*ตรวจสอบว่าผู้ใช้ได้เข้าสู่ระบบไหม โดยใช้ตัวแปร $_SESSION['user_id'] 
เพื่อตรวจสอบว่ามีการกำหนดค่าไอดีของผู้ใช้ในเซสชันไหม ถ้ามีการกำหนดค่าไอดี 
ก็แสดงว่าผู้ใช้ได้เข้าสู่ระบบ ซึ่งตัวแปร $loggedInUser จะเป็น true ถ้าไม่ จะกำหนดเป็น false*/
?>

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
    <div class="text-box">
        <h1>Chula Tech Startup</h1>
        <p>The Biggest Startup Community <br> in Chulalongkorn University</p>
      <a href="event.php" class="hero-btn">Visit Us To Know More</a>
    </section>
  
<!--ABOUT-->
<section class="about">
  <h1>About Us</h1>
  <p>Safe space for students who are passionate about startups come together to practice various skills <br>and create innovation or business that can make impact on society. </p>

  <div class="row">
    <div class="about-col">
    <h3>VISION</h3>
      <p>Creating a startup ecosystem where limitless possibilities emerge.</p>
    </div>
    <div class="about-col">
      <h3>MISSION</h3>
      <p>Empowering students to seize the spotlight with a supportive startup community</p>
    </div>
    <div class="about-col">
      <h3>CORE VALUE</h3>
      <p>Impact   |   Resilience   |   Ownership</p>
    </div>
    
</section>

<!--our team-->
<section class="team-section">  
      <h1>Our Team</h1>
      <p>Impact |  Resilience  |   Ownership</p>
      <div class="row">
      <div class="contact-col">
          <h2>People Team</h2>
          <img src="assets/image/wawa.png">
          <div class="layer">
            <h3>Co-Head of <br>People Team</h3>
          </div>
          <p>Wawa</p>
          <p class="name">Panicha Kittiphongtorn</p>
          <p class="team">EBA #3</p>
        </div>
        <div class="contact-col">
          <h2>Marketing Team</h2>
          <img src="assets/image/Namo.png">
          <div class="layer">
            <h3>Co-Head of <br>Marketing Team</h3>
          </div>
          <p>Namo</p>
          <p class="name">Pichamol Chanapai</p>
          <p class="team">STAT #2</p>
        </div>
        <div class="contact-col">
    <h2>President</h2>
        <img src="assets/image/lingling.png" alt="Lingling">
    </a>
    <div class="layer">
        <h3>Co-President</h3>
    </div>
    <p>Lingling</p>
        <p class="name">Tanyavee Vittayapalotai</p>
    </a>
    <p class="team">BBA #4</p>
</div>
        
        <div class="contact-col">
          <h2>Activity Team</h2>
          <img src="assets/image/pk.png">
          <div class="layer">
            <h3>Co-Head of <br>Activity Team</h3>
          </div>
          <p>Porkaew</p>
          <p class="name">Nichanun Bunpamee</p>
          <p class="team">ECON #3</p>
        </div>
        <div class="contact-col">
          <h2>Finance Team</h2>
          <img src="assets/image/thyme.png">
          <div class="layer">
            <h3>Co-Head of <br>Finance Team</h3>
          </div>
          <p>Thyme</p>
          <p class="name">Jakkapan Janwongduean</p>
          <p class="team">ECON #3</p>
        </div>
    </section>

<!----Activities---->
<section class="Activities">
  <h1>Activities</h1>
  <p>Creating a student startup ecosystem where limitless possibilities emerge.</p>
 <!-------------image slide---------------------------------------------->
 <div class="slideshow-container">
          <div class="mySlides fade">
            <div class="numbertext">1 / 4</div>
            <img src="assets/image/ysepslide.png" style="width:100%">
            <!-- <div class="texts">Caption Text</div> -->
          </div>
          <div class="mySlides fade">
            <div class="numbertext">2 / 4</div>
            <img src="assets/image/unitslide.png" style="width:100%">
            <!-- <div class="texts">Caption Text</div> -->
          </div>
          <div class="mySlides fade">
            <div class="numbertext">3 / 4</div>
            <img src="assets/image/stslide1.png" style="width:100%">
            <!-- <div class="texts">Caption Text</div> -->
          </div>
          <div class="mySlides fade">
            <div class="numbertext">4 / 4</div>
            <img src="assets/image/messageImage_1711610687439.jpg" style="width:100%">
            <!-- <div class="texts">Caption Text</div> -->
          </div>
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>
              <br>
              <div style="text-align: center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
              </div>    
      <!-------------ends image slide---------------------------------------------->

      <div class="row">
      <div class="Activities-col">
      <img src="assets/image/ysepppp.JPG">
      <h3>YSEP</h3>
      <p>Young Startup Entreprenuer Program <br> The program opens up opportunities for Chula's students to create your own startup within a 2-month timeframe, allowing you to learn and get hands-on experience in building a business from the ground up to scaling it into reality.</p>
    </div>
    <div class="Activities-col">
      <img src="assets/image/uni.jpg">
      <h3>UniHack</h3>
      <p>Hackathon By Chula Tech Startup<br> "The intense 48-hour Hackathon competition invites students from universities across Thailand interested in startups to gather ideas, develop skills, and showcase their problem-solving abilities by applying innovation to business challenges."</p>
    </div>
    <div class="Activities-col">
      <img src="assets/image/Start It Now.png">
      <h3>Start It Now</h3>
      <p>Inspiration talks <br> Inspiration talks that bring everyone to step out of their comfort zone and do something new like <br>"START IT NOW". </p>
    </div>
    <div class="Activities-col">
      <img src="assets/image/designthink.png">
      <h3>Design Thinking Class</h3>
      <p>Design Thinking <br>is a popular approach for understanding customer problems and creating innovative solutions through five steps: Empathize, Design, Ideate, Prototype, and Test, iteratively refining until the best solution is achieved.
</p>
    </div>
  </div>
</section>
    
<!--BLOG-->
    <section id="blog">
      
      <div class="blog-heading">
        <span>My Recent Blog</span>
        <h3>Our Blog</h3>
      </div>
      
      <div class="blog-container">
        
        <div class="blog-box">
          
          <div class="blog-img">
            <img src="assets/image/S__195493898.jpg"  alt="blog img">
        </div>
          
          
        <div class="blog-text">
          <span>11 September 2023</span>
          <a href="https://www.instagram.com/p/CxDJAG1rNMY/?img_index=1" class="bolg-title">5 Pitching Tips</a>
          <p>content by namo</p>
        </div>
      </div>

        <div class="blog-box">

            <div class="blog-img">
              <img src="assets/image/S__195493895.jpg"  alt="blog img">
          </div>


          <div class="blog-text">
            <span>3 September 2023</span>
            <a href="https://www.instagram.com/p/Cwu_3i0px1Z/?img_index=1" class="bolg-title">5 soft skills for Entrepreneur</a>
            <p>content by namo</p>
          </div>
        </div>

        <div class="blog-box">

            <div class="blog-img">
              <img src="assets/image/S__195493897.jpg"  alt="blog img">
          </div>


          <div class="blog-text">
            <span>7 September 2023</span>
            <a href="https://www.instagram.com/p/Cw415I_qPD8/?img_index=1" class="bolg-title">What is Design Thinking</a>
            <p>content by namo</p>
          </div>
        </div>
        
      </div>
    </section>
    
<!-------------------------------------review-------------------------------------------->
    <section class="testimonials-section">
      <h1>What Members Say</h1>
      <!--owl carousel slider starts-->
      <div class="owl-carousel owl-theme testimonials-container">
        <!---item1 starts--->
          <div class="item testimonials-card">
            <main class="test-card-body">
              <div class="quote">
                <i class="fas fa-quote-left"></i>
                <h2>ได้เจอเพื่อนใหม่</h2>
              </div>
              <p>ได้พบเพื่อนจากหลายคณะที่มีความสนใจในด้านธุรกิจเหมือนกัน</p>
              <div class="ratings">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
            </main>
            <div class="profile">
              <div class="profile-image">
                <img src="assets/image/jopectt.png">
              </div>
              <div class="profile-desc">
                <span>Project</span>
                <span>Stat #2</span>
              </div>
            </div>
          </div>
        <!---item1 ends--->
        <!---item2 starts--->
          <div class="item testimonials-card">
            <main class="test-card-body">
              <div class="quote">
                <i class="fas fa-quote-left"></i>
                <h2>ได้เรียนรู้skillใหม่ๆ</h2>
              </div>
              <p>ชมรมเป็นพื้นที่ที่ได้เรียนรู้skillใหม่ๆที่พัฒนาตามtrendของธุรกิจอยู่เสมอ</p>
              <div class="ratings">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
            </main>
            <div class="profile">
              <div class="profile-image">
                <img src="assets/image/lingling.png">
              </div>
              <div class="profile-desc">
                <span>Lingling</span>
                <span>BBA #4</span>
              </div>
            </div>
          </div>
        <!---item2 ends--->
        <!---item3 starts--->
          <div class="item testimonials-card">
            <main class="test-card-body">
              <div class="quote">
                <i class="fas fa-quote-left"></i>
                <h2>เพิ่มทักษะการรับมือกับแรงกดดัน</h2>
              </div>
              <p>ช่วยพัฒนาEQ เพิ่มทักษะการบริหารจิตใจและอารมณ์ของตัวเองในการรับมือกับแรงกดดัน</p>
              <div class="ratings">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
            </main>
            <div class="profile">
              <div class="profile-image">
                <img src="assets/image/pk.png">
              </div>
              <div class="profile-desc">
                <span>Porkaew</span>
                <span>ECON #3</span>
              </div>
            </div>
          </div>
        <!---item3 ends--->
        <!---item4 starts--->
          <div class="item testimonials-card">
            <main class="test-card-body">
              <div class="quote">
                <i class="fas fa-quote-left"></i>
                <h2>ได้ประสบการณ์การทำงานกับผู้อื่น</h2>
              </div>
              <p>ได้ฝึกpresentation การฝึกพูดและการทำงานร่วมกับผู้อื่น พอได้ไปทำจริงๆเราจะoutstandingเพราะเรามีประสบการณ์การทำงานกัคนอื่นมาแล้ว</p>
              <div class="ratings">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
            </main>
            <div class="profile">
              <div class="profile-image">
                <img src="assets/image/thyme.png">
              </div>
              <div class="profile-desc">
                <span>Thyme</span>
                <span>ECON #3</span>
              </div>
            </div>
          </div>
        <!---item4 ends--->
        <!---item5 starts--->
          <div class="item testimonials-card">
            <main class="test-card-body">
              <div class="quote">
                <i class="fas fa-quote-left"></i>
                <h2>ได้connection</h2>
              </div>
              <p>เป็นชมรมที่มีคนจากหลายหลายคณะทีสนใจในด้านธุรกิจมารวมตัวกัน ทำให้เรารู้จักคนใหม่ๆเพิ่มมากขึ้น</p>
              <div class="ratings">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
            </main>
            <div class="profile">
              <div class="profile-image">
                <img src="assets/image/wawa.png">
              </div>
              <div class="profile-desc">
                <span>Wawa</span>
                <span>EBA #3</span>
              </div>
            </div>
          </div>
        <!---item5 ends--->
        <!---item6 starts--->
          <div class="item testimonials-card">
            <main class="test-card-body">
              <div class="quote">
                <i class="fas fa-quote-left"></i>
                <h2>เป็นชมรมที่ไม่มีกรอบมาจำกัด</h2>
              </div>
              <p>ชมรมเป็น sand box ไม่มีกรอบมาจำกัด สามารถdesign กิจกรรมของชมรมได้ตามที่คิดว่าดีที่สุด ทำให้เราได้พัฒนามากขึ้น</p>
              <div class="ratings">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
            </main>
            <div class="profile">
              <div class="profile-image">
                <img src="assets/image/Namo.png">
              </div>
              <div class="profile-desc">
                <span>Namo</span>
                <span>Stat #2</span>
              </div>
            </div>
          </div>
        <!---item6 ends--->
      </div>
      <!---owl carousel slider ends--->
    </section>

        <!---JQuery Link--->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!---owl carousel js link--->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <!--- link to custom script file--->
        <script type="text/javascript" src="assets/js/script.js"></script>
     <!-- reviews section starts  -->

<section class="review">
<div style="text-align: center;">
  <h1 >What Our Members Says</h1><br>
  <p >We are a startup company that is dedicated to providing high-quality products and services to our customers.</p><br>
  <?php
  if ($loggedInUser) {
  ?>
    <div class="heading"><a href="add_review.php" class="btn" style="margin-top: 0;">Add Review</a></div>
  <?php
    } else {
  ?>
  <a href="#" class="btn" onclick="alert('Please log in to review'); window.location='login.php';">Add Review</a>
  <?php
    }
  ?>
  </div>

  <?php
include 'connect.php';
$userId = $_SESSION['user_id'];
$select_reviews = "SELECT * FROM reviews";
$result = mysqli_query($connect, $select_reviews);
//ถ้ามีรีวิว
if (mysqli_num_rows($result) > 0) {
    while ($fetch_review = mysqli_fetch_assoc($result)) {
        ?>
        <div class="box" <?php if ($fetch_review['user_id'] == $_SESSION['user_id']) {
                              echo 'style="order: -1;"';
                          }; ?>>
            <?php
            // ดึงข้อมูล user
            $select_user = "SELECT * FROM users WHERE id = " . $fetch_review['user_id'];
            $user_result = mysqli_query($connect, $select_user);
            $fetch_user = mysqli_fetch_assoc($user_result);
            ?>
            <!-- โชว์ข้อมูล user -->
            <h2 class="user">
                <div>
                    <p><?= $fetch_user['username']; ?></p>
                </div>
            <!-- โชว์ rating -->
            <div class="ratings">
                <?php
                $rating = $fetch_review['rating'];
                for ($i = 0; $i < $rating; $i++) {
                    ?>
                    <p style="background:var(<?= ($rating > 3) ? '--main-color' : ($rating > 2 ? '--orange' : '--red') ?>);">
                        <i class="fas fa-star"></i>
                    </p>
                <?php }; ?>
            </div>
            <!-- โชว์ description -->
            <h3 class="description">
            <div>
                    <p><?= $fetch_review['description']; ?></p>
                </div>
            <!-- edit reviewได้ -->
            <?php if ($fetch_review['user_id'] == $_SESSION['user_id']) { ?>
                <form action="" method="post" class="flex-btn">
                    <input type="hidden" name="delete_id" value="<?= $fetch_review['id']; ?>">
                    <a href="edit_review.php" class="inline-option-btn">Edit Review</a>
                </form>
            <?php }; ?>
        </div>
    <?php
    }
} else {
    echo '<p class="empty" style="text-align: center;">( No reviews added yet ! )</p>';
}
?>
</section>

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