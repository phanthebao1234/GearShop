<?php
class HoaDon{
  // thuộc tính
  // hàm tạo
  public function __construct()
  {
    
  }
  // viết pt insert vào bảng hóa đơn 1
  // mã số hóa đơn ko cần insert vì nó tự tăng, ngày đặt cũng ko cần truyền vào vì nó lấy ngày hiện tại và total ban đầu
  // ko truyền vào vì bảng chi tiết hóa đơn chưa đc chèn vào
  //  dùng dạng cơ bản tức là exec chứ ko dùng prepare
  public function insertOrder($makh)//7
  {
    // lấy ngày hiện tại
    $date=new DateTime("now");// lấy ngày và có giờ
    $ngay=$date->format("Y-m-d");
    // b1 kết nối với database
    $db=new connect();
    // b2: viết yêu cầu chèn vào database
    $query="insert into hoadon(hoadon_id,user_id,ngaydat,tongtien) values(NULL,$makh,'$ngay',0)";
    // b3: thực thi câu $query
    $db->getexec($query);// đã chèn đc vào database
    // sau khi chèn mã số hd đc vào trong database thì tiến hàng lấy mã mới vừa chèn vào
    $select="select hoadon_id from hoadon order by hoadon_id desc limit 1";
    // ai thực thi câu truy vấn $select? query và prepare
    $result=$db->getInstance($select);// $result[16]
    return $result[0];// return 16
    

  }
  // phương thức insert vào trong bảng chi tiết hóa đơn
  function insertOrderDetail($masohd,$mahh,$soluong,$thanhtien)
  {
    // B1: kết nối với database
    $db=new connect();
    // b2: yêu cầu insert vào bảng chi tiết hóa đơn
    $query="insert into chitiethoadon(hoadon_id, id_sp, soluongmua, thanhtien, tinhtrang)
     values($masohd,$mahh,$soluong,$thanhtien,0)";
     $db->getexec($query);
  }
  // phương thức cập nhật lại tổng tiền của bảng hóa đơn
  function updateOrderTotal($masohd,$total)
  {
    $db=new connect();
    $query="update hoadon set tongtien=$total where hoadon_id=$masohd";
    $db->getexec($query);
  }
  // pt lấy thông tin của hóa đơn mới vừa chèn vào bảng chi tiest hóa đơn để hiện tị lên order
  function getOrder($sohdid)
  {
    $db=new connect();
    $select="select b.hoadon_id, a.user_name,a.user_address,a.user_number,b.ngaydat from user a 
    inner join hoadon b on a.user_id=b.user_id where hoadon_id=$sohdid";
    // trả đúng thông tin của 1 khách hàng  getInstance
    $result=$db->getInstance($select);
    return $result;
  }
  function getOrderDetail($sohdid)
  {
    $db=new connect();
    $select="select a.ten_sp,a.dongia_sp,b.soluongmua,b.thanhtien 
    from sanpham a inner join chitiethoadon b on a.id_sp=b.id_sp where hoadon_id=$sohdid";
    // kết quả trả về nhiều món hàng mà khách hàng mua
    $result=$db->getList($select);
    return $result;
  }
}
?>