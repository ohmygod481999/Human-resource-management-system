<?php

require_once('../../../controllers/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/manager/project/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_project($id);
  redirect_to(url_for('/manager/project/index.php'));

} else {
  $project = find_project_by_id($id);
  //echo ($project['name_pro']);
}

?>

<?php $page_title = 'Delete Project'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/manager/project/index.php'); ?>">&laquo; Back to List</a>

  <div class="employee delete">
    <h1>Delete Project</h1>
    <p>Are you sure you want to delete this project?</p>
    <p class="item"><?php echo ($employee['name_pro']); ?></p>

    <form action="<?php echo url_for('/manager/project/delete.php?id=' . h(u($project['id_pro']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Project" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
