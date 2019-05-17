<?php session_start(); ?>
<?php require_once('../../../controllers/initialize.php'); ?>
<?php
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false){
    echo 'Please login first';
    exit;
  }
  $username = $_SESSION['username'];
  $privilege  = $_SESSION['privilege'];
  //$employee = find_employee_by_username($username);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Account</title>
    <link rel="stylesheet" href="<?php echo url_for('stylesheets/manager.css'); ?>">
  </head>
  <body>
    <header>
      <h1>Account</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/manager/index.php'); ?>">Menu</a></li>
        <li><a href="../../../controllers/logout.php">logout</a></li>
      </ul>
    </navigation>

    <div id="content">
      <dl>
        <dt>Username</dt>
        <dd><?php echo $username ?></dd>
      </dl>
      <dl>
        <dt>Privilege</dt>
        <dd><?php echo $privilege ?></dd>
      </dl>
      <a href="<?php echo url_for('manager/account/change_pwd.php'); ?>">Change password</a>
    </div>
<?php include(SHARED_PATH . '/footer.php'); ?>
