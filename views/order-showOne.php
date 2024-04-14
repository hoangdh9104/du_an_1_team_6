<link href="<?= BASE_URL; ?>/assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
<div id="main">
    <div class="text_cart">
        <p>HOME</p>
        <i class='bx bx-chevron-right'></i>
        <p>Chi tiết đơn hàng</p>
    </div>
    <div class="style"></div>

    <div class="mt-10" style="margin-top: 30px;">
        <div class="table-cart d-flex justify-content-center">
            <table>
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Dữ liệu</th>
                </tr>
                <?php foreach ($order as $fieldName => $value) : ?>

                    <tr>
                        <td class="text text-dark"><?php
                                                    ucfirst($fieldName);
                                                    switch ($fieldName) {
                                                        case 'id':
                                                            echo 'Id đơn hàng';
                                                            break;
                                                        case 'id_khachhang':
                                                            echo 'Loại tài khoản';
                                                            break;
                                                        case 'ngay_mua':
                                                            echo 'Ngày mua hàng';
                                                            break;
                                                        case 'phuongthuc_thanhtoan':
                                                            echo 'Phương thức thanh toán';
                                                            break;
                                                        case 'trang_thai':
                                                            echo 'Trạng thái đơn hàng';
                                                            break;
                                                        case 'diachi_muahang':
                                                            echo 'Địa chỉ';
                                                            break;
                                                        case 'ten_khachhang':
                                                            echo 'Tên khách hàng';
                                                            break;
                                                        case 'sdt':
                                                            echo 'SĐT';
                                                            break;
                                                        case 'email':
                                                            echo 'Email';
                                                            break;
                                                        case 'id':
                                                            echo 'Email';
                                                            break;
                                                        case 'tong_tien':
                                                            echo 'Tổng tiền';
                                                            break;
                                                        default:
                                                            echo $value;
                                                            break;
                                                    }
                                                    ?>
                        </td>
                        <td class="text text-dark">
                            <?php
                            showDonHang($id);
                            switch ($fieldName) {
                                case 'id_khachhang':
                                    if ($value == 0) {
                                        echo '<span>Khách hàng</span>';
                                    } else {
                                        echo '<span>Quản trị viên</span>';
                                    }
                                    break;
                                case 'trang_thai':
                                    if ($value == 0) {
                                        echo '<span class="btn btn-outline-warning">Chưa xử lí</span>';
                                    }
                                    if ($value == 1) {
                                        echo '<span class="btn btn-outline-info">Đã xử lí</span>';
                                    }
                                    if ($value == 2) {
                                        echo '<span class="btn btn-outline-primary">Đã tiếp nhận</span>';
                                    }
                                    if ($value == 3) {
                                        echo '<span class="btn btn-outline-secondary">Đang giao hàng</span>';
                                    }
                                    if ($value == 4) {
                                        echo '<span class="btn btn-outline-success">Đã giao hàng</span>';
                                    }
                                    if ($value == 5) {
                                        echo '<span class="btn btn-outline-danger">Đã hủy</span>';
                                    }

                                    break;
                                case 'phuongthuc_thanhtoan':
                                    echo $value ? '<span class="btn btn-outline-success">Tiền mặt</span>' : '<span class="btn btn-outline-info">Online</span>';
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

        </div>
        <!-- <div class=" table table-bordered d-flex justify-content-center"> -->

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <h1>Sản phẩm</h1>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục sản phẩm</th>
                    <!-- <th>Số lượng sản phẩm mua</th> -->
                    <th>Hình ảnh sản phẩm</th>
                    <th>Gía tiền sản phẩm</th>
                    <th>Gía khuyến mãi sản phẩm</th>

                    <?php if ($order['trang_thai'] === 4) : ?>
                        <th>
                            Action
                        </th>
                    <?php endif ?>

                </tr>
            </thead>
            <?php
            $a = 1;
            $idKeys_chitiet_donhang = [];
            $x = getData_tb_chitiet_donhang($order['id']);
            if (!empty($x)) {
                foreach ($x as $key) {
                    foreach ($key as $item) {
                        $idKeys_chitiet_donhang[] = $item;
                    }
                }
            } else {
                e404();
            }
            $ket_qua = layBanGhi_forTableChitietDonHang($idKeys_chitiet_donhang);
            // debug($ket_qua);
            // lấy được id của chi tiêt đơn hàng
            // lấy bản ghi sản phẩm có id sản phẩm = id sản phẩm bảng chi tiết đơn hàng
            ?>
            <tbody>
                <!-- dữ liệu sp thuộc về hóa đơn -->
                <!-- sư dụng bảng chi tiết hóa đơn để show sản phẩm -->

                <?php
                foreach ($ket_qua as $key) :
                ?>
                    <tr>
                        <td class="text text-dark"><?= $a++ ?></td>
                        <td class="text text-dark"><?= $key['name']; ?></td>>
                        <td class="text text-dark">
                            <?php
                            foreach ($dmsp as $dm) : ?>
                                <?php
                                if ($dm['id'] == $key['id_danhmuc']) {
                                    echo $dm['name'];
                                } else {
                                    echo null;
                                }
                                ?>
                            <?php endforeach; ?>
                        </td>
                        <!-- <td class="text text-dark"></?= $key['soluong_sanpham']; ?></td> -->
                        <td class="text text-dark"><img src="<?= BASE_URL . $key['img_thumbnail'] ?>" alt="" width="100px"></td>
                        <td class="text text-dark"><?= $key['gia_ban']; ?></td> 
                        <td class="text text-dark"><?= $key['gia_khuyenmai']; ?></td>

                        <?php if ($order['trang_thai'] === 4) : ?>
                            <td>
                                <a href="<?= BASE_URL ?>?act=product-detail&id=<?= $key['id']; ?>&conditions=0" class="btn btn-info">đánh giá</a>
                            </td>
                        <?php endif ?>

                    </tr>
                <?php
                endforeach;
                ?>

            </tbody>

        </table>
        <!-- </div> -->

    </div>
</div>
</div>