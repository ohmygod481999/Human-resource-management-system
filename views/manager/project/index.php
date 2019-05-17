<?php require_once('../../../controllers/initialize.php'); ?>
<?php
  session_start();
  check_logged_in_as_admin();
  $project_set = find_all_project();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo url_for('stylesheets/manager.css'); ?>">
    <title>Project management</title>
  </head>
  <body>
    <header>
      <h1>Project management</h1>
    </header>
    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/manager/index.php'); ?>">Menu</a></li>
      </ul>
    </navigation>

    <div id="content">
      <div class="subjects listing">
        <h1>Projects</h1>

        <div class="actions">
          <a class="action" href="<?php echo url_for('/manager/project/new.php'); ?>">Add New Project</a>
        </div>

      	<table class="list">
      	  <tr>
            <th>ID</th>
            <th>Name Project</th>
            <th>Submit to</th>
      	    <th>Budget</th>
            <th>Location</th>
      	    <th>&nbsp;</th>
            <th>&nbsp;</th>
      	    <th>&nbsp;</th>
      	  </tr>

          <?php while($project = mysqli_fetch_assoc($project_set)) { ?>
            <tr>
              <td><?php echo ($project['id_pro']); ?></td>
              <td><?php echo ($project['name_pro']); ?></td>
              <td><?php echo $project['name_de']; ?></td>
        	    <td><?php echo ($project['budget_pro']); ?></td>
              <td><?php echo ($project['location_pro']); ?></td>
              <td><a class="action" href="<?php echo url_for('/manager/project/show.php?id=' . h(u($subject['id']))); ?>">View</a></td>
              <td><a class="action" href="<?php echo url_for('/manager/project/delete.php?id=' . $project['id_pro'] ); ?>">Delete</a></td>
              <td><a class="action" href="<?php echo url_for('/manager/project/edit.php?id=' . $project['id_pro'] ); ?>">Edit</a></td>
        	  </tr>
          <?php } ?>
      	</table>

        <?php
          mysqli_free_result($project_set);
        ?>
      </div>
    </div>


<?php include(SHARED_PATH . '/footer.php'); ?>
