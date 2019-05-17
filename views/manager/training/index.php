<?php require_once('../../../controllers/initialize.php'); ?>

<?php $training_set = find_all_training(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo url_for('stylesheets/manager.css'); ?>">
    <title>Training detail</title>
  </head>
  <body>
    <header>
      <h1>Training detail</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/manager/index.php'); ?>">Menu</a></li>
      </ul>
    </navigation>

    <div id="content">
      <div class="subjects listing">
        <h1>Training detail</h1>
        <form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <dl>
            <dt>Search</dt>
            <dd><input type="text" name="search_string" value=""></dd>
            <dd><button type="submit" name="search">Search</button> </dd>
          </dl>
        </form>

        <!-- <div class="actions">
          <a class="action" href="<?php //echo url_for('/manager/employees_management/new.php'); ?>">Add New Employees</a>
        </div> -->

      	<table class="list">
      	  <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Time start</th>
      	    <th>Time end</th>
      	    <th>&nbsp;</th>
      	  </tr>

          <?php while($training = mysqli_fetch_assoc($training_set)) { ?>
            <tr>
              <td><?php echo ($training['id_tr']); ?></td>
              <td><?php echo ($training['name_tr']); ?></td>
              <td><?php echo $training['time_start']; ?></td>
        	    <td><?php echo ($training['time_end']); ?></td>
              <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id']))); ?>">View</a></td>
        	  </tr>
          <?php } ?>
      	</table>

        <?php
          mysqli_free_result($training_set);
        ?>
      </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>
