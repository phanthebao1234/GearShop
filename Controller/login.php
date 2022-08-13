<?php
$action="login";
if(isset($_GET['act']))
{
  $action=$_GET['act'];
}
switch($action){
  case "login":
    include 'View/login.php';
    break;
  case "login_action":
    // khi click nút đang nhập gửi thông tin
    //$_POST['txtusername'=>'nguyen','txtpassword'=>'123']
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $user_number=$_POST['user_number'];
      $user_password=$_POST['user_password'];
      // vì mật khẩu đã đc mã hóa nên khi đăng nhập phải mã hóa mật khẩu đăng nhập, sau đó mới so sánh đc
      $ctypt=md5($user_password);
    }
    // ai kiểm tra thông người dùng có hay không?=> model
    $ur=new User();
    $log=$ur->login($user_number,$ctypt);
    // $log[7,NGuyên, nguyen, 20sdrdf...,nguyen@gmail.com]
    // session để trao đổi dữ liệu từ tang này qua tang khác
    // thông tin lưu lại trên session và chuyển cho các trang khác nhau
    if($log==true)
    {
      // trường hợp đang nhập có thông tin
      $_SESSION['user_id']=$log['user_id'];//$log[0] vì nó trả về là dạng mảng
      $_SESSION['user_name']=$log['user_name'];
      $_SESSION['user_number']=$log['username'];
      $_SESSION['matkhau']=$log['matkhau'];
      $_SESSION['email']=$log['email'];
      $_SESSION['diahchi']=$log['diahchi'];
      $_SESSION['sodienthoai']=$log['sodienthoai'];
      echo '<script> alert("Đăng nhập thành công");</script>';
      // thẻ meta load lại trang trong thời gian 0 giây
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
    }
    else
    {
      echo '<script> alert("Đăng nhập không thành công");</script>';
      include "View/login.php";
    }
    break;
  case "logout":
    if(isset($_SESSION['user_id'])&&isset($_SESSION['user_name']))
    {
      //unset dùng để loại bỏ 1 phần tử trong mảng
      // là loại bỏ 1 hoặc nhiều biến đc truyền vào, hoặc cũng đc sử dụng để loại bỏ 1 phần tử xác định trong mảng
      // cú pháp unset($var)
      // ví dụ: array=['php','angularjs','nodejs']=>unset($array[1])
      // array=['php','nodejs']
      //lưu ý: nếu 1 biến toàn cục thì unset xóa trong 1 hàm đó, biến đó chỉ loại trong hàm đó thôi, để xóa biến toàn
      // cục trong hàm sử dụng mảng $GOBALS
      // ví dụ"
      // function testA()
      //    unset($GLOBAL['test'])
      // $test='abc.com';
      // testA()=> ở trong pt này rỗng
      unset($_SESSION['user_id']);
      unset($_SESSION['user_name']);
      unset($_SESSION['user_number']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_password']);
      unset($_SESSION['user_address']);

      // cách 2
      session_destroy();
    }
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
    break;

}
?>