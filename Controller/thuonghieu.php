<?php
    $action = 'thuonghieu';
    if (isset($_GET['act'])) {
        $action = $_GET['act'];
    }
    switch ($action) {
        case 'thuonghieu':
            include 'View/thuonghieu.php';
            break;
        
        
    }
?>