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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên khuyến mại</th>
                            <th>Mã khuyến mại</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Số tiền giảm giá</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên khuyến mại</th>
                            <th>Mã khuyến mại</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Số tiền giảm giá</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        foreach ($coupons as $coupon) :
                        ?>
                            <tr>
                                <td><?= $coupon['ten_khuyenmai']; ?></td>
                                <td><?= $coupon['ma_khuyenmai']; ?></td>
                                <td><?= $coupon['thoigian_bd']; ?></td>
                                <td><?= $coupon['thoigian_kt']; ?></td>
                                <td><?= $coupon['gia_tri']; ?></td>
                                <td><?= $coupon['trang_thai'] ? '<span class="badge badge-success">On</span>' : '<span class="badge badge-warning">Off</span>'; ?></td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=tb_khuyenmai-detail&id=<?= $coupon['id']; ?>" class="btn btn-info">Chi tiết</a>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=tb_khuyenmai-update&id=<?= $coupon['id']; ?>" class="btn btn-warning">Sửa</a>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=tb_khuyenmai-delete&id=<?= $coupon['id']; ?>" class="btn btn-danger"
                                    onclick="return confirm('Bạn muốn xóa không ?')"
                                    >Xóa</a>
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