<?php

require_once('../../../controllers/initialize.php');

if(is_post_request()) {

  $account = [];
  $account['id_em'] = $_POST['id_em'] ?? '';
  $account['username'] = $_POST['username'] ?? '';
  $account['password'] = $_POST['password'] ?? '';
  $account['privilege'] = $_POST['privilege'] ?? '';

  $result = insert_account($account);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    //redirect_to(url_for('/manager/employees_management/show.php?id=' . $new_id));
    redirect_to(url_for('/manager/account_management/index.php'));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $account = [];
  $account['id_em'] = '';
  $account['username'] =  '';
  $account['password'] = '';
  $account['privilege'] = '';
}

 $employees_set = find_all_employees();
// $employees_count = mysqli_num_rows($employees_set) + 1;
// mysqli_free_result($employees_set);


?>

<?php $page_title = 'Create Employee'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/manager/account_management/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
    <h1>Create Account</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/manager/account_management/new.php'); ?>" method="post">
      <dl>
        <dt>ID employee</dt>
        <dd>
          <select name="id_em">
          <?php
            foreach($employees_set as $employee) {
              echo '<option value="'.$employee['id_em'].'">'.$employee['id_em'].'</option>';
            }
          ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Username</dt>
        <dd><input type="text" name="username" value="<?php echo $employee['username']; ?>" /></dd>
      </dl>
      <dl>
        <dt>Password</dt>
        <dd><input type="password" name="password" value="<?php echo $employee['password']; ?>" /></dd>
      </dl>
      <dl>
        <dt>Privilege</dt>
        <dd><select class="" name="privilege">
          <option value="admin">admin</option>
          <option value="user">user</option>
        </select> </dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Create Account" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
