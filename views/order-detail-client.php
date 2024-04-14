<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div id="main">
    <div class="text_cart">
        <p>HOME</p>
        <i class='bx bx-chevron-right'></i>
        <p>Shoping Cart</p>
    </div>
    <div class="style"></div>

    <div class="mt-10" style="margin-top: 30px;">

        <div class="table-cart" data-aos="zoom-out-right">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>SĐT</th>
                    <th>Ngày mua hàng</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
                <?php
                if (isset($_SESSION['user'])) :
                    foreach ($orders as $order) :
                ?>
                        <tr>
                            <td><?= $order['id']; ?></td>
                            <td><?= $order['ten_khachhang']; ?></td>
                            <td><?= $order['sdt']; ?></td>
                            <td><?= $order['ngay_mua']; ?></td>
                            <td><?php if ($order['trang_thai'] == 0) {
                                    echo '<span class="btn btn-outline-warning">Chưa xử lí</span>';
                                }
                                if ($order['trang_thai'] == 1) {
                                    echo '<span class="btn btn-outline-info">Đã xử lí</span>';
                                }
                                if ($order['trang_thai'] == 2) {
                                    echo '<span class="btn btn-outline-primary">Đã tiếp nhận</span>';
                                }
                                if ($order['trang_thai'] == 3) {
                                    echo '<span class="btn btn-outline-secondary">Đang giao hàng</span>';
                                }
                                if ($order['trang_thai'] == 4) {
                                    echo '<span class="btn btn-outline-success">Đã giao hàng</span>';
                                }
                                if ($order['trang_thai'] == 5) {
                                    echo '<span class="btn btn-outline-danger">Đã hủy</span>';
                                } ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>?act=order-showOne&id=<?= $order['id']; ?>" class="btn btn-info">Chi tiết</a>
                                <a href="<?= BASE_URL ?>?act=order-update&id=<?= $order['id']; ?>" class="btn btn-warning">Sửa</a>
                            </td>
                        </tr>
                <?php
                    endforeach;
                endif;

                ?>
            </table>
        </div>
    </div>
</div>