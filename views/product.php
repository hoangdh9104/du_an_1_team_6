<link rel="stylesheet" href="<?= BASE_URL ?>assets/client/src/css/product.css">
<link href="<?= BASE_URL; ?>/assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
<style>
    .product-description {
        width: 100%;
        padding: 20px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.6;
    }
</style>
<?php
?>
<div id="main">
    <div class="text_cart">
        <p>Trang chủ</p>
        <i class='bx bx-chevron-right'></i>
        <p><?= $title ?></p>
    </div>
    <div class="style"></div>
    <div class="grid">
        <div class="grid-left">
            <img src="<?= BASE_URL . $product['img_thumbnail'] ?>" width="80%" alt="">
        </div>
        <div class="grid-mid">


            <div class="img">
                <img id="img" src="<?= BASE_URL . $product['img_thumbnail'] ?>" width="80%" height="300px" alt="">
            </div>
        </div>
        <?php
        ?>
        <div class="grid-right">
            <h3><?php
                foreach ($dmsp as $key) : ?>
                    <?php
                    if ($key['id'] == $product['id_danhmuc']) {
                        echo $key['name'];
                    } else {
                        echo null;
                    }
                    ?>
                <?php endforeach; ?> : <?= $product['name'] ?></h3>
            <p><?= $product['name'] ?></p>
            <h5 class="font-weight-bold text-danger"><?= number_format($product['gia_khuyenmai'] ?: $product['gia_ban']); ?> USD</h5>
            <div>
                <?php if ($product['so_luong'] > 0) : ?>
                    <span>
                        <?= $product['so_luong'] >= 0 ? $product['so_luong'] . ' sản phẩm có sẵn' : 'Hết hàng tồn kho'; ?>
                    </span>
                    <p>
                        <br>
                        <a href="<?= BASE_URL . '?act=cart-add&id_sanpham=' . $product['id'] . '&so_luong=1' ?>">
                            <span class="btn btn-info">Thêm vào giỏ hàng</span>
                        </a>
                        <br>
                    </p>
                <?php else : ?>
                    <p>Hết sản phẩm</p>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <div class="container mt-4">
        <br>
        <h3 class="text-warning">Mô tả : </h3>
        <hr>
        <div class="product-description" >
            <?php
             echo "<pre>";
             echo $product['mo_ta']; 
             echo "<pre>";
             ?>
        </div>
    </div>
    <br>

    <div class="container mt-4">    
        <!-- List feedback -->
        <h3 class="text-warning">KHÁCH HÀNG BÌNH LUẬN : </h3>
        <?php
        $idKeys = [];
        $x = getData_tb_binhluan($product['id']);
        ?>
        <?php if (!empty($x)) : ?>
            <?php foreach ($x as $key) {
                foreach ($key as $item) {
                    $idKeys[] = $item;
                }
            }
            $ket_qua = layBanGhiTheoIDTrung($idKeys, 'tb_binhluan');
            ?>
            <hr>
            <div class="listBinhLuan">
                <?php foreach ($ket_qua as $feedback) : ?>
                    <div>
                        <div class="d-flex align-items-center">
                            <span class="fs-4 mx-2">Tên tác giả : <b><?= $feedback['ten_khachhang'] ?></b>. </span>
                            <span class="ms-auto">Ngày bình luận: <b><?= $feedback['thoi_gian'] ?></b> </span>
                        </div>
                        <div class="alert alert-info fs-5 ms-5" role="alert">
                            <?= $feedback['noi_dung'] ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <hr>
        <?php
        // Thông báo lỗi
        if (isset($_SESSION['errors'])) :
        ?>
            <div class="alert alert-danger">
                <ul>
                    <?php
                    foreach ($_SESSION['errors'] as $error) :
                    ?>
                        <li><?= $error ?></li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            </div>
            <?php unset($_SESSION['errors']); ?>
        <?php
        endif;
        ?>
        <form method="post" class='form' action="">
            <input value="<?= isset($_SESSION['data']) ? $_SESSION['data']['ten_khachhang'] : null; ?>" class="text" style="width: 300px; margin-bottom: 10px" type="text" name="ten_tacgia" placeholder=" Nhập tên của bạn">
            <textarea class="text" cols="100" rows="5" name="feedback_content" placeholder=" Nhập nội dung bình luận"><?= isset($_SESSION['data']) ? $_SESSION['data']['noi_dung'] : null; ?></textarea>
            <br>
            <input type="hidden" name="id_sanpham" value="<?= $product['id'] ?>">
            <input type="hidden" name="ngay_binh_luan" value="<?= date("Y-m-d H:i:s", $thoi_gian_hien_tai) ?>">
            <button type="submit" class="btn btn-primary" name="feedback_submit">Gửi bình luận</button>
        </form>
    </div>
    <div class="container mt-4">
        <br>
        <h3 class="text-warning">ĐÁNH GIÁ SẢN PHẨM</h3>
        <?php
        $idKeys_danhgia = [];
        $x = getData_tb_danhgia($product['id']);
        ?>
        <?php if (!empty($x)) : ?>
            <?php foreach ($x as $key) {
                foreach ($key as $item) {
                    $idKeys_danhgia[] = $item;
                }
            }
            $ket_qua = layBanGhi_forTableDanhgia($idKeys_danhgia);
            ?>
            <hr>
            <div class="listDanhGia">
                <?php foreach ($ket_qua as $feedback) : ?>
                    <div>
                        <div class="d-flex flex-column mb-3">
                            <span class="">Tên khách hàng : <b><?= $feedback['name'] ?></b>. </span>
                            <span class="ms-auto">Điểm đánh giá: 
                                <b>
                                <?php
                                switch ($feedback['diem_danhgia']) {
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

                                </b> 
                            </span>
                            <span class="ms-auto">Ngày đánh giá: <b><?= $feedback['thoi_gian'] ?></b> </span>
                            <br>
                            <div class="alert alert-info fs-5 ms-5" role="alert">
                             <?= $feedback['noi_dung'] ?>
                            </div>
                        </div>
                        
                    </div>
                    <hr>        
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <span></span>
    </div>

</div>
<script src="<?= BASE_URL ?>assets/client/src/js/product.js"></script>