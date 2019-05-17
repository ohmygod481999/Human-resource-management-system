<?php require_once('../../../controllers/initialize.php'); ?>
<?php session_start();
  $username = $_SESSION['username'];
  $employee = find_employee_by_username($username);
  $id = $employee['id_em'];
?>

<?php
if(is_post_request()) {

  $absence = [];
  $absence['id_le'] = $_POST['id_le'] ?? '';
  $absence['id_em'] = $_POST['id_em'] ?? '';
  $absence['time_start'] = $_POST['time_start'] ?? '';
  $absence['time_end'] = $_POST['time_end'] ?? '';
  $absence['reason'] = $_POST['reason'] ?? '';

  $result = insert_absence($absence);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    echo "Requested absence!";
    //redirect_to(url_for('/employee/absence/index.php'));
  } else {
    $errors = $result;
  }

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo url_for('stylesheets/manager.css'); ?>">
    <title>Absence Request</title>
  </head>
  <body>
    <header>
      <h1>Absence Request</h1>
    </header>

    <div id="content">
      <a class="back-link" href="<?php echo url_for('/employees/index.php'); ?>">&laquo; Back</a>

      <div class="subject new">
        <h1>Absence request</h1>

        <?php echo display_errors($errors); ?>

        <form action="<?php echo url_for('/employees/absence/index.php'); ?>" method="post">
          <input type="hidden" name="id_em" value="<?php echo $id; ?>">
          <dl>
            <dt>ID</dt>
            <dd><input type="text" name="id_le" value=""></dd>
          </dl>
          <dl>
            <dt>Time start</dt>
            <dd><input type="date" name="time_start" value="" /></dd>
          </dl>
          <dl>
            <dt>Time end</dt>
            <dd><input type="date" name="time_end" value="" /></dd>
          </dl>
          <dl>
            <dt>Reson</dt>
            <dd><input type="text" name="reason" value=""> </dd>
          </dl>

          <div id="operations">
            <input type="submit" value="Absence Request" />
          </div>
        </form>

      </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>
