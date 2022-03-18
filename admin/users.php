<?php 
 include '../app/include/db.php'; 
 include '../app/controllers/users.php'; 
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
         <h1>USERS</h1>
         <div class="add"><a href="add_user.php">Add new user</a></div>
        <table>
         <tr>
            <th >ID</th>
            <th>LOGIN</th>
            <th>PASSWORD</th>
            <th>DATE</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        <?php foreach($users as $key => $user): ?>
        <tr>
            <td><?=$user['id']?></td>
            <td><?=$user['login']?></td>
            <td><?=$user['password']?></td>
            <td><?=$user['create_date']?></td>
            <td><a href="edit_user.php?id=<?=$user['id']?>" class="forestgreen">edit</a></td>
            <td><a href="edit_user.php?del_id=<?=$user['id']?>" class="red">delete</a></td>
        </tr>
        <?php endforeach; ?>
       </table>
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