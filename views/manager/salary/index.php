<?php require_once('../../../controllers/initialize.php'); ?>
<?php
  $salary_Set = find_all_salary();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo url_for('stylesheets/manager.css'); ?>">
    <title>Salary management</title>
  </head>
  <body>
    <header>
      <h1>Salary management</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/manager/index.php'); ?>">Menu</a></li>
      </ul>
    </navigation>

    <div id="content">
      <div class="subjects listing">
        <h1>Salary</h1>

      	<table class="list">
      	  <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Salary</th>
      	    <th>Thưởng</th>
            <th>Phạt</th>
      	    <th>&nbsp;</th>
      	  </tr>

          <?php while($salary = mysqli_fetch_assoc($salary_Set)) { ?>
            <tr>
              <td><?php echo ($salary['id_em']); ?></td>
              <td><?php echo ($salary['name_em']); ?></td>
              <td><?php echo $salary['luong']; ?></td>
        	    <td><?php echo ($salary['thuong']); ?></td>
              <td><?php echo ($salary['phat']); ?></td>
              <td><a class="action" href="<?php echo url_for('/manager/employees_management/edit.php?id=' . $employees['id_em'] ); ?>">Set</a></td>
        	  </tr>
          <?php } ?>
      	</table>

        <?php
          mysqli_free_result($salary_Set);
        ?>
      </div>
    </div>


<?php include(SHARED_PATH . '/footer.php'); ?>
