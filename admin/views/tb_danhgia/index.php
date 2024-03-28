<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
    </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Danh sách đánh giá
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
                            <th>diem_danhgia</th>
                            <th>thoi_gian</th>
                            <th>id_sanpham</th>
                            <th>id_khachhang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>diem_danhgia</th>
                            <th>thoi_gian</th>
                            <th>id_sanpham</th>
                            <th>id_khachhang</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($reviews as $review) : ?>
                            <tr>
                                <td><?= $review['id'] ?></td>
                                <!-- trường đánh đánh giá -->
                                <td>
                                    <?php
                                    switch ($review['diem_danhgia']) {
                                        case '1':
                                            echo '<i class="fas fa-fw fa-star text-warning"></i>';
                                            break;
                                        case '2':
                                            echo '<i class="fas fa-fw fa-star text-warning"></i>';
                                            echo '<i class="fas fa-fw fa-star text-warning"></i>';
                                            break;
                                        case '3':
                                            echo '<i class="fas fa-fw fa-star text-warning"></i>';
                                            echo '<i class="fas fa-fw fa-star text-warning"></i>';
                                            break;
                                        case '4':
                                            echo '<i class="fas fa-fw fa-star text-warning"></i>';
                                            echo '<i class="fas fa-fw fa-star text-warning"></i>';
                                            echo '<i class="fas fa-fw fa-star text-warning"></i>';
                                            echo '<i class="fas fa-fw fa-star text-warning"></i>';
                                            break;
                                        case '5':
                                            echo '<i class="fas fa-fw fa-star text-warning"></i>';
                                            echo '<i class="fas fa-fw fa-star text-warning"></i>';
                                            echo '<i class="fas fa-fw fa-star text-warning"></i>';
                                            echo '<i class="fas fa-fw fa-star text-warning"></i>';
                                            echo '<i class="fas fa-fw fa-star text-warning  "></i>';
                                            break;
                                        default:
                                            echo null;
                                            break;
                                    }
                                    ?>
                                    
                                </td>
                                <!-- trường đánh đánh giá -->
                                <td><?= $review['thoi_gian'] ?></td>
                                <td><?= $review['id_sanpham'] ?></td>
                                <td><?= $review['id_khachhang'] ?></td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=tb_danhgia-delete&id=<?= $review['id'] ?>" onclick="return confirm('bạn có chắc chắn xóa không')" class="btn - btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>