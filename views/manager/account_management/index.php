<?php require_once('../../../controllers/initialize.php'); ?>

<?php $account_set = find_all_account(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo url_for('stylesheets/manager.css'); ?>">
    <title>Account Management</title>
  </head>
  <body>
    <header>
      <h1>Account Management</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/manager/index.php'); ?>">Menu</a></li>
      </ul>
    </navigation>

    <div id="content">
      <div class="subjects listing">
        <h1>Accounts</h1>

        <div class="actions">
          <a class="action" href="<?php echo url_for('/manager/account_management/new.php'); ?>">Add New Account</a>
        </div>

      	<table class="list">
      	  <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
      	    <th>Password</th>
            <th>Privilege</th>
      	    <th>&nbsp;</th>
      	  </tr>

          <?php while($account = mysqli_fetch_assoc($account_set)) { ?>
            <tr>
              <td><?php echo ($account['id_em']); ?></td>
              <td><?php echo ($account['name_em']); ?></td>
              <td><?php echo $account['username']; ?></td>
        	    <td><?php echo ($account['password']); ?></td>
              <td><?php echo ($account['privilege']); ?></td>
              <td><a class="action" href="<?php echo url_for('/manager/account_management/delete.php?id=' . $account['id_em'] ); ?>">Delete</a></td>
        	  </tr>
          <?php } ?>
      	</table>

        <?php
          mysqli_free_result($account_set);
        ?>
      </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>
