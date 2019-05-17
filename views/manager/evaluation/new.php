<?php require_once('../../../controllers/initialize.php'); ?>
<?php session_start();?>


<?php $employees_set = find_all_employees(); ?>

<?php
  if(isset($_GET['id'])){
    $id_em = $_GET['id'];
    $em = find_employee_by_id($id_em);
    $su = find_employee_by_username($_SESSION['username']);
    $id_su = $su['id_em'];

  }

  if (is_post_request()){
    $id = $_POST['id_ev'];
    $substance = $_POST['substance'];
    $date = $_POST['date'];
    $id_em = $_POST['id_em'];
    $id_su = $_POST['id_su'];

    $evaluation = [];
    $evaluation['id_ev'] = $id;
    $evaluation['id_em'] = $id_em;
    $evaluation['id_su'] = $id_su;
    $evaluation['substance'] = $substance;
    $evaluation['date'] = $date;
    insert_evaluation($evaluation);
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo url_for('stylesheets/manager.css'); ?>">
    <title>New evaluation</title>
  </head>
  <body>
    <header>
      <h1>New evaluation</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/manager/index.php'); ?>">Menu</a></li>
      </ul>
    </navigation>



    <div id="content">
      <a class="back-link" href="<?php echo url_for('/manager/evaluation/index.php'); ?>">&laquo; Back</a>
      <?php if (isset($_GET['id'])){
        $id_em = $_GET['id'];
        $em = find_employee_by_id($id_em);
        $su = find_employee_by_username($_SESSION['username']);
        $id_su = $su['id_em'];
        echo "<h3>". $em['name_em']. "</h3>" ;
        include('form_eva.php');
      }
      ?>
      <div class="listing">
        <h2>Choose employee</h2>
        <ul>
          <?php while($employee = mysqli_fetch_assoc($employees_set)) { ?>
            <li><a href="<?php echo url_for('manager/evaluation/new.php?id=').$employee['id_em']; ?>"><?php echo $employee['name_em']; ?></a></li>
          <?php } ?>
        </ul>
      </div>
    </div>

<?php include(SHARED_PATH . '/footer.php') ?>
