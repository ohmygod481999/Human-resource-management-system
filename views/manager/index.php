<?php
  session_start();
  require_once('../../controllers/initialize.php');
  check_logged_in_as_admin();
  $username = $_SESSION['username'];
?>
<?php $page_title = 'Manager menu'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<nav>
  <ul>
    <li>User: <?php echo $username ?></li>
    <li><a href="../../controllers/logout.php">Logout</a></li>
    <li><a href="<?php echo url_for('manager/account/index.php'); ?>">Account</a></li>
  </ul>
</nav>
<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li><a href="<?php echo url_for('/manager/employees_management/index.php'); ?>">Employees management</a></li>
      <li><a href="<?php echo url_for('/manager/project/index.php'); ?>">Project management</a></li>
      <li><a href="<?php echo url_for('/manager/salary/index.php'); ?>">Salary management</a></li>
      <li><a href="<?php echo url_for('/manager/account_management/index.php'); ?>">Account management</a></li>
      <li><a href="<?php echo url_for('/manager/evaluation/index.php'); ?>">Evaluate Employee</a></li>
      <li><a href="<?php echo url_for('/manager/absence/index.php'); ?>">Absence Detail</a></li>
      <li><a href="<?php echo url_for('/manager/training/index.php'); ?>">Training Detail</a></li>
    </ul>
  </div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>
