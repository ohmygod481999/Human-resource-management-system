<?php
function join_training($id_em,$id_tr){
  global $db;
  $sql = "INSERT INTO `train` (`id_em`, `id_tr`, `evaluation`) VALUES ('$id_em', '$id_tr', NULL);";
  $result = mysqli_query($db,$sql);
  return $result;
}

function find_trainings_by_id_employee($id){
  global $db;

  $sql = "SELECT training.*,train.* from training INNER JOIN train ON training.id_tr = train.id_tr WHERE id_em = $id";
  $result = mysqli_query($db,$sql);

  return $result;
}

function find_all_training() {
  global $db;

  $sql = "SELECT * FROM training ";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  //confirm_result_set($result);
  return $result;
}

function find_all_absence(){
  global $db;

  $sql = "SELECT leave_details.*,employees.name_em FROM leave_details INNER JOIN employees ON leave_details.id_em = employees.id_em";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  //confirm_result_set($result);
  return $result;
}


  function find_all_evaluation(){
    global $db;

    $sql = "SELECT employees.name_em as su, tbl.* from employees INNER JOIN (SELECT evaluation.*,employees.name_em as em FROM evaluation INNER JOIN employees ON evaluation.id_em = employees.id_em) as tbl ON employees.id_em = tbl.id_su";

    //echo $sql;
    $result = mysqli_query($db, $sql);
    //confirm_result_set($result);
    return $result;
  }

function find_all_account(){
  global $db;

  $sql = "SELECT account.*,employees.name_em FROM account INNER JOIN employees ON account.id_em = employees.id_em";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  //confirm_result_set($result);
  return $result;
}

function search_employee($name){
  global $db;

  $sql = "SELECT * FROM employees WHERE name_em LIKE '%$name%'";

  $result = mysqli_query($db,$sql);

  return $result;

}

function find_all_salary(){
  global $db;

  $sql = "SELECT salary.*,employees.name_em FROM salary INNER JOIN employees ON salary.id_em = employees.id_em";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  //confirm_result_set($result);
  return $result;
}


function find_all_project(){
  global $db;

  $sql = "SELECT * FROM projects ";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  //confirm_result_set($result);
  return $result;
}

function change_pwd($username, $new_pwd){
  global $db;

  $sql = "UPDATE account set password = '$new_pwd' WHERE username = '$username'";

  $result = mysqli_query($db,$sql);

  if ($result){
    return true;
  }
  else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function find_employee_by_username($username){
    global $db;

    $sql = "SELECT employees.* FROM account INNER JOIN employees ON account.id_em = employees.id_em WHERE account.username = '$username'";

    $result = mysqli_query($db, $sql);

    $employee = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    return $employee;
}


// function find_all_account(){
//   global $db;
//
//   $sql = "SELECT * FROM account ";
//   //echo $sql;
//   $result = mysqli_query($db, $sql);
//   //confirm_result_set($result);
//   return $result;
// }

function find_all_employees() {
  global $db;

  $sql = "SELECT * FROM employees ";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  //confirm_result_set($result);
  return $result;
}

function find_all_departments() {
  global $db;

  $sql = "SELECT * FROM department ";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  //confirm_result_set($result);
  return $result;
}

function find_all_positions() {
  global $db;

  $sql = "SELECT * FROM position ";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  //confirm_result_set($result);
  return $result;
}

function insert_employee($employee){
  global $db;

  $id = $employee['id_em'];
  $name = $employee['name_em'];
  $de = $employee['name_de'];
  $po = $employee['name_po'];
  $age = $employee['age_em'];
  $email = $employee['email_em'];

  $sql = "INSERT INTO employees (`id_em`, `name_em`, `name_de`, `name_po`, `age_em`, `email_em`) VALUES ('$id','$name','$de','$po','$age','$email')";
  $result = mysqli_query($db,$sql);

  if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

function insert_project($project){
  global $db;

  $id = $project['id_pro'];
  $name = $project['name_pro'];
  $de = $project['name_de'];
  $budget = $project['budget_pro'];
  $location = $project['location_pro'];

  $sql = "INSERT INTO projects (`id_pro`, `name_de`, `name_pro`, `budget_pro`, `location_pro`) VALUES ('$id','$de','$name',$budget,'$location')";
  //echo $sql;
  $result = mysqli_query($db,$sql);

  if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

function insert_evaluation($evaluation){
  global $db;

  $id = $evaluation['id_ev'];
  $em = $evaluation['id_em'];
  $su = $evaluation['id_su'];
  $substance = $evaluation['substance'];
  $date = $evaluation['date'];

  $sql = "INSERT INTO evaluation (`id_ev`, `id_em`, `id_su`, `substance`, `date`) VALUES ('$id','$em','$su','$substance','$date')";
  //echo $sql;
  $result = mysqli_query($db,$sql);

  if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

function insert_account($account){
  global $db;

  $id = $account['id_em'];
  $username = $account['username'];
  $password = $account['password'];
  $privilege = $account['privilege'];

  $sql = "INSERT INTO account (`id_em`, `username`, `password`, `privilege`) VALUES ('$id','$username','$password','$privilege')";
  //echo $sql;
  $result = mysqli_query($db,$sql);

  if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

function insert_absence($absence){
  global $db;

  $id_le = $absence['id_le'];
  $id_em = $absence['id_em'];
  $time_start = $absence['time_start'];
  $time_end = $absence['time_end'];
  $reason = $absence['reason'];

  $sql = "INSERT INTO leave_details (`id_le`, `id_em`, `time_start`, `time_end`, `reason`) VALUES ('$id_le','$id_em','$time_start','$time_end','$reason')";
  //echo $sql;
  $result = mysqli_query($db,$sql);

  if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

  function update_employee($employee){
    global $db;

    $id = $employee['id_em'];
    $name = $employee['name_em'];
    $de = $employee['name_de'];
    $po = $employee['name_po'];
    $age = $employee['age_em'];
    $email = $employee['email_em'];

    $sql = "UPDATE employees set name_em = '$name', name_de = '$de', name_po = '$po', age_em = '$age', email_em = '$email' WHERE id_em = '$id'";
    $result = mysqli_query($db,$sql);

    if($result) {
        return true;
      } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
  }

  function update_project($project){
    global $db;

    $id = $project['id_pro'];
    $name = $project['name_pro'];
    $de = $project['name_de'];
    $budget = $project['budget_pro'];
    $location = $project['location_pro'];

    $sql = "UPDATE projects set name_pro = '$name', name_de = '$de', budget_pro = '$budget', location_pro = '$location' WHERE id_pro = '$id'";
    $result = mysqli_query($db,$sql);

    if($result) {
        return true;
      } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
  }
function delete_project($id) {
    global $db;

    $sql = "DELETE FROM projects ";
    $sql .= "WHERE id_pro='" .$id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function delete_account($id) {
      global $db;

      $sql = "DELETE FROM account ";
      $sql .= "WHERE id_em='" .$id . "' ";
      $sql .= "LIMIT 1";
      $result = mysqli_query($db, $sql);

      // For DELETE statements, $result is true/false
      if($result) {
        return true;
      } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }

function find_employee_by_id($id) {
  global $db;

  $sql = "SELECT * FROM employees ";
  $sql .= "WHERE id_em='" . $id . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  //confirm_result_set($result);
  $employee = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $employee; // returns an assoc. array
}

function find_project_by_id($id) {
  global $db;

  $sql = "SELECT * FROM projects ";
  $sql .= "WHERE id_pro='" . $id . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  //confirm_result_set($result);
  $project = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $project;
}
?>
