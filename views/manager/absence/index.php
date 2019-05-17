<?php require_once('../../../controllers/initialize.php'); ?>

<?php $absence_set = find_all_absence(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo url_for('stylesheets/manager.css'); ?>">
    <title>Absence detail</title>
  </head>
  <body>
    <header>
      <h1>Absence Data</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/manager/index.php'); ?>">Menu</a></li>
      </ul>
    </navigation>

    <div id="content">
      <div class="subjects listing">
        <h1>Absence data</h1>
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
            <th>Reason</th>
      	    <th>&nbsp;</th>
      	  </tr>

          <?php while($absence = mysqli_fetch_assoc($absence_set)) { ?>
            <tr>
              <td><?php echo ($absence['id_le']); ?></td>
              <td><?php echo ($absence['name_em']); ?></td>
              <td><?php echo $absence['time_start']; ?></td>
        	    <td><?php echo ($absence['time_end']); ?></td>
              <td><?php echo ($absence['reason']); ?></td>
              <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id']))); ?>">View</a></td>
        	  </tr>
          <?php } ?>
      	</table>

        <?php
          mysqli_free_result($absence_set);
        ?>
      </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>
