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

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }

    h2 {
        text-align: center;
    }

    .form-container {
        max-width: 500px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .rating input[type="radio"] {
        display: none;
    }

    .rating label {
        cursor: pointer;
        font-size: 25px;
        float: right;
    }

    .rating label:before {
        content: "\2605";
    }

    .rating input[type="radio"]:checked~label:before {
        color: orange;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
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
        <div class="product-description">
            <?php
            echo "<pre>";
            echo $product['mo_ta'];
            echo "<pre>";
            ?>
        </div>
    </div>
    <br>
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
        <?php if (isset($_GET['conditions']) && $_GET['conditions'] == 0) : ?>
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
            <div class="form-container">
                <form class='form' method="post" action="">
                    <div class="form-group">
                        <label for="productName">Tên Sản Phẩm:</label>
                        <input type="text" readonly id="productName" value="<?= $product['name'] ?>" name="productName" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên của bạn:</label>
                        <input type="text" readonly id="name" value="<?= $_SESSION['user']['name'] ?>" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email của bạn:</label>
                        <input type="text" readonly id="email" value="<?= $_SESSION['user']['email'] ?>" name="email" required>
                    </div>
                    <input type="hidden" name="id_sanpham" value="<?= $product['id'] ?>">
                    <input type="hidden" name="id_khachhang" value="<?= $_SESSION['user']['id'] ?>">
                    <input type="hidden" name="thoi_gian" value="<?= date("Y-m-d H:i:s", $thoi_gian_hien_tai) ?>">
                    <div class="form-group rating">
                        <input type="radio" id="quality5" name="quality" value="5"><label for="quality5"></label>
                        <input type="radio" id="quality4" name="quality" value="4"><label for="quality4"></label>
                        <input type="radio" id="quality3" name="quality" value="3"><label for="quality3"></label>
                        <input type="radio" id="quality2" name="quality" value="2"><label for="quality2"></label>
                        <input type="radio" id="quality1" name="quality" value="1"><label for="quality1"></label>
                        <span>Chất lượng sản phẩm</span>
                    </div>
                    <!-- Thêm các form-group khác tương tự cho các mục khác -->
                    <div class="form-group">
                        <label for="comment">Nhận Xét Thêm:</label>
                        <textarea id="comment" name="comment" rows="4"><?= isset($_SESSION['data']) ? $_SESSION['data']['noi_dung'] : null; ?></textarea>
                    </div>
                    <button name="submit" type="submit">Gửi Đánh Giá</button>
                </form>
            </div>
        <?php endif ?>
    </div>

</div>
<script src="<?= BASE_URL ?>assets/client/src/js/product.js"></script>