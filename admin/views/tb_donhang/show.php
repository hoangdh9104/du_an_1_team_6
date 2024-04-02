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

                <?php foreach ($order as $fieldName => $value) : ?>

                    <tr>
                        <td><?php
                            ucfirst($fieldName);
                            switch ($fieldName) {
                                case 'id':
                                    echo 'Id đơn hàng';
                                    break;
                                case 'id_khachhang':
                                    echo 'Id khách hàng';
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
                                    echo 'Id đơn hàng';
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
                        <td>
                            <?php
                            showDonHang($id);
                            switch ($fieldName) {
                                case 'trang_thai':
                                    if ($value == 0) {
                                        echo '<span class="badge badge-warning">Chưa xử lí</span>';
                                    }
                                    if ($value == 1) {
                                        echo '<span class="badge badge-info">Đã xử lí</span>';
                                    }
                                    if ($value == 2) {
                                        echo '<span class="badge badge-primary">Đã tiếp nhận</span>';
                                    }
                                    if ($value == 3) {
                                        echo '<span class="badge badge-secondary">Đang giao hàng</span>';
                                    }
                                    if ($value == 4) {
                                        echo '<span class="badge badge-success">Đã giao hàng</span>';
                                    }
                                    if ($value == 5) {
                                        echo '<span class="badge badge-danger">Đã hủy</span>';
                                    }

                                    break;
                                case 'phuongthuc_thanhtoan':
                                    echo $value ? '<span class="badge badge-success">Tiền mặt</span>' : '<span class="badge badge-info">Online</span>';
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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <h1>Sản phẩm</h1>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục sản phẩm</th>
                        <th>Số lượng sản phẩm mua</th>
                        <th>Hình ảnh sản phẩm</th>
                        <th>Gía tiền sản phẩm</th>
                        <th>Gía khuyến mãi sản phẩm</th>

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
                    $total = 0;
                    foreach ($ket_qua as $key) :
                    ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td><?= $key['name']; ?></td>>
                            <td>
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
                            <td><?= $key['soluong_sanpham']; ?></td>
                            <td><img src="<?= BASE_URL . $key['img_thumbnail'] ?>" alt="" width="100px"></td>
                            <td><?= $key['gia_ban']; ?></td>
                            <td><?= $key['gia_khuyenmai']; ?></td>
                            <?php
                            $total += ($key['gia_ban']*$key['soluong_sanpham']) - $key['gia_khuyenmai'];
                            ?>
                        </tr>
                    <?php
                    endforeach;
                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5">Tổng tiền hóa đơn</th>
                        <th colspan="2"><?= $total ?> USD</th>
                    </tr>
                </tfoot>

            </table>


            <a href="<?= BASE_URL_ADMIN ?>?act=tb_donhang" class="btn btn-danger">Back to list</a>

        </div>
    </div>
</div>