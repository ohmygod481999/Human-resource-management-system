<?php

require_once('../../../controllers/initialize.php');

if(is_post_request()) {

  $employee = [];
  $employee['id_em'] = $_POST['id_em'] ?? '';
  $employee['name_em'] = $_POST['name_em'] ?? '';
  $employee['name_de'] = $_POST['name_de'] ?? '';
  $employee['name_po'] = $_POST['name_po'] ?? '';
  $employee['age_em'] = $_POST['age_em'] ?? '';
  $employee['email_em'] = $_POST['email_em'] ?? '';

  $result = insert_employee($employee);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    //redirect_to(url_for('/manager/employees_management/show.php?id=' . $new_id));
    redirect_to(url_for('/manager/employees_management/index.php'));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $employee = [];
  $employee['id_em'] = '';
  $employee['name_em'] =  '';
  $employee['name_de'] = '';
  $employee['name_po'] = '';
  $employee['age_em'] = '';
  $employee['email_em'] = '';
}

// $employees_set = find_all_employees();
// $employees_count = mysqli_num_rows($employees_set) + 1;
// mysqli_free_result($employees_set);

$department_set = find_all_departments();

$position_set = find_all_positions();

?>

<?php $page_title = 'Create Employee'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/manager/employees_management/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
    <h1>Create Employee</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/manager/employees_management/new.php'); ?>" method="post">
      <dl>
        <dt>ID</dt>
        <dd><input type="text" name="id_em" value="<?php echo $employee['id_em']; ?>" /></dd>
      </dl>
      <dl>
        <dt>Employee name</dt>
        <dd><input type="text" name="name_em" value="<?php echo $employee['name_em']; ?>" /></dd>
      </dl>
      <dl>
        <dt>Department</dt>
        <dd>
          <select name="name_de">
          <?php
            foreach($department_set as $department) {
              echo '<option value="'.$department['name_de'].'">'.$department['name_de'].'</option>';
              // if($employee["name_de"] == $i) {
              //   echo " selected";
              // }
              // echo ">{$i}</option>";
            }
          ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="name_po">
          <?php
            foreach($position_set as $position) {
              echo '<option value="'.$position['name_po'].'">'.$position['name_po'].'</option>';
            }
          ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Age</dt>
        <dd><input type="text" name="age_em" value="<?php echo $employee['age_em']; ?>" /></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="email_em" value="<?php echo $employee['email_em']; ?>" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Create Employee" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
