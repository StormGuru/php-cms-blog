<header class="header">
          <div class="headtop">   
          <?php if($_SESSION['admin']): ?>
            <div class="sign_s">
                  <a href="#"><?= $_SESSION['login']?></a>
                  <a href="admin/admin.php">Admin panel</a>
                  <a href="out.php">Exit</a>
              </div>
              <?php elseif($_SESSION['login']): ?>
                <div class="sign_s">
                  <a href="#"><?= $_SESSION['login']?></a>
                  <a href="out.php">Exit</a>
              </div>
              <?php else: ?>
                <div class="sign">
                  <a href="reg.php">Sign up</a>
                  <a href="aut.php">Sign in</a>
              </div>
                <?php endif; ?>
              <div class="search">
                <form action="../../search.php" method="POST">
                  <input type="text" placeholder="search" name="search">
              </form>
              </div>
          </div>
          <div class="logo">
          <a href="index.php" target="_blank">MyBlog</a>
          </div>
      </header>