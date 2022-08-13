<?php
class Product{
  public function __construct()
  {
    
  }
  // pt hiển thị tất cả các sp
  function getListProduct()
  {
    $db=new connect();
    $select="Select * from sanpham";
    $result=$db->getList($select);
    return $result;
  }
  //pt hiển thị tất cả các menu
  function getListMenu()
  {
    $db=new connect();
    $select="Select * from menu";
    $result=$db->getList($select);
    return $result;
  }
  //phương thức hiên thị tất cả thương hiệu
  function getListThuongHieu()
  {
    $db=new connect();
    $select="Select * from thuonghieu";
    $result=$db->getList($select);
    return $result;
  }
  // lấy thông tin của bảng menu
  function getListMaLoaiSP()
  {
    $db=new connect();
    $select="select id_menu,menu_name from menu";
    $result=$db->getList($select);
    return $result;
  }
  // lấy thông tin của bảng thương hiệu
  function getListThuongHieuSP()
  {
    $db=new connect();
    $select="select id_thuonghieu,ten_thuonghieu from thuonghieu";
    $result=$db->getList($select);
    return $result;
  }
  // viết câu lệnh insert vào bảng hàng hóa
  function insertProduct($tenhh_sp,$dongia_sp,$giamgia_sp,$hinh_sp,$maloai_sp,$ngaylap_sp,$mota_sp,$soluongton_sp,$soluotxem_sp,$id_thuonghieu)
  {
    $db=new connect();
    $query="insert into sanpham(id_sp,ten_sp,dongia_sp,giamgia_sp,hinh_sp,maloai_sp,ngaylap_sp,mota_sp,soluongton_sp,soluotxem_sp,id_thuonghieu) 
    values(NULL,'$tenhh_sp',$dongia_sp,$giamgia_sp,'$hinh_sp',$maloai_sp,'$ngaylap_sp','$mota_sp',$soluongton_sp,$soluotxem_sp,$id_thuonghieu)";
    $db->exec($query);
  }
  //Thêm menu 
  function insertmenu($menu_name,$link){
    $db = new connect();
    $query="insert into menu(id_menu, menu_name, link)
    value(Null, '$menu_name', '$link')";
    $db->exec($query);
  }
  // lấy thông tin của 1 sản phẩm
  function getProductID($id)
  {
    $db=new connect();
    $select="select * from sanpham where id_sp=$id";
    $result=$db->getInstance($select);
    return $result;
  }
  // phuong thức update hang hoa
  function updateProduct($id,$tenhh,$dongia,$giamgia,$hinh,$maloai,$ngaylap,
  $mota,$soluongton,$soluotxem,$id_thuonghieu)
  {
    $db=new connect();
    $query="update sanpham 
            set ten_sp='$tenhh',
            dongia_sp=$dongia,
            giamgia_sp=$giamgia,
            hinh_sp='$hinh',
            maloai_sp=$maloai,
            ngaylap_sp='$ngaylap',
            mota_sp='$mota',
            soluongton_sp=$soluongton,
            soluotxem_sp=$soluotxem,
            id_thuonghieu=$id_thuonghieu
            where id_sp=$id";
    $db->exec($query);
  }
  // pt xóa
  function deleteMaHang($id)
  {
    $db=new connect();
    $query="delete from sanpham where id_sp=$id";
    $db->exec($query);
  }
  function deleteMenu($id)
  {
    $db=new connect();
    $query="delete from menu where id_menu=$id";
    $db->exec($query);
  }
  
  function insertLoaiHang($id,$tenloai,$idmenu)
  {
    $db=new connect();
    $query="insert into loai(id_loai,ten_loai,id_menu) values($id,'$tenloai',$idmenu)";
    $db->exec($query);
  }
  function getListProduct_thongke()

  {

    $db=new connect();

    $select="SELECT a.id_sp,a.ten_sp,sum(soluongmua) as soluongban from sanpham a INNER join chitiethoadon b on a.id_sp=b.id_sp GROUP by a.id_sp,a.ten_sp";

    $result=$db->getList($select);

    return $result;

  }
}
?>