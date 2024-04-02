<?php

// require_once '../commons/helper.php';
?>
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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <h1>Sản phẩm</h1>
                <tr>
                    <th>Tên danh mục</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Gía bán</th>
                    <th>Gía khuyến mãi</th>
                    <th>Số lượng</th>
                    <th>Mô tả</th>
                    <th>Ngày tạo sản phẩm</th>
                </tr>
                <?php
                ?>
                <tr>
                    <td>
                        <?php
                        foreach ($dmsp as $key) : ?>
                            <?php
                            if ($key['id'] == $product['id_danhmuc']) {
                                echo $key['name'];
                            } else{
                                echo null;
                            }
                            ?>
                        <?php endforeach; ?>
                    </td>
                    <td><?= $product['name'] ?></td>
                    <td><img src="<?= BASE_URL . $product['img_thumbnail'] ?>" alt="" width="100px"></td>
                    <td><?= $product['gia_ban'] ?></td>
                    <td><?= $product['gia_khuyenmai'] ?></td>
                    <td><?= $product['so_luong'] >= 0 ? $product['so_luong'] : null ; ?></td>
                    <td><?= $product['mo_ta'] ?></td>
                    <td><?= $product['ngay_tao'] ?></td>
                </tr>
                <!-- bang binh luan theo san pham -->
            </table>
            <?php
            $a = 1;
            $idKeys = [];
            $x = getData_tb_binhluan($product['id']);
            if (!empty($x)) {
                foreach ($x as $key) {
                    foreach ($key as $item) {
                        $idKeys[] = $item;
                    }
                }
            } else {
                e404();
            }
            // debug($idKeys); 
            $ket_qua = layBanGhiTheoIDTrung($idKeys, 'tb_binhluan');
            // debug($ket_qua);    
            ?>
            <!-- hiển thị bảng -->
            <!-- bang binh luan theo san pham -->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <h1>Bình luận</h1>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Nội dung</th>
                        <th>Thời gian</th>
                        <th>Tác giả</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Nội dung</th>
                        <th>Thời gian</th>
                        <th>Tác giả</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($ket_qua as $key) :
                    ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td><?= $key['noi_dung']; ?></td>
                            <td><?= $key['thoi_gian']; ?></td>>
                            <td><?= $key['ten_khachhang']; ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
            <!-- end bang binh luan theo san pham -->
            <!-- hiển thị bảng -->
            <?php
            $a = 1;
            $idKeys_danhgia = [];
            $x = getData_tb_danhgia($product['id']);
            if (!empty($x)) {
                foreach ($x as $key) {
                    foreach ($key as $item) {
                        $idKeys_danhgia[] = $item;
                    }
                }
            } else {
                e404();
            }
            // debug($idKeys_danhgia);
            $ket_qua = layBanGhi_forTableDanhgia($idKeys_danhgia);
            // debug($ket_qua);
            ?>
            <!-- bang danh gia theo san pham -->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <h1>Đánh giá</h1>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Điểm đánh giá</th>
                        <th>Nội dung</th>
                        <th>Thời gian</th>
                        <th>Tên khách hàng</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Điểm đánh giá</th>
                        <th>Nội dung</th>
                        <th>Thời gian</th>
                        <th>Tên khách hàng</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($ket_qua as $key) :
                    ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td>
                                <?php
                                switch ($key['diem_danhgia']) {
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
                            <td><?= $key['noi_dung']; ?></td>>
                            <td><?= $key['thoi_gian']; ?></td>
                            <td><?= $key['name']; ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
            <!-- end bang danh gia theo san pham -->

            <a href="<?= BASE_URL_ADMIN ?>?act=tb_sanpham" class="btn btn-danger">Back to list</a>

        </div>
    </div>
</div>