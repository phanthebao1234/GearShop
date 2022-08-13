<?php
  include 'Model/cart.php';
  include 'Model/thuonghieu.php';
  set_include_path(get_include_path().PATH_SEPARATOR.'Model/');
  spl_autoload_extensions('.php');// phần mở rộng
  spl_autoload_register();
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home page</title>
    <link
      rel="stylesheet"
      href="https://kit-pro.fontawesome.com/releases/v5.12.0/css/pro.min.css"
    />
    
    <link rel="stylesheet" href="Content/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Content/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="Content/css/owl.theme.default.min.css" />
    <!-- <link rel="stylesheet" href="Content/css/owl.carousel.css">
    <link rel="stylesheet" href="Content/css/owl.theme.css"> -->
    <link rel="stylesheet" href="Content/css/reset.css" />
    <link rel="stylesheet" href="Content/css/home.css" />
    
  </head>
  <body>
    <?php include 'View/banner.php';?>


    <?php
      $ctrl = 'home';
      if (isset($_GET['action'])) {
        $ctrl = $_GET['action'];
      }
      include 'Controller/'.$ctrl.'.php';
    ?>



    <?php
        include 'View/footer.php';
    ?>
        <?php 
        include 'View/scripts.php';
    ?>
  </body>
</html>
