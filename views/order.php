<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Logo</a>
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
        <div class="row">
            <div class="col-md-8">
                <h3 class="text-center mb-4">Thông tin sản phẩm</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
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
                                <td><?= $item['quantity'] ?></td>
                                <?php
                                $subtotal = $item['product_price'] * $item['quantity'];
                                $total += $subtotal;
                                ?>
                                <td><?= number_format($subtotal) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-right">
                    <h4>Tổng tiền: <?= number_format($total) ?></h4>
                </div>
            </div>
            <div class="col-md-4">
                <h3 class="text-center mb-4">Thông tin người đặt hàng</h3>
                <form action="<?= BASE_URL . '?act=addOrder' ?>" method="POST">
                    <div class="mb-3">
                        <label for="user_name" class="form-label">Họ và tên:</label>
                        <input type="text" class="form-control" id="user_name" name="user_name">
                    </div>
                    <div class="mb-3">
                        <label for="user_email" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="user_email" name="user_email">
                    </div>
                    <div class="mb-3">
                        <label for="user_phone" class="form-label">Số điện thoại:</label>
                        <input type="phone" class="form-control" id="user_phone" name="user_phone">
                    </div>
                    <div class="mb-3">
                        <label for="user_address" class="form-label">Địa chỉ:</label>
                        <textarea class="form-control" id="user_address" name="user_address"></textarea>
                    </div>
                    <input type="text" name="total_bill" value="<?= $total ?>" hidden>
                    <button type="submit" name="addOrder" class="btn btn-primary">Đặt hàng</button>
                </form>
            </div>


        </div>
    </div>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>