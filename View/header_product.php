    <!-- Start-menu -->
    <section class="menu">
        <div class="menu-info d-flex justify-content-end align-items-center">
            <div class="p-2 bd-highlight menu-info-item px-3">
                <i class="fas fa-headset fa-1x"></i>Tư vấn mua hàng:<i class="fa-solid fa-arrow-right-to-bracket"></i>
                <span>1800 6975</span>
            </div>
            <div class="p-2 bd-highlight menu-info-item px-3">
                <i class="fas fa-headset fa-1x"></i>CSKH: <span>1800 6173</span>
            </div>
            <div class="p-2 bd-highlight menu-info-item px-3">
                <i class="fas fa-newspaper fa-1x"></i><a href="#">Tin công nghệ</a>
            </div>
            <div class="p-2 bd-highlight menu-info-item px-3">
                <i class="fas fa-user-friends fa-1x"></i><a href="#">Tuyển dụng</a>
            </div>
        </div>
        <div class="menu-title d-flex justify-content-between align-items-center">
            <div class="menu-title-logo">
                <a href="index.php?action=home"><img src="Content/images/logo.png" alt="GearVN" /></a>
            </div>
            <div class="menu-title-search">
                <form action="index.php?action=home&act=timkiem" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" size="50" placeholder="Bạn tìm gì..." aria-label="Recipient's username" aria-describedby="button-addon2" name="txtsearch" />
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="txtsearch">
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
    <!-- End-menu -->

    <!-- Start Content -->
    <section class="content">
        <div class="content-menu d-flex justify-content-between">
            <div class="content-menu-list ">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="far fa-bars"></i> Danh mục sản phẩm
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <?php
                        $menu = new Menu();
                        $results = $menu->getListMenu();
                        while ($set = $results->fetch()) :
                        ?>
                            <li><a class="dropdown-item text-black" href="index.php?action=home&act=menu&id=<?php echo $set['id_menu'] ?>"><?php echo $set['menu_name'] ?><i class="fal fa-angle-right float-end"></i></a></li>
                        <?php
                        endwhile;
                        ?>
                    </ul>
                </div>
                
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
        
    </section>
    <!-- End Content -->