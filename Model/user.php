<?php
class User{
  var $user_id=0;// vì mã kh kiểu số
  var $user_name=null;// vì kiểu chuỗi
  var $user_number=null;
  var $user_password=null;
  var $user_email=null;
  var $user_address=null;
  // hàm tạo
  public function __construct()
  {
    
  }
  // thực hiện pt insert vào database
  //dạng cơ bản: ai sẽ thực thi câu lệnh insert-> phải là pt exec
  // muốn chèn đc vào database thì phải có dữ liệu, dữ liệu cần đưa vào bảng kh là
  function InsertUser1($user_name,$user_number,$user_email,$user_password,$user_address)//(an thịnh, anthinh,đã đc mã,an@gmail.com,hcm,123456)
  {
    // tại sao ko tryueefn vào makh và vai trò : vì makh tự tăng và cái vai trò trong database là default
    // b1: connnect với database
    $db=new connect();
    // b2: yêu cầu insert vào database
    $query="insert into user(user_id,user_name,user_number,user_email,user_password,user_address)
    values(NULL,'$user_name','$user_number','$user_email','$user_password','$user_address')";
    // b3: gửi câu query này qua pt bên lớp connect tên là  getexec($query)
    echo $query;
    $stm=$db->getexec($query);
  }
  // dạng preapre thứ 1 dùng tham số ẩn danh là dấu ?
  function InsertUser2($tenkh,$user,$matkhau,$email,$diachi,$dt)//(an thịnh, anthinh,đã đc mã,an@gmail.com,hcm,123456)
  {
    // b1: connect với database
    $db=new connect();
    // b2: thực hiện câu truy vấn 
    $query="insert into khachhang1(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro)
    values(NULL,?,?,?,?,?,?,default)";
    // b3 gửi câu query này qua bên lớp connect cho prepare thực thi
    $stm=$db->getpreapre($query);
    // muốn prepare đc thì phải có execute
    $stm->execute([$tenkh,$user,$matkhau,$email,$diachi,$dt]);
  }
  // dạng prepare thứ 2 dùng tiền tố : kết hợp với bindValue và bind Param
  function InsertUser($user_name,$user_number,$user_email, $user_password,$user_address)//(an thịnh, anthinh,đã đc mã,an@gmail.com,hcm,123456)
  {
    // b1: connect với database
    $db=new connect();
    // b2: thực hiện câu truy vấn 
    $query="insert into user(user_id,user_name,user_number,user_email,user_password,user_address)
    values(NULL,:user_name,:user_number,:user_email,:user_password,:user_address)";
    // b3 gửi câu query này qua bên lớp connect cho prepare thực thi
    $stm=$db->getpreapre($query);

    $stm->bindParam(':user_name',$user_name);
    $stm->bindParam(':user_number',$user_number);
    $stm->bindParam(':user_password',$user_password);
    $stm->bindParam(':user_email',$user_email);
    $stm->bindParam(':user_address',$user_address);

    // muốn prepare đc thì phải có execute
    $stm->execute();
  }
  // pt kiểm tra thông tin đăng nhập
  function login($user_number,$user_password)
  {
    // B1: kết nối đc database
    $db=new connect();
    // b2: viết câu lệnh select yêu cầu lớp trong connect (pt query hoặc prepare) thực thi
    $select="select * from user where user_number='$user_number' and user_password='$user_password'";
    // vì là lệnh select nên pt dạng cơ bản thì query thực thi mà query nằm trong pt của connect
    // mỗi user chỉ trả đúng thông tin của 1 người, getInsant
    $result=$db->getList($select);
    // lấy đúng 1 user nên fetch()
    $set=$result->fetch();
    return $set;
  }


}
?>
<!-- trao đổi dữ liệu từ trang này qua trang khác
Session là thông tin làm việc cho từng khách hàng truy cập vào, khi truy cập vào PHP nó tạo ra
1 file trong thư mục tạm php.ini,lưu thông tin, thông tin này nó sẽ dùng chung cho tất các trang mà khách hàng truy 
cập vào, 
Muốn xài đc session trong php phải gọi hafmg session_start(), nó phục hồi dữ liệu SESSION nếu đã đó, nếu chưa có
sẽ tạo ra SESSION mơi. nên gọi session_start() khi bắt đầu 1 trang, session.auto_start=1 trong php.ini
Thông tin người dùng đăng ký, đăng nhập nó lưu vào trong biến toàn cục $_SESSION

Để huy session thì chỉ cần unset($_SESSION['']), nếu muốn hủy hết mọi thông tin thì session_destroy()
 -->