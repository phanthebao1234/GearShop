<?php include 'View/header.php'; ?>
<!-- Start Product -->
<section class="product container">
  <!-- Start Sale Product -->
  <div class="sale">
    <div class="sale-top"></div>
    <div class="sale-product">
      <div class="d-flex justify-content-between owl-carousel owl-theme " id="slide-sale">
        <!-- San pham khuyen mai -->
        <?php
        $sp = new Products();
        $results = $sp->getListProductSale();
        while ($set = $results->fetch()) :
        ?>
          <div class="card m-1 text-center h-100">
            <a href="index.php?action=home&act=detail&id=<?php echo $set['id_sp']; ?>">
              <img src="Content/images/<?php echo $set['hinh_sp']; ?>" width="25%" class="card-img-top h-100 d-inline-block" alt="<?php echo $set['ten_sp'] ?>" />
              <div class="card-body">
                <h5 class="card-title"><?php echo $set['ten_sp'] ?></h5>
                <font color="red"><?php echo number_format($set['giamgia_sp']); ?><sup><u>đ</u></sup></font>
                <strike><?php echo number_format($set['dongia_sp']); ?></strike><sup><u>đ</u></sup>
              </div>
            </a>
          </div>
        <?php
        endwhile;
        ?>
      </div>
    </div>
    <div class="sale-bottom float-end">
      <a class="text-danger text-decoration-underline" href="index.php?action=home&act=khuyenmai">Xem tất cả</a>
    </div>
  </div>

  <!-- End Sale Product -->

  <!-- Start Laptop noi bat -->
  <div class="mt-5 bg-light">
    <h3>Top PC bán chạy</h3>
    <div class="row" id="slide-sale">
      <?php
      $results = $sp->getListProductNew();
      while ($set = $results->fetch()) :
      ?>
        <!-- San pham khuyen mai -->
        <div class="col-sm-3 card text-center mb-2 ">
          <a href="index.php?action=home&act=detail&id=<?php echo $set['id_sp'] ?>">
            <img src="Content/images/<?php echo $set['hinh_sp']; ?>" width="25%" class="card-img-top" alt="<?php echo $set['ten_sp'] ?>" />
            <div class="card-body">
              <h5 class="card-title"><?php echo $set['ten_sp'] ?></h5>
              <p class="card-text">
                <font color="red"><?php echo number_format($set['dongia_sp']); ?><sup><u>đ</u></sup></font>
              </p>
            </div>
          </a>
        </div>
      <?php endwhile; ?>
    </div>
    <div class="float-end">
      <a href="index.php?action=home&act=sanpham">Xem tất cả</a>
    </div>
  </div>
  </div>
  </div>
</section>

<!-- End Product -->