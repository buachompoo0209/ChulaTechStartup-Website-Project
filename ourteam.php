<!DOCTYPE html>
    <html lang="en">
    <?php
    include 'header.php'; 
    ?>
    <body>
    <?php
    $heading = "OUR TEAM";
    include 'sub-header.php';
    ?>
    </section>
    </head>

  <body>    
    <section class="team-section">  
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
    
    <!--------------------------------Team------------------------------------------------->
    <section class="picteam">
        <h1>President Team</h1>
         <img src="assets/image/Pres.jpg" alt="Pres Image">
        </section>
        <section class="picteam">
        <h1>Marketing Team</h1>
         <img src="assets/image/Marketing.jpg" alt="Mkt Image">
        </section>
        <section class="picteam">
        <h1>People Team</h1>
         <img src="assets/image/pp.jpg" alt="pp Image">
        </section>
        <section class="picteam">
        <h1>Activity Team</h1>
         <img src="assets/image/Acty.jpg" alt="Acty Image">
        </section>
        <section class="picteam">
        <h1>Finance Team</h1>
         <img src="assets/image/Finance.jpg" alt="Fi Image">
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

