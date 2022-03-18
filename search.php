<?php
include 'app/include/db.php';
$searchs = search($_POST['search']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
        <!--HEADER-->
<?php include "app/include/header.php"?>
      <!--CONTENT-->
      <div class="content">
        <p class="single_title"> Searching results: </p>
          <div class="articles">
            <?php foreach($searchs as $key => $search): ?>
            <div class="article">
                <h2><a href="single.php" ><?=$search['title']?></a></h2>
                <div class="artinfo">
                    <span><?=$search['autor']?></span>
                    <span><?=$search['date']?>e</span>
                    <p>category: <span class='art_category'><?=$search['ctg_name']?></span></p>
                </div>
                <p class="prevtext"> <?=$search['art_text']?> </p>
            </div>
            <?php endforeach; ?>
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