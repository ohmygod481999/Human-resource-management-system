<?php

require_once('../../../controllers/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/manager/project/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  // Handle form values sent by new.php

  $project = [];
  $project['id_pro'] = $_POST['id_pro'] ?? '';
  $project['name_pro'] = $_POST['name_pro'] ?? '';
  $project['name_de'] = $_POST['name_de'] ?? '';
  $project['budget_pro'] = $_POST['budget_pro'] ?? '';
  $project['location_pro'] = $_POST['location_pro'] ?? '';


  $result = update_project($project);
  if($result === true) {
    //redirect_to(url_for('/staff/subjects/show.php?id=' . $id));
    redirect_to(url_for('/manager/project/index.php'));
  } else {
    $errors = $result;
    //var_dump($errors);
  }

} else {

  $project = find_project_by_id($id);

}

$department_set = find_all_departments();

?>

<?php $page_title = 'Edit Project'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/manager/project/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject edit">
    <h1>Edit Project</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/manager/project/edit.php?id=' . h(u($id))); ?>" method="post">
      <input type="hidden" name="id_pro" value="<?php echo $project['id_pro']; ?>" />
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
        <input type="submit" value="Edit Project" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
