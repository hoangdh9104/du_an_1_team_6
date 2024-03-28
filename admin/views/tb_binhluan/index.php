<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
    </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Danh sách bình luận
            </h6>
        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nội Dung</th>
                            <th>Thời gian</th>
                            <th>ID Sản phẩm</th>
                            <th>Tên khách hàng</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nội Dung</th>
                            <th>Thời gian</th>
                            <th>ID Sản phẩm</th>
                            <th>Tên khách hàng</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($comments as $comment) : ?>
                            <tr>
                                <td><?= $comment['id'] ?></td>
                                <td><?= $comment['noi_dung'] ?></td>
                                <td><?= $comment['thoi_gian'] ?></td>
                                <td><?= $comment['id_sanpham'] ?></td>
                                <td><?= $comment['ten_khachhang'] ?></td>
                                <td class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 mt-3">
                                            <a href="<?= BASE_URL_ADMIN ?>?act=tb_binhluan-delete&id=<?= $comment['id'] ?>" onclick="return confirm('bạn có chắc chắn xóa không')" class="btn - btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>