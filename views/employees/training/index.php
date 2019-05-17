<?php require_once('../../../controllers/initialize.php'); ?>
<?php
  session_start();
  $username = $_SESSION['username'];
  $employee = find_employee_by_username($username);
  $id = $employee['id_em'];

  $training_set = find_trainings_by_id_employee($id);
  $training_set_avai = find_all_training();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo url_for('stylesheets/manager.css'); ?>">
    <title></title>
  </head>
  <body>
    <header>
      <h1>Training</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/employees/index.php'); ?>">Menu</a></li>
        <li><a href="../../../controllers/logout.php">logout</a></li>
      </ul>
    </navigation>

    <div id="content">
      <div>
        <h2>List training you joined</h2>
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
              <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id_tr=' . h(u($subject['id']))); ?>">View</a></td>
        	  </tr>
          <?php } ?>
      	</table>
      </div>
      <div>
        <h2>List traning available</h2>
        <table class="list">
      	  <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Time start</th>
      	    <th>Time end</th>
      	    <th>&nbsp;</th>
      	  </tr>

          <?php while($training = mysqli_fetch_assoc($training_set_avai)) { ?>
            <tr>
              <td><?php echo ($training['id_tr']); ?></td>
              <td><?php echo ($training['name_tr']); ?></td>
              <td><?php echo $training['time_start']; ?></td>
        	    <td><?php echo ($training['time_end']); ?></td>
              <td><a class="action" href="<?php echo url_for('/employees/training/join.php?id_tr=' .$training['id_tr'] . '&&id_em=' . $id); ?>">Join</a></td>
        	  </tr>
          <?php } ?>
      	</table>
      </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>
