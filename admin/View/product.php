<div class="container-fluid table-responsive">
<table class="table align-middle table-bordered table-striped table-hover ">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>IMAGE</th>
            <th>PRICE</th>
            <th>PRICE SALE</th>
            <th>TYPE</th>
            <th>DATE</th>
            <th>DESCRIPTION</th>
            <th>COUNT</th>
            <th>COUNT VIEW</th>
            <th>TRADEMARK</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sp = new Product();
            $results = $sp->getListProduct();
            while ($set=$results->fetch()):
        ?>
        <tr class="align-middle">
            <th><?php echo $set['id_sp']?></th>
            <th><?php echo $set['ten_sp']?></th>
            <th><img src="../Content/images/<?php echo $set['hinh_sp']?>" width="100%" alt=""></th>
            <th><?php echo number_format($set['dongia_sp']);?></th>
            <th><?php echo number_format($set['giamgia_sp']);?></th>
            <th><?php echo $set['maloai_sp']?></th>
            <th><?php echo $set['ngaylap_sp']?></th>
            <th width="2500px"><?php echo $set['mota_sp']?></th>
            <th><?php echo $set['soluongton_sp']?></th>
            <th><?php echo $set['soluotxem_sp']?></th>
            <th><?php echo $set['id_thuonghieu']?></th>
            <th>
                <a class="btn btn-warning" href="index.php?action=sanpham&act=update&id=<?php echo $set['id_sp']?>">Edit</a>
                <a class="btn btn-danger" href="index.php?action=sanpham&act=delete&id=<?php echo $set['id_sp']?>">Delete</a>
            </th>
        </tr>
        <?php
            endwhile;
        ?>
    </tbody>
</table>
</div>