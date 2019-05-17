<?php

require_once('../../../controllers/initialize.php');

if(is_post_request()) {

  $project = [];
  $project['id_pro'] = $_POST['id_pro'] ?? '';
  $project['name_pro'] = $_POST['name_pro'] ?? '';
  $project['name_de'] = $_POST['name_de'] ?? '';
  $project['budget_pro'] = $_POST['budget_pro'] ?? '';
  $project['location_pro'] = $_POST['location_pro'] ?? '';

  $result = insert_project($project);
  if($result === true) {
    //$new_id = mysqli_insert_id($db);
    //redirect_to(url_for('/manager/employees_management/show.php?id=' . $new_id));
    redirect_to(url_for('/manager/project/index.php'));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $project = [];
  $project['id_pro'] = '';
  $project['name_pro'] =  '';
  $project['name_de'] = '';
  $project['budget_pro'] = '';
  $project['location_pro'] = '';
}

// $employees_set = find_all_employees();
// $employees_count = mysqli_num_rows($employees_set) + 1;
// mysqli_free_result($employees_set);

$department_set = find_all_departments();

?>

<?php $page_title = 'Create Project'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/manager/project/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
    <h1>Create Project</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/manager/project/new.php'); ?>" method="post">
      <dl>
        <dt>ID</dt>
        <dd><input type="text" name="id_pro" value="<?php echo $project['id_pro']; ?>" /></dd>
      </dl>
      <dl>
        <dt>Project name</dt>
        <dd><input type="text" name="name_pro" value="<?php echo $project['name_pro']; ?>" /></dd>
      </dl>
      <dl>
        <dt>Submit to</dt>
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
        <dt>Budget</dt>
        <dd><input type="number" name="budget_pro" value="<?php echo $project['budget_pro']; ?>" /></dd>
      </dl>
      <dl>
        <dt>Location</dt>
        <dd><input type="text" name="location_pro" value="<?php echo $project['location_pro']; ?>" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Create Project" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
