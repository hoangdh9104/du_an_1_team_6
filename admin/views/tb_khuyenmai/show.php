<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detail
            </h6>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Dữ liệu</th>
                </tr>

                <?php foreach ($coupon as $fieldName => $value) : ?>
                    <tr>
                        <td><?php ucfirst($fieldName);
                            switch ($fieldName) {
                                case 'id':
                                    echo 'Id khuyến mại';
                                    break;
                                case 'ten_khuyenmai':
                                    echo 'Tên chương trình';
                                    break;
                                case 'ma_khuyenmai':
                                    echo 'Mã khuyến mại';
                                    break;
                                case 'thoigian_bd':
                                    echo 'Thời gian bắt đầu';
                                    break;
                                case 'thoigian_kt':
                                    echo 'Thời gian kết thúc';
                                    break;
                                case 'gia_tri':
                                    echo 'Số tiền giảm giá';
                                    break;
                                case 'trang_thai':
                                    echo 'Trạng thái';
                                    break;
                                default:
                                    echo $value;
                                    break;
                            }
                            ?></td>
                        <td>
                            <?php
                            switch ($fieldName) {
                                case 'trang_thai':
                                    echo $value ? '<span class="badge badge-success">On</span>' : '<span class="badge badge-warning">Off</span>';
                                    break;
                                default:
                                    echo $value;
                                    break;
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
            <a href="<?= BASE_URL_ADMIN ?>?act=tb_khuyenmai" class="btn btn-danger">Quay lại</a>

        </div>
    </div>
</div>