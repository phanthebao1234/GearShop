<?php
    $action = 'home';
    if (isset($_GET['act'])) {
        $action = $_GET['act'];
    }

    switch ($action) {
        case 'home':
            include 'View/home.php';
            break;
        case 'product':
            include 'View/product.php';
            break;
        case 'loai':
            include 'View/menu.php';
            break;
    }

?>