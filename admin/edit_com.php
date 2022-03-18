<?php 
include '../app/include/db.php';
include '../app/controllers/comments.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        <!--HEADER-->
     <?php include 'header.php' ?>
      <!--CONTENT-->
    <div class="content">
        <div class="adm_menu">
            <div class="adm_log">Admin</div>
            <p><a href="users.php">Users</a></p>
            <p><a href="articles.php">Articles</a></p>
            <p><a href="comments.php">Comments</a></p>
            <p><a href="category.php">Categories</a></p>
            <p><a href="image.php">Image</a></p>
        </div>
        <div class="adm_table">
          <div class="add_admin">
              <div class="msg"><?=$msg?></div>
            <form action="edit_com.php" method="POST">
              <input type="hidden" value="<?=$id?>" name="com_id">
              <input type="hidden" value="<?=$commentById['page']?>" name="com_page">
              <input type="hidden" value="<?=$commentById['autor']?>" name="com_autor">
              <textarea name="com_text"  cols="50" rows="5"><?=$commentById['com_text']?></textarea>
              <p><input type="submit" value="save" class="add_btn" name="edit_com"></p>
           </form>
          </div>
        </div>
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