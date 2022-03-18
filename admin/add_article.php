<?php 
include '../app/include/db.php';
include '../app/controllers/articles.php';
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
            <form action="add_article.php" method="POST">
              <p><input type="text" placeholder="title" name="title"></p>
              <textarea name="text" id="" cols="70" rows="15">text</textarea>
              <p> select category
              <select name="selected_ctg" id="">
                <?php foreach($categories as $key => $category): ?>
                <option value="<?=$category['id']?>"><?=$category['ctg_name']?></option>
                <?php endforeach; ?>
              </select>
              </p>
              <p><input type="submit" value="add" class="add_btn" name="add_article"></p>
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