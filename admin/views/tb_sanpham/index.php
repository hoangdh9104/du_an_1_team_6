<?php
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>


    </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                DataTables
            </h6>
        </div>
        <div class="card-body">
            <?php
            // Thông báo Xóa thành công
            if (isset($_SESSION['success'])) :
            ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php
            endif;
            ?>
            <?php $dmsp = listAllDanhMuc(); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <td>Tên danh mục</td>
                            <th>Ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <td>Tên danh mục</td>
                            <th>Ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        foreach ($products as $product) :
                        ?>
                            <?php
                            $x = getData_tb_danhmuc($product['id']);
                            // debug($x);
                            ?>
                            <tr>
                                <td><?= $product['id']; ?></td>
                                <td><?= $product['name']; ?></td>
                                <td><?php
                                    foreach ($x as $key) {
                                        foreach ($key as $item) {
                                            echo $item;
                                        }
                                    }
                                    ?></td>
                                <td>
                                    <img src="<?= BASE_URL . $product['img_thumbnail'] ?>" alt="" width="100px">
                                </td>
                                <td><?= $product['gia_ban']; ?></td>
                                <td><?= $product['so_luong'] >= 0 ? $product['so_luong'] : null ; ?></td>
                                <td><?= $product['so_luong'] > 0 ? '<span class="badge badge-success">Còn sản phẩm</span>' : '<span class="badge badge-warning">Hết sản phẩm</span>'; ?></td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=tb_sanpham-detail&id=<?= $product['id']; ?>" class="btn btn-info">Chi tiết</a>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=tb_sanpham-update&id=<?= $product['id']; ?>" class="btn btn-warning">Sửa</a>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=tb_sanpham-delete&id=<?= $product['id']; ?>" class="btn btn-danger" onclick="return confirm('Bạn muốn xóa không ?')">Xóa</a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>