<?php
$action="thongke";
if(isset($_GET['act']))
    {
    $action=$_GET['act'];
    }
switch($action) {
    case 'thongke':
        include 'View/thongke.php';
        break;
}
?>