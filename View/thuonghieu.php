<?php
    include 'View/header_product.php';
?>
<div class="container mt-5">
    <h3 class="text-center fw-bold text-uppercase text-danger">Thương hiệu sản phẩm</h3>
    <div class="row">
<?php
    $th = new ThuongHieu();
    $result = $th->getListAllThuongHieu();
    while($set = $result->fetch()):
?>
        <div class="col-3 mb-3">
            <a href="index.php?action=thuonghieu&act=detail&id=<?php echo $set['id_thuonghieu'];?>">
                <img src="Content/images/<?php echo $set['hinh_thuonghieu'];?>" width="50%" alt="<?php echo $set['ten_thuonghieu'];?>">
            </a>
        </div>
        <?php
    endwhile;
    ?>
    </div>
</div>