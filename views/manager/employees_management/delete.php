<?php

require_once('../../../controllers/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/manager/employees_management/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_employee($id);
  redirect_to(url_for('/manager/employees_management/index.php'));

} else {
  $employee = find_employee_by_id($id);
  echo ($employee['name_em']);
}

?>

<?php $page_title = 'Delete Employee'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/manager/employees_management/index.php'); ?>">&laquo; Back to List</a>

  <div class="employee delete">
    <h1>Delete Employee</h1>
    <p>Are you sure you want to delete this employee?</p>
    <p class="item"><?php echo ($employee['name_em']); ?></p>

    <form action="<?php echo url_for('/manager/employees_management/delete.php?id=' . h(u($employee['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Employee" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
