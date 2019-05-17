<?php

require_once('../../../controllers/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/manager/account_management/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_account($id);
  redirect_to(url_for('/manager/account_management/index.php'));

}

?>

<?php $page_title = 'Delete Account'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/manager/account_management/index.php'); ?>">&laquo; Back to List</a>

  <div class="employee delete">
    <h1>Delete Account</h1>
    <p>Are you sure you want to delete this account?</p>
    <p class="item"><?php echo ($employee['name_em']); ?></p>

    <form action="<?php echo url_for('/manager/account_management/delete.php?id=' . $id); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Account" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
