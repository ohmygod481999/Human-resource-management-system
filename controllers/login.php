<?php
  session_start();
  require_once('initialize.php');
  if (is_post_request()){
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    if ($account = check_login($uname,$pwd)){
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $uname;
      $_SESSION['password'] = $pwd;
      $_SESSION['privilege'] = $account['privilege'];
      echo 'wellcome ';
      switch ($account['privilege']) {
        case 'admin':
          echo 'admin user';
          header("Location: ../views/manager/index.php");
          break;
        case 'user':
          echo 'employee user';
          header("Location: ../views/employees/index.php");
          break;
        default:
          // code...
          break;
      }
    }
    else echo "invalid username or password";
  }
  else {
    exit;
  }

?>
