<?php
  function check_login($username, $password){
    $account_set = find_all_account();
    while ($account = mysqli_fetch_assoc($account_set)){
      if ($username == $account['username'] && $password == $account['password']) return $account;
    }
    return false;
  }
?>
