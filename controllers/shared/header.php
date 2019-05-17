<?php
  if(!isset($page_title)) { $page_title = 'Manager Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>HBR - <?php echo ($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/manager.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>Manager Area</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/manager/index.php'); ?>">Menu</a></li>
      </ul>
    </navigation>
