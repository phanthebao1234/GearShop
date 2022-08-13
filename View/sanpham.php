<?php
include 'View/header_product.php';
$sp = new Products();
if (isset($_GET['id'])) {
    $id_menu = $_GET['id'];
    $menu = new Menu();
    $result = $menu->getNameMenu($id_menu);
    $ten_menu = $result['menu_name'];
}
$result = $sp->getListProductNotSale();
//   $count=$hh->getCountListHangHoa();//14 dòng
$count = $result->rowCount(); //14 dòng
//   giới hạn mỗi trang bao nhiêu sản phẩm, tự cho
$limit = 8;
//   tìm trang hiện tại
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
//   tính tổng số trang và start
$p = new Page();
$page = $p->findPage($count, $limit); // tổng số trang
//   gọi start
$start = $p->findStart($limit);
if (isset($_GET['act'])) //khuyenmai
{
    if ($_GET['act'] == "sanpham") {
        $ac = "sanpham";
    } else if ($_GET['act'] == "khuyenmai") {
        $ac = "khuyenmai";
    } else if ($_GET['act'] == "timkiem") {
        $ac = "timkiem";
    } else if ($_GET['act'] == "menu") {
        $ac = "menu";
    } 
    else {
        $ac = "";
    }
}
?>
<div class="container-fluid bg-light mt-3">
    <div class="menu container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?action=home">Trang chủ</a></li>
                <?php
                if ($ac == "sanpham") {
                    echo '<li class="breadcrumb-item active">Sản phẩm</li>';
                } elseif ($ac == "khuyenmai") {
                    echo '<li class="breadcrumb-item active">Sản phẩm khuyến mãi</li>';
                } elseif ($ac == "timkiem") {
                    echo '<li class="breadcrumb-item active">Sản phẩm tìm kiếm</li>';
                } elseif ($ac == "menu") {
                    echo '<li class="breadcrumb-item active">'.$ten_menu.'</li>';
                } else {
                    echo '<li class="breadcrumb-item active">Không có sản phẩm nào</li>';
                }
                ?>
            </ol>
        </nav>
    </div>

    <div class="content">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            $hh = new Products();
            if ($ac == "sanpham") {
                // $results=$hh->getListHangHoa();
                // khi hiển thị sản phẩm ra thì phải cho biết là lấy từ san phẩm 
                // vị trí thứ mấy và lấy ra bao nhiêu san pham
                $results = $hh->getListProductPage($start, $limit);
            } else if ($ac == "khuyenmai") {
                $results = $hh->getListProductSaleAll();
            }else if ($ac == "menu") {
                $results = $hh->getListProductMenu($id_menu);
            } else if ($ac == "timkiem") {
                //  echo "<script>alert('hello');</script>";
                //  gửi qua đây là txtsearch=giày
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $namesearch = $_POST['txtsearch'];
                    $results = $hh->getSearch($namesearch);
                }
            }

            while ($set = $results->fetch()) :
            ?>
                <a class="col" href="index.php?action=home&act=detail&id=<?php echo $set['id_sp']?>">
                    <div class="card h-100">
                        <img src="Content/images/<?php echo $set['hinh_sp']; ?>" class="card-img-top" alt="<?php echo $set['ten_sp']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $set['ten_sp']; ?></h5>
                            <p class="card-text">
                                <?php
                                if ($set['giamgia_sp'] <= 0) {
                                        echo '<h5 class="my-4 font-weight-bold" style="color: red;">' . number_format($set['dongia_sp']) . '<sup><u>đ</u></sup></br>';
                                        
                                } else {
                                        echo '
                                            <h5 class="my-4 font-weight-bold">
                                            <font color="red">' . number_format($set['giamgia_sp']) . '<sup><u>đ</u></sup></font>&emsp;
                                            <strike>' . number_format($set['dongia_sp']) . '</strike><sup><u>đ</u></sup>
                                            </h5>
                                            ';
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<nav class="Page navigation example float-end">
    <ul class="pagination">
        <?php
        // khi nào xuất hiện nút lùi khi người dùng click vào trang 2 thì mới lùi về trang 1 đc, còn trang 1 có lùi đc ko? ko
        if ($current_page > 1 && $page > 1) {
            echo '<li class="page-item"><a class="page-link" href="index.php?action=home&act=sanpham&page=' . ($current_page - 1) . '">
                    Prev</a></li>';
        }
        for ($i = 1; $i <= $page; $i++) {
        ?>
            <li class="page-item"><a class="page-link" href="index.php?action=home&act=sanpham&page=<?php echo $i; ?>">
                    <?php echo $i; ?></a></li>
        <?php
        }
        // khi next thì trang hiện tại phải nhỏ hơn tổng số trang
        if ($current_page < $page && $page > 1) {
            echo '<li class="page-item"><a class="page-link" href="index.php?action=home&act=sanpham&page=' . ($current_page + 1) . '">
                    Next</a></li>';
        }
        ?>
    </ul>
</nav>

