<?php require_once('../../../controllers/initialize.php'); ?>

<?php
  if (is_post_request()){
    $name = $_POST['search_string'];
    $employees_set = search_employee($name);
  }
  else {
    $employees_set = find_all_employees();
  }

?>
<?php $page_title = 'Employees management'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
  <div class="subjects listing">
    <h1>Employees</h1>
    <form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
      <dl>
        <dt>Search</dt>
        <dd><input type="text" name="search_string" value=""></dd>
        <dd><button type="submit" name="search">Search</button> </dd>
      </dl>
    </form>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/manager/employees_management/new.php'); ?>">Add New Employees</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Department</th>
  	    <th>Position</th>
        <th>Age</th>
        <th>Email</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
  	  </tr>

      <?php while($employees = mysqli_fetch_assoc($employees_set)) { ?>
        <tr>
          <td><?php echo ($employees['id_em']); ?></td>
          <td><?php echo ($employees['name_em']); ?></td>
          <td><?php echo $employees['name_de']; ?></td>
    	    <td><?php echo ($employees['name_po']); ?></td>
          <td><?php echo ($employees['age_em']); ?></td>
          <td><?php echo ($employees['email_em']); ?></td>
          <td><a class="action" href="<?php echo url_for('/manager/employees_management/edit.php?id=' . $employees['id_em'] ); ?>">Edit</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($employees_set);
    ?>
  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
