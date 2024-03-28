<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $titel ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detail
            </h6>
        </div>
        <?php
        // $data = getData_tb_sanpham($comment['id']);
        ?>
        <div class="card-body">
            <?php
            $data_nameUser = getData_users_fortb_danhgia($review['id']);
            $data_nameProduct = getData_tb_sanpham_fortb_danhgia($review['id']);
            ?>
            <table class="table">
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Dữ liệu</th>
                </tr>
                <?php foreach ($review as $fieldName => $value) : ?>
                    <tr>
                        <td><?= ucfirst($fieldName) ?></td>
                        <td>
                            <?php
                            switch ($fieldName) {
                                    // đánh giá
                                case 'diem_danhgia':
                                    switch ($value) {
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
                                    break;
                                    //end đánh giá
                                default:
                                    echo $value;
                                    break;
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td>Tên khách hàng</td>
                    <td><?= isset($data_nameUser[0]['name']) ? $data_nameUser[0]['name']  : 'khách hàng không tồn tại' ;?></td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td><?= isset($data_nameProduct[0]['name']) ? $data_nameProduct[0]['name'] : 'sản phẩm không tồn tại' ;?></td>
                </tr>
            </table>
            <a href="<?= BASE_URL_ADMIN ?>?act=tb_danhgia" class="btn - btn-danger">Back-to-list</a>
        </div>
    </div>
</div>