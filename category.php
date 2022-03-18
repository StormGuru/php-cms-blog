<?php
include 'app/include/db.php';
include 'app/controllers/categories.php';
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
          <div class="articles">
            <p class="lastpub">Articles by category: <?= $category_name['ctg_name'] ?></p>
            <?php foreach($articlesByCtg as $key=>$articleByCtg): ?>
            <div class="article">
                <h2><a href="single.php"><?=$articleByCtg['title']?> </a></h2>
                <div class="artinfo">
                    <span><?=$articleByCtg['autor']?></span>
                    <span><?=$articleByCtg['date']?></span>
                    <p>category: <span class='art_category'><?=$articleByCtg['ctg_name']?></span></p>
                </div>
                <p class="prevtext"> <?= mb_substr($articleByCtg['art_text'], 0, 150)?></p>
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