<?php session_start(); ?>
<?php require_once('../../controllers/initialize.php'); ?>
<?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $username = $_SESSION['username'];
  }
  else {
    redirect_to(url_for('index.php'));
    //header('Locaion : ../index.php');
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo url_for('stylesheets/manager.css'); ?>">
    <title>Employee zone</title>
  </head>
  <body>
    <header>
      <h1>Employee</h1>
    </header>
    <div id='content'>
      <div class="">
        <dl>
          <dt>User name:</dt>
          <dd><?php echo $username; ?></dd>
          <dd><a href="../../controllers/logout.php">logout</a></dd>
        </dl>
        <h2>Menu</h2>
        <ul>
          <li><a href="<?php echo url_for('employees/information/index.php'); ?>">Information</a></li>
          <li><a href="<?php echo url_for('employees/account/index.php'); ?>">Account</a></li>
          <li><a href="<?php echo url_for('employees/training/index.php'); ?>">Training</a></li>
        </ul>
      </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>
