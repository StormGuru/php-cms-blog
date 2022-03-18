<?php
include 'app/include/db.php';
include 'app/include/pagination.php';
include 'app/controllers/categories.php';
include 'app/controllers/articles.php';
// IMAGE
$image = getOne('image', ['id' => 1]);
$image2 = 'admin/img/'. $image['img_name'];
echo $image2;
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
          <div class="main1" style="background-image: url('<?= $image ?>');">
           <div class="main2">
            <div class="main3">
              <div class="categories">
                <h1>CATEGORIES</h1>
                 <ul>
                 <?php foreach($categories as $key => $category): ?>
                      <li><a href="category.php?ctg=<?= $category['id'] ?>"><?=$category['ctg_name']?></a></li>
                 <?php endforeach; ?>
                </ul>
              </div>
              <div class="info">
                  <h1>Lorem Ipsum</h1>
                  <p class="info_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                    has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                    took a galley of type and scrambled it to make a type specimen book. It has survived not only
                    five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
              </div>
          </div>
        </div>
        </div>
          <div class="articles">
            <p class="lastpub">Latest publications</p>
            <?php foreach($articles2 as $key => $article): ?>
            <div class="article">
                <h2><a href="single.php?id=<?= $article['id']?>"><?= $article['title']?></a></h2>
                <div class="artinfo">
                    <span><?= $article['autor']?></span>
                    <span><?= $article['date']?></span>
                    <p>category: <span class='art_category'><?= $article['ctg_name']?></span></p>
                </div>
                <p class="prevtext"><?= mb_substr($article['art_text'], 0, 150)?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- PAGINATION -->
        <div class="pagination">
        <?php if($index_page > 1): ?>
        <a href="?index_page=<?= $index_page - 1?>"><span class="pag"><?= $index_page - 1 ?></span></a> 
        <?php endif; ?>

        <span class="pag"><?= $index_page ?></span>

        <?php if($index_page < $index_pages): ?>
        <a href="?index_page=<?= $index_page + 1?>"><span class="pag"><?= $index_page + 1 ?></span></a> 
        <?php endif; ?>
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