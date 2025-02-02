<!DOCTYPE html>
    <html lang="en">
        <?php
            include 'header.php'; 
        ?>
    <body>
        <?php
            $heading = "LOGIN";
            include 'sub-header.php';
        ?>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $stmt = $connect->prepare("SELECT id, username, role FROM users WHERE username = ? AND password = ?");
                $stmt->bind_param("ss", $username, $password);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $_SESSION["user_id"] = $row["id"];
                    $_SESSION["role"] = $row["role"];
                    
                    if ($row["role"] == "ADMIN"){
                        header("Location: admin_index.php");    
                    } 
                    else {
                        header("Location: profile.php");
                    }
                    exit();
                } else {
                    echo "<script>alert('Invalid username or password');</script>";
                }
            }
        ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <div class="login-container">
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
    <br>
    <br>
    <p>You don't have an account yet?</p>
<a href="register.php"> Register </a>    
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    </div>

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