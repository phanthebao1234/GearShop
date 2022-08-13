<?php
    include "Model/connect.php";
    include "Model/sanpham.php";
    include "Model/uploadhinh.php";
    include "Model/loginadmin.php";
    include "Model/user.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GearVN Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="Content/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="Content/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Content/css/loginadmin.css">

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
            if(isset($_SESSION['adminname'])){
                include "View/navbar.php";
            }
        ?>
        

        <?php
            $ctrl="login";
            
            if(isset($_GET['action']))
            {
                $ctrl=$_GET['action'];
            }
            include 'Controller/'.$ctrl.'.php';
            
        ?>
        

        
    </div>

    <?php include "View/script.php"?>
</body>

</html>