<?php session_start() ?>
<?php require_once('../../../controllers/initialize.php'); ?>
<?php
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false){
    echo 'Please login first';
    exit;
  }
  $username = $_SESSION['username'];
  $employee = find_employee_by_username($username);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Information</title>
    <link rel="stylesheet" href="<?php echo url_for('stylesheets/manager.css'); ?>">
  </head>
  <body>
    <header>
      <h1>Information</h1>
    </header>
    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/employees/index.php'); ?>">Menu</a></li>
        <li><a href="../../../controllers/logout.php">logout</a></li>
      </ul>
    </navigation>
    <div id = "content">
      <div id="information">
        <dl>
          <dt>Name :</dt>
          <dd><?php echo $employee['name_em']; ?></dd>
        </dl>
        <dl>
          <dt>ID :</dt>
          <dd><?php echo $employee['id_em']; ?></dd>
        </dl>
        <dl>
          <dt>Department :</dt>
          <dd><?php echo $employee['name_de']; ?></dd>
        </dl>
        <dl>
          <dt>Position :</dt>
          <dd><?php echo $employee['name_po']; ?></dd>
        </dl>
        <dl>
          <dt>Age :</dt>
          <dd><?php echo $employee['age_em']; ?></dd>
        </dl>
        <dl>
          <dt>Email :</dt>
          <dd><?php echo $employee['email_em']; ?></dd>
        </dl>
      </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>
