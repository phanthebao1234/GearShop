<?php
$action="sanpham";
if(isset($_GET['act']))
{
  $action=$_GET['act'];
}
switch($action)
{
  case "sanpham":
    include "View/product.php";
    break;
  case "insertsp":
    include "View/updateproduct.php";
    break;
  case "insert_action":
    if(isset($_POST['submit']))
    {
      $ip_sp=$_POST['ip_sp'];
      $ten_sp=$_POST['ten_sp'];
      $dongia_sp=$_POST['dongia_sp'];
      $giamgia_sp=$_POST['giamgia_sp'];
      $hinh_sp=$_FILES['image']['name'];
      $maloai_sp=$_POST['maloai_sp'];
      $ngaylap_sp=$_POST['ngaylap_sp'];
      $mota_sp=$_POST['mota_sp'];
      $soluongton_sp=$_POST['soluongton_sp'];
      $soluotxem_sp=$_POST['soluotxem_sp'];
      $id_thuonghieu = $_POST['id_thuonghieu'];
      // đem toàn bộ thông tin này chèn vào database
      $hh=new Product();
      $hh->insertProduct($ten_sp,$dongia_sp,$giamgia_sp,$hinh_sp,$maloai_sp,$ngaylap_sp,$mota_sp,$soluongton_sp,$soluotxem_sp,$id_thuonghieu);
      // sau khi chèn xong, đưa hình từ server về thư mục cần đỗ vào
      if(isset($hh))// chèn đc thì trả về là true
      {
        uploadImage();
        echo '<script> alert("Lưu sản phẩm thành công")</script>';
      }
      
    }
    include "View/product.php";
    break;
  case "update":
    include "View/updateproduct.php";
    break;
  case "update_action":
    // truyền qua đây thông tin của tất cả các sp
    if(isset($_POST['submit']))
    {
      $id_sp=$_POST['id_sp'];
      $tensp=$_POST['ten_sp'];
      $dongia_sp=$_POST['dongia_sp'];
      $giamgia_sp=$_POST['giamgia_sp'];
      $hinh_sp=$_FILES['image']['name'];
      $maloai_sp=$_POST['maloai_sp'];
      $ngaylap_sp=$_POST['ngaylap_sp'];
      $mota_sp=$_POST['mota_sp'];
      $soluongton_sp=$_POST['soluongton_sp'];
      $soluotxem_sp=$_POST['soluotxem_sp'];
      $id_thuonghieu=$_POST['id_thuonghieu'];
      // đem toàn bộ thông tin này chèn vào database
      $hh=new Product();
      $hh->updateProduct($id_sp,$tensp,$dongia_sp,$giamgia_sp,$hinh_sp,$maloai_sp,$ngaylap_sp,$mota_sp,$soluongton_sp,$soluotxem_sp,$thuonghieu);
      // sau khi update xong, đưa hình từ server về thư mục cần đỗ vào
      if(isset($hh))// chèn đc thì trả về là true
      {
        uploadImage();
        echo '<script> alert("Update sản phẩm thành công")</script>';
      }
      
    }
    include "View/product.php";
    break;
  case "delete":
   
    if(isset($_GET['id']))
    {
      $mahh=$_GET['id'];
      $hh=new Product();
      $hh->deleteMaHang($mahh);
      echo '<script> alert("Xóa sản phẩm thành công")</script>';
    }
    include "View/product.php";
    break;

}
 ?>