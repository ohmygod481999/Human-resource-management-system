<?php require_once('../../../controllers/initialize.php'); ?>

<?php $evaluation_set = find_all_evaluation(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo url_for('stylesheets/manager.css'); ?>">
    <title>Evaluation</title>
  </head>
  <body>
    <header>
      <h1>Evaluation</h1>
    </header>
    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/manager/index.php'); ?>">Menu</a></li>
      </ul>
    </navigation>
    <div id="content">
      <div class="subjects listing">
        <h1>Evaluation</h1>
        <form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <dl>
            <dt>Search</dt>
            <dd><input type="text" name="search_string" value=""></dd>
            <dd><button type="submit" name="search">Search</button> </dd>
          </dl>
        </form>

        <div class="actions">
          <a class="action" href="<?php echo url_for('/manager/evaluation/new.php'); ?>">NEW EVALUATION</a>
        </div>

      	<table class="list">
      	  <tr>
            <th>ID</th>
            <th>Supervisor Name</th>
            <th>Employee Name</th>
      	    <th>Substance</th>
            <th>Date</th>
      	  </tr>

          <?php while($evaluation = mysqli_fetch_assoc($evaluation_set)) { ?>
            <tr>
              <td><?php echo ($evaluation['id_ev']); ?></td>
              <td><?php echo ($evaluation['su']); ?></td>
              <td><?php echo $evaluation['em']; ?></td>
        	    <td><?php echo ($evaluation['substance']); ?></td>
              <td><?php echo ($evaluation['date']); ?></td>

        	  </tr>
          <?php } ?>
      	</table>

        <?php
          mysqli_free_result($evaluation_set);
        ?>
      </div>
    </div>
<?php include(SHARED_PATH . '/footer.php'); ?>
