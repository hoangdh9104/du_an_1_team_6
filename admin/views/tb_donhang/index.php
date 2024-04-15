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
                            <th>ID</th>
                            <th>Tên</th>
                            <th>SĐT</th>
                            <th>Ngày mua hàng</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>SĐT</th>
                            <th>Ngày mua hàng</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        foreach ($orders as $order) :
                        ?>
                            <tr>
                                <td><?= $order['id']; ?></td>
                                <td><?= $order['ten_khachhang']; ?></td>
                                <td><?= $order['sdt']; ?></td>
                                <td><?= $order['ngay_mua']; ?></td>
                                <td><?php if ($order['trang_thai'] == 0) {
                                        echo '<span class="badge badge-warning">Chưa xử lí</span>';
                                    }
                                    if ($order['trang_thai'] == 1) {
                                        echo '<span class="badge badge-info">Đã xử lí</span>';
                                    }
                                    if ($order['trang_thai'] == 2) {
                                        echo '<span class="badge badge-primary">Đã tiếp nhận</span>';
                                    }
                                    if ($order['trang_thai'] == 3) {
                                        echo '<span class="badge badge-secondary">Đang giao hàng</span>';
                                    }
                                    if ($order['trang_thai'] == 4) {
                                        echo '<span class="badge badge-success">Đã giao hàng</span>';
                                    }
                                    if ($order['trang_thai'] == 5) {
                                        echo '<span class="badge badge-danger">Đã hủy</span>';
                                    } ?></td>
                                <td>
                                <?php
if ($order['trang_thai'] == 5) {
    echo '<a href="' . BASE_URL_ADMIN . '?act=tb_donhang-detail&id=' . $order['id'] . '" class="btn btn-info">Chi tiết</a>
          <a href="' . BASE_URL_ADMIN . '?act=tb_donhang-update&id=' . $order['id'] . '" class="btn btn-warning">Sửa</a>
          <a href="' . BASE_URL_ADMIN . '?act=tb_donhang-delete&id=' . $order['id'] . '" class="btn btn-danger" onclick="return confirm(\'Bạn muốn xóa không ?\')">Xóa</a>';
} else {
    echo '<a href="' . BASE_URL_ADMIN . '?act=tb_donhang-detail&id=' . $order['id'] . '" class="btn btn-info">Chi tiết</a>
          <a href="' . BASE_URL_ADMIN . '?act=tb_donhang-update&id=' . $order['id'] . '" class="btn btn-warning">Sửa</a>';
}
?>
                                    
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