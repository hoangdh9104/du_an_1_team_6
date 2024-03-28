<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL . '?act=cart' ?>">Giỏ hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL . '?act=login' ?>">Đăng nhập</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Giỏ hàng của bạn</h2>

        <?php if (!empty($cartItems)) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Đoạn mã PHP để lặp qua sản phẩm trong giỏ hàng -->
                    <?php
                    $stt = 1;
                    $total = 0;
                    ?>
                    <?php foreach ($cartItems as $item) : ?>
                        
                        <tr>
                            <td><?= $stt++ ?></td>
                            <td><img src="<?= BASE_URL . $item['product_image'] ?>" style="width: 100px;"></td>
                            <td><?= $item['product_name'] ?></td>
                            <td><?= number_format($item['product_price']) ?></td>
                            <td>
                                <a class="btn btn-light" href="<?= BASE_URL . '?act=updateQuantity&change=-1&id_product=' . $item['id'] ?>" role="button">-</a>
                                <?= $item['quantity'] ?>
                                <a class="btn btn-light" href="<?= BASE_URL . '?act=updateQuantity&change=1&id_product=' . $item['id'] ?>" role="button">+</a>
                            </td>
                            <?php
                            $subtotal = $item['product_price'] * $item['quantity'];
                            $total += $subtotal;
                            ?>
                            <td><?= number_format($subtotal) ?></td>
                            <td>
                                <!-- Đường dẫn để xóa sản phẩm khỏi giỏ hàng -->
                                <a href="<?= BASE_URL . '?act=remoteCartItem&id_product=' . $item['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa sản phẩm trong giỏ hàng không?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-6">
                    <!-- Đường dẫn để xóa toàn bộ sản phẩm khỏi giỏ hàng -->
                    <a href="<?= BASE_URL . '?act=remoteCart' ?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa tất cả sản phẩm trong giỏ hàng không?')">Xóa giỏ hàng</a>
                </div>
                <div class="col-md-6 text-right">
                    <h4>Tổng tiền: <?= number_format($total) ?></h4>
                    <a href="<?= BASE_URL . '?act=order' ?>" class="btn btn-primary">Thanh toán</a>
                </div>
            </div>

        <?php } else { ?>
            <div class="alert alert-dark">
                Bạn chưa có sản phẩm nào trong giỏ hàng!
            </div>
        <?php } ?>
    </div>
</body>

</html>