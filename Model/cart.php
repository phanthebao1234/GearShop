<?php
// gio hàng này ko cần tạo class
// viết pt thêm 1 sản phẩm vào trong giỏ hàng $_SESSION['cart']
function add_item($id,$quantity)
{
// nhưng mà trong giỏ hàng cô thiết trong giỏ phải có hình, tên sp,dongia, tổng tiên
// nhưng đã có mahh nên truy vấn ngược lại lấy thông của 1 sp ra
  $pros=new Products();
  $pro=$pros->getListProductDetail($id);
  // trước khi thêm 1 món hàng mới vào trong giỏ hàng thì kiểm tra xem mã hàng đó đã tồn tại trong giỏ hàng chưa
 // lấy vị trí tức là mã hàng luôn nên chỉ truyền vào mã hh
  if(isset($_SESSION['cart'][$id]))
  {
    // nếu tồn tại thì chỉ tăng số lượng của món hàng đó
    $quantity+=$_SESSION['cart'][$id]['qty'];//$quantity=$quantity+$_SESSION['cart'][$mah]['qty']=2+3=5
    // muốn update thì cần phải biết mahh
    update_item($id,$quantity);
    return;
  }
  // lấy ra được thông tin của 1 sản phẩm mà khách hàng chọn mua
  $cost=$pro['dongia_sp'];
  $sale=$pro['giamgia_sp'];
  $ten=$pro['ten_sp'];
  $hinh=$pro['hinh_sp'];
  $total=$cost*$quantity;
  // a[]=>$_SESSION['cart'][]
  // a[0]=12=> a[12];a[1]=23=>a[12,23]
  // giỏ hàng chứa 1 sản, mà 1 sản phẩm là 1 đối tượng có nhiều thuộc tính trong đó,
  // trong mỗi đượng nó lại 1 mảng chứa nhiều giá trị của thuộc tính
  //a[12]=[hình,tên, đongía,số lượng,màu, size,total]
  //>$_SESSION['cart'][[12.jpg,giày cao gót, 500000,2,màu be, 35,1000000],[1.jpg,dép lào, 400000,1,màu trắng, 35,400000]]
  // tạo 1 đối tượng bao gồm có các thông tin mahh, hình,name,mau,size,cost,qty,total
  // đối tượng này kiểu mảng vì chứa nhiều giá trị của thuộc tính
  $item=array(
    'mahh'=>$id,//$mahh=21
    'hinh'=>$hinh,//hinh=21.jpg
    'name'=>$ten,//ten=giày cao got
    'cost'=>$cost,//cost=500000
    'sale'=>$sale,
    'qty'=>$quantity,//qty=2
    'total'=>$total,//total=1000000
  );
  //$_SESSION['cart'][];
  // thêm 1 món hàng vào thì $_SESSION['cart'][0]=[['mahh','hinh','name','mau','size','cost','qty','total']]
  //$_SESSION['cart'][0]=[[12','12.jpg,giày cao got',màu be,'35','500000,'2','1000000']]
  //$_SESSION['cart'][0]=[$item]
  // nếu mua sp kế tiếp làm sao chèn vô mảng vị trí số 1, => biện pháp thay số 0 thành mah vì mỗi sp có mã hàng
  // kiểu số nguyên khác nhau
  //a[];a[0]=34=>a[34]
  $_SESSION['cart'][$id]=$item;
  //$_SESSION['cart][21]=[21,21.jpg,giày cao got, màu be, 35, 5000000, 1000000]
  //                        21
  //$_SESSION['cart][[21,21.jpg,giày cao got, màu be, 35,2, 5000000, 1000000],[22,22.jpg,giày cao got, màu be, 35, 5000000, 1000000]]

}
// thực hiện pt tính tổng tiền trên giỏ hàng
function get_subTotal()
{
  $subtotal=0;
  // duyệt qua giỏ hàng mà khách hàng mua tức là duyệt qua mảng $_SESSION['cart]
  foreach($_SESSION['cart'] as $item)
  {
    $subtotal+=$item['total'];
  }
  // định dạng tiền tệ
  $subtotal=number_format($subtotal);
  return $subtotal;
}
//                    21
//$_SESSION['cart][[21,21.jpg,giày cao got, màu be, 35,2, 5000000, 1000000]]
//mới mua thêm 2 thì $quantity=4
function update_item($mah,$quantity)//21,10
{
  if($quantity<=0)
  {
    unset($_SESSION['cart'][$mah]);
  }
  else{
      // cập nhật lại là chỉ thực hiện phép gán lại
    $_SESSION['cart'][$mah]['qty']=$quantity;//$_SESSION['cart'][21]['qty']=4
    // phải tính lại tổng tiền
    $totalnew=$_SESSION['cart'][$mah]['qty']*$_SESSION['cart'][$mah]['cost'];
    $_SESSION['cart'][$mah]['total']= $totalnew;
  }
  
}
?>