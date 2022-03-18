<?php
include 'app/include/db.php';
include 'app/controllers/comments.php';
$single_art = singleArt($_GET['id']);
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
      <p class="single_title"><?= $single_art['title']?></p>
      <div class="single_info">
        <span><?= $single_art['autor']?></span>
        <span><?= $single_art['date']?></span>
        <span><?= $single_art['ctg_name']?></span>
      </div>
      <div class="single_text">
      <?= $single_art['art_text']?>
      </div>
      <div class="comment">
      <div class="msg"><?=$msg?></div>
          <form action="single.php?id=<?=$_GET['id']?>" method="POST">
            <textarea name="comment_text" id=""  rows="5" class="comment_area">Your comment</textarea>
            <button type="submit" class="btn_comment" name="add_comment">Send comment</button>
          </form>
      </div>
      <div class="comments">
        <?php foreach($comments_single as $key => $com): ?>
          <div class="comment_box">
              <span><?=$com['autor']?></span>
              <span><?=$com['date']?></span>
              <p><?=$com['com_text']?></p>
          </div>
          <?php endforeach; ?>
      </div>
      <!--CONTENT-->
      
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