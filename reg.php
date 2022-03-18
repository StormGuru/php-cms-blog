<?php
include 'app/include/db.php';
include 'app/controllers/users.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="styles/sign.css">
</head>
<body>
    <div class="container">
        <!--HEADER-->
<?php include "app/include/header.php"?>

      <!--CONTENT-->
      <div class="content">
        <p class="redirect">Already have an account? <a href="aut.php"> Sign in</a></p>
          <form action="reg.php" method="POST">
          <div class="signbox">
              <input type="text" placeholder="Your login" name="login">
              <input type="password" placeholder="Your password" name="passwordF">
              <input type="password" placeholder="Repeat password" name="passwordS">
          </div>
          <div class="msg"><?=$msg?></div>
         <div class="btnbox">
              <button type="submit" class="autbtn" name="reg_submit">sign up</button>
        </div>
        </form>
        </div>
          <!-- END CONTENT-->
  
            <!-- FOOTER-->
            <footer class="footer">
                <div class="foot">
                    <div class="list">
                        <ul>
                            <li>FAQ</li>
                            <li>Support service</li>
                            <li>Advertising</li>
                            <li>Conditions of use</li>
                            <li>News</li>
                        </ul>
                    </div>
                    <div class="socials">
                      <a href="#" class="fab fa-vk"></a>
                      <a href="#" class="fab fa-youtube"></a>
                      <a href="#" class="fab fa-instagram"></a>
                      <a href="#" class="fab fa-twitter"></a>
                    </div>
                    <p>2022 MyBlog</p>
                </div>
            </footer>
            <!-- END FOOTER-->
      </div>
     
    </div>
    <script src="https://kit.fontawesome.com/2bb3164b11.js" crossorigin="anonymous"></script>
</body>
</html>