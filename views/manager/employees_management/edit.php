<?php

require_once('../../../controllers/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/manager/employees_management/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  // Handle form values sent by new.php

  $employee = [];
  $employee['id_em'] = $_POST['id_em'] ?? '';
  $employee['name_em'] = $_POST['name_em'] ?? '';
  $employee['name_de'] = $_POST['name_de'] ?? '';
  $employee['name_po'] = $_POST['name_po'] ?? '';
  $employee['age_em'] = $_POST['age_em'] ?? '';
  $employee['email_em'] = $_POST['email_em'] ?? '';


  $result = update_employee($employee);
  if($result === true) {
    //redirect_to(url_for('/staff/subjects/show.php?id=' . $id));
    redirect_to(url_for('/manager/employees_management/index.php'));
  } else {
    $errors = $result;
    //var_dump($errors);
  }

} else {

  $employee = find_employee_by_id($id);

}

$department_set = find_all_departments();

$position_set = find_all_positions();

?>

<?php $page_title = 'Edit Employee'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/manager/employees_management/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject edit">
    <h1>Edit Employee</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/manager/employees_management/edit.php?id=' . h(u($id))); ?>" method="post">
      <input type="hidden" name="id_em" value="<?php echo $employee['id_em']; ?>" />
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
        <input type="submit" value="Edit Employee" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
