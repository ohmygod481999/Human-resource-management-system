<?php session_start() ?>
<?php require_once('../../../controllers/initialize.php'); ?>
<?php
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false){
    echo 'Please login first';
    exit;
  }
  $username = $_SESSION['username'];
  $current_pwd = $_SESSION['password'];
  $privilege  = $_SESSION['privilege'];
  //$employee = find_employee_by_username($username);

?>
<?php
  if (is_post_request()){
    $old_pwd = $_POST['oldpwd'];
    $new_pwd = $_POST['newpwd'];
    $new_pwd_cf = $_POST['newpwdcf'];
    if ($old_pwd == $current_pwd){
      if ($new_pwd == $new_pwd_cf){
        change_pwd($username,$new_pwd);
        echo "changed pass</br>";
        echo "<a href='" . url_for('index.php') . "'>Login</a>";
        exit;
      }
      else {
        redirect_to(url_for("manager/account/change_pwd.php?error='confirm-pass-wrong'"));
      }
    }
    else {
      redirect_to(url_for("manager/account/change_pwd.php?error=current-pass-wrong"));
    }
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Change password</title>
    <link rel="stylesheet" href="<?php echo url_for('stylesheets/manager.css'); ?>">
  </head>
  <body>
    <header>
      <h1>Change password</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="../index.php">Menu</a></li>
        <li><a href="../../../controllers/logout.php">logout</a></li>
      </ul>
    </navigation>

    <div id="content">
      <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <dl>
          <dt>Current password</dt>
          <dd><input type="password" name="oldpwd" value="" required></dd>
        </dl>
        <dl>
          <dt>New password</dt>
          <dd><input type="password" name="newpwd" value="" required></dd>
        </dl>
        <dl>
          <dt>Confirm new password</dt>
          <dd><input type="password" name="newpwdcf" value="" required></dd>
        </dl>
        <input type="submit" value="Change password"/>
      </form>
    </div>


<?php include(SHARED_PATH . '/footer.php') ?>
