<?php
class Products
{
  //thuộc tính
  var $id_sp=null;
  var $ten_sp=null;// thuộc tính kiểu chuỗi
  var $dongia_sp=0;// thuộc tính kiểu số
  var $giamgia_sp=0;
  var $hinh_sp="images/";
  var $maloai_sp=0;
  var $ngaylap_sp=null;
  var $mota_sp=null;
  var $soluonton_sp=0;
  var $soluotxem_sp=0;
  var $id_thuonghieu=null;

  // hàm tạo
  function __construct()
  {
  }
  //pt lấy về 8 sản phẩm mới nhất 
  function getListProductNew()
  {
    //b1: kết nối đc với database tức là mysql
    $db=new connect();
    // b2 muốn lấy đc 8 sản phẩm thì yêu cầu đối tượng đó thực thi câu truy vấn gì?
    // select
    $select="SELECT * FROM sanpham ORDER by id_sp DESC limit 8 ";
    $result=$db->getList($select);
    return $result;// trả về đc 8 sản phẩm mới nhất

  }
  // vì là return tức là getListHangHangNew chứa 8 sản phẩm
  // pt trả về 4 sản phẩm giảm giá
  function getListProductSale()
  {
    $db=new connect();
    // b2 muốn lấy đc 8 sản phẩm thì yêu cầu đối tượng đó thực thi câu truy vấn gì?
    // select
    $select="select * from sanpham WHERE giamgia_sp >0 ORDER by id_sp limit 8 ";
    $result=$db->getList($select);
    return $result;// trả về đc 8 sản phẩm mới nhấ
  }
  // pt lấy hết tất cả sản phẩm về
  function getListProductNotSale()
  {
    $db=new connect();
    $select="select * from sanpham where giamgia_sp=0";
    // yếu cầu bên lớp connect thực thi và trả về nhiều row
    $result=$db->getList($select);
    return $result;

  }
  // getListHangHoa trả về tất cả sp
  // pt lấy tất cả sp khuyến mãi
  function getListProductSaleAll()
  {
    $db=new connect();
    $select="select * from sanpham where giamgia_sp>0";
    // yếu cầu bên lớp connect thực thi và trả về nhiều row
    $result=$db->getList($select);
    return $result;
  }
  // viết câu truy vấn lấy thông tin của 1 sản phẩm khi biết id
  function getListProductDetail($id)//$id=24
  {
    // B1: kết nối đc với database
    $db=new connect();
    // b2: truyền câu truy vấn mà yêu cầu bên connect làm

    $select="select * from sanpham where id_sp=$id";
    // b3: truyeefn câu $select qua cho đối tượng $db yêu cầu query làm
    $result=$db->getInstance($select);
    return $result;
  }

// đếm số sp
function getCountListProduct()
{
  $db=new connect();
  $select="select count(*) from sanpham where giamgia_sp=0";
  // yếu cầu bên lớp connect thực thi và trả về nhiều row
  $result=$db->getInstance($select);
  return $result[0];

}
// phân trang để hiển thị số san phẩm
function getListProductPage($start, $limit)
{
    $db=new connect();
    $select="select * from sanpham where giamgia_sp=0 limit ".$start.",".$limit."";
    // yếu cầu bên lớp connect thực thi và trả về nhiều row
    $result=$db->getList($select);
    return $result;
}
// pt tìm kiếm sản phẩm
// dùng dạng cơ bản tức là query
// function getSearch($name)
// {
//   $db=new connect();
//   $select ="select * from hanghoa where tenhh like '%$name%'";
//   $result=$db->getList($select);
//   return $result;
// }
// dùng dạng prepare
function getSearch($name)
{
  $db=new connect();
  $select ="select * from sanpham where ten_sp like :ten_sp";
  // ai thực thi câu truy vấn này là prepare
  $stm=$db->getpreapre($select);
  // muốn prepare đc thì phải có execure
  //rang buộc về giá trị, bindValue, bindParame
  // $stm->bindValue(':tenhh',"%".$name."%");
  // khai báo 1 biến
  $str_name="%".$name."%";
  $stm->bindParam(':ten_sp',$str_name);
  $stm->execute();
  return $stm;
}

    function getListProductMenu($id) {
        $db = new connect();
        $select = "SELECT * FROM sanpham where maloai_sp=$id";
        $result = $db->getList($select);
        return $result;
    }
}
