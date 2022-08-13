    <!-- Start-menu -->
    <div class="container">
      <section class="menu">
        <div class="menu-title d-flex justify-content-between align-items-center">
          <div class="menu-title-logo">
            <a href="index.php?action=home"><img src="Content/images/logo.png" alt="GearVN" /></a>
          </div>
          <div class="menu-title-search">
            <form action="index.php?action=home&act=timkiem" method="POST">
              <div class="input-group">
                <input type="text" class="form-control" size="50" placeholder="Bạn tìm gì..." aria-label="Recipient's username" aria-describedby="button-addon2" name="txtsearch" />
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                  <i class="fas fa-search"></i>Tìm kiếm
                </button>
              </div>
            </form>
          </div>
          <div class="menu-title-account d-flex align-items-center">
            <i class="fal fa-user fa-2x"></i>
            <div>
              <?php
              if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) :
                $name = $_SESSION['user_name'];
              ?>
                <span>Xin chào, <?php echo $name; ?></span>
              <?php
              else :
                echo '<span>Đăng nhập / Đăng xuất</span>';
              endif;
              ?>
              <div class="dropdown">
                <a class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Tài khoản
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <?php
                  if (isset($_SESSION['user_name']) && $_SESSION['user_id']) :
                  ?>
                    <li>
                      <a class="btn btn-warning dropdown-item" href="index.php?action=info">Xem thông tin</a>
                    </li>
                    <li>
                      <a class="btn btn-warning dropdown-item" href="index.php?action=login&act=logout">Đăng xuất</a>
                    </li>
                  <?php
                  else :
                    echo '<li>
                        <a class="btn btn-warning dropdown-item" href="index.php?action=login"
                          >Đăng nhập</a
                        >
                      </li>
                      <li>
                        <a class="dropdown-item btn btn-info" href="index.php?action=registration"
                          >Tạo tài khoản</a
                        >
                      </li>';
                  endif;
                  ?>

                </ul>
              </div>
            </div>
          </div>
          <div class="menu-title-cart d-flex align-items-center">
            <a href="index.php?action=cart"><i class="fal fa-shopping-cart fa-2x"></i></a>
            <span>Giỏ hàng</span>
          </div>
        </div>
      </section>
    </div>
    <!-- End-menu -->

    <!-- Start Content -->
    <div class="container-lg">
      <section class="content">
        <div class="content-menu d-flex justify-content-between">
          <div class="content-menu-list ">
            <a href="#"><span><i class="far fa-bars"></i> Danh mục sản phẩm</span></a>
          </div>
          <button class="content-menu-thanhtoan">
            <a href="#"><span>Hướng dẫn thanh toán</span></a>
          </button>
          <button class="content-menu-tragop">
            <a href="#"><span>Hướng dẫn trả góp</span></a>
          </button>
          <button class="content-menu-giaohang">
            <a href="#"><span>Hướng dẫn giao hàng</span></a>
          </button>
          <button class="content-menu-baohanh">
            <a href="#"><span>Hướng dẫn bảo hành</span></a>
          </button>
          <button class="content-menu-khuyenmai">
            <a href="#"><span>Hướng dẫn khuyến mãi</span></a>
          </button>
        </div>
        <div class="content-main">
          <div class="row content-main-listmenu">
            <div class="col-lg-3">
              <!-- menu động -->
              <!-- <div class="list-group list-group-flush"> -->
              <div class="list-group list-group-flush">
                <?php
                $menu = new Menu();
                $results = $menu->getListMenu();
                while($set = $results->fetch()):
                ?>
                  <a class="list-group-item" href="index.php?action=home&act=menu&id=<?php echo $set['id_menu'] ?>"><span><?php echo $set['menu_name'] ?></span><i class="fal fa-angle-right float-end"></i></a>
                <?php
                endwhile;
                ?>
                
              </div>
              <!-- </div> -->
            </div>
            <div class="col-lg-9 mt-3 text-center">
              <div class="d-flex justify-content-center">
                <div class="">
                  <div class="owl-carousel owl-theme content-main-image" id="owl-carousel-content">
                    <div class="item">
                      <img src="Content/images/content1.jpg" alt="" />
                    </div>
                    <div class="item">
                      <img src="Content/images/content2.jpg" alt="" />
                    </div>
                    <div class="item">
                      <img src="Content/images/content3.png" alt="" />
                    </div>
                    <div class="item">
                      <img src="Content/images/content4.jpg" alt="" />
                    </div>
                    <div class="item">
                      <img src="Content/images/content5.jpg" alt="" />
                    </div>
                  </div>
                </div>
                <div class="content-main-right">
                  <div class="flex flex-wrap-reverse">
                    <div class="">
                      <a href="#"><img src="Content/images/content6.png" alt="" /></a>
                    </div>
                    <div class="">
                      <a href="#"><img src="Content/images/content7.png" alt="" /></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex  mt-2">
                <div>
                  <a href="#"><img src="Content/images/content8.png" alt="" /></a>
                </div>
                <div>
                  <a href="#"><img src="Content/images/content9.png" alt="" /></a>
                </div>
                <div>
                  <a href="#"><img src="Content/images/content10.png" alt="" /></a>
                </div>
              </div>
            </div>
          </div>
          <div class="content-main-thuonghieu">
            <div class="content-main-title d-flex justify-content-between">
              <div class="">
                <h3 class="fw-bolder">Thương hiệu sản phẩm</h3>
              </div>
              <div class="">
                <a href="index.php?action=thuonghieu">Xem tất cả</a>
              </div>
            </div>
            <div class="content-main-anhthuonghieu">
              <!-- thương hiệu -->
              <?php
                $th= new ThuongHieu();
                $results = $th->getListThuongHieuLimit8();
                while($set = $results->fetch()):
              ?>
              <a href="index.php?action=thuonghieu&act=detail&id=<?php echo $set['id_thuonghieu']?>"><img src="Content/images/<?php echo $set['hinh_thuonghieu']?>" alt="" /></a>
              <?php endwhile;?>
            </div>
          
          </div>
        </div>
      </section>
    </div>
    <!-- End Content -->