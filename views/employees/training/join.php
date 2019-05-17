<?php

require_once('../../../controllers/initialize.php');

if(is_post_request()) {

  $id_em = $_POST['id_em'];
  $id_tr = $_POST['id_tr'];
  $result = join_training($id_em,$id_tr);
  if ($result) redirect_to(url_for('/employees/training/index.php'));
  else{
    echo "cant join";
    exit;
  }

} else {

}
if(!isset($_GET['id_tr']) && !isset($_GET['id_em']) ) {
  redirect_to(url_for('/employees/training/index.php'));
}
$id_tr = $_GET['id_tr'];
$id_em = $_GET['id_em'];


?>

<?php $page_title = 'Join training'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/employees/training/index.php'); ?>">&laquo; Back to List</a>

  <div class="employee delete">
    <h1>Join a training</h1>
    <p>Are you sure you want to join this training?</p>
    <p class="item"><?php echo ($training['name_tr']); ?></p>

    <form action="<?php echo url_for('/employees/training/join.php'); ?>" method="post">
      <div id="operations">
        <input type="hidden" name="id_em" value="<?php echo $id_em; ?>">
        <input type="hidden" name="id_tr" value="<?php echo $id_tr; ?>">
        <?php //echo $id_tr . " " . $id_em; ?>
        <!-- <input type="submit" name="commit" value="Join" /> -->
        <button type="submit" name="button">Join</button>
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
