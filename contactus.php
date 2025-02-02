<!DOCTYPE html>
    <html lang="en">
    <?php
    include 'header.php'; 
    ?>
    <body>
    <?php
    $heading = "CONTACT US";
    include 'sub-header.php';
    ?>
    </section>
    <!---contact us--->
    </head>
  <body>
    <section class="location">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d968.901500977226!2d100.52811922370871!3d13.742287431454262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2992ce63a9795%3A0x4e50a7d60b122fcd!2z4Lit4Liy4LiE4Liy4Lij4LmA4LiJ4Lil4Li04Lih4Lij4Liy4LiK4LiB4Li44Lih4Liy4Lij4Li1IDYwIOC4nuC4o-C4o-C4qeC4siAo4Lit4Liy4LiE4Liy4Lij4LiI4Liy4Lih4LiI4Li44Lij4Li1IDEwKQ!5e0!3m2!1sth!2sth!4v1711732072539!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <section class="contact-us">

      <div class="row">
        <div class="contact-col">
          <div>
            <i class="fa fa-home"></i>
            <span>
              <h5>Address</h5>
              <p>Chaloem Rajakumari 60 Building, PhayaThai Road, Phatumwan, Bangkok 10330</p>
            </span>
          </div>
          <div>
            <i class="fa fa-phone"></i>
            <span>
              <h5>061-794-7976</h5>
              <p>Monday to Sunday, 10AM to 6AM</p>
            </span>
          </div>
          <div>
            <i class="fa fa-envelope-o"></i>
            <span>
              <h5>chulatechstartup2024@gmail.com</h5>
              <p>Email us your query</p>
            </span>
          </div>
          
        </div>
        <div class="contact-col">
  <h4>Text us</h4>
  <form action="https://api.web3forms.com/submit" method="POST">
    <input type="hidden" name="access_key" value="eddef0b1-dabd-4a56-a5a4-2a5056706bd4">
    
    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Enter your name" required>
    
    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" placeholder="Enter email address" required>
    
    <label for="subject">Subject</label>
    <input type="text" id="subject" name="subject" placeholder="Enter your subject" required>
    
    <label for="message">Message</label>
    <textarea id="message" rows="8" name="message" placeholder="Message" required></textarea>
    
    <button type="submit" class="join-btn">Send Message</button>
  </form>
</div>

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

