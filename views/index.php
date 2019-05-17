<?php require_once('../controllers/initialize.php'); ?>

<?php include(SHARED_PATH. '/header.php'); ?>
    <div id="content">
      <h1>Login</h1>
      <form class="" action="../controllers/login.php" method="post">
        <div class="container">
          <dl>
            <dt>Username</dt>
            <dd><input type="text" placeholder="Enter Username" name="uname" required></dd>
          </dl>

          <dl>
            <dt>Password</dt>
            <dd><input type="password" placeholder="Enter Password" name="pwd" required></dd>
          </dl>

          <button type="submit">Login</button>
        </div>
      </form>
    </div>
<?php include(SHARED_PATH. '/footer.php'); ?>
