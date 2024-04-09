<?php
function cartAdd($productID, $quantity = 0)
{
    // Kiểm tra xem là có sản phẩm với id kia không

    $product = showOne('tb_sanpham', $productID);

    if (empty($product)) {
        debug('404 Not Found');
    }
    // Kiểm tra trong bảng giỏ hàng thì đã có bản ghi nào của user đang đăng nhập chưa
    // Có rồi thì lấy ra cartID, nếu chưa sẽ tạo mới
    $cartID = getCartID($_SESSION['user']['id']);
    $_SESSION['cart_id'] = $cartID;

    // Add sản phẩm vào session giỏ hàng : $_SESSION['cart'][$productID] = $product
    // Add tiếp sản phẩm vào chi tiết giỏ hàng
    if (!isset($_SESSION['cart'][$productID])) {
        $_SESSION['cart'][$productID] = $product;
        $_SESSION['cart'][$productID]['so_luong'] = $quantity;

        insert('tb_chi_tiet_giohang', [
            'id_giohang' => $cartID,
            'id_sanpham' => $productID,
            'so_luong' => $quantity
        ]);
    } else {
        $qtyTMP = $_SESSION['cart'][$productID]['so_luong'] += $quantity;

        updateQuantityByCartIDAndProductID($cartID, $productID, $qtyTMP);
    }
    // Chuyển hướng qua trang list cart

    header('Location: ' . BASE_URL . '?act=cart-list');
}

function cartList()
{
    $views = 'cart-list';
    $title = 'Danh sách giỏ hàng';
    $script = 'cart';
    $style = 'cart';

    $coupons = listAll('tb_chi_tiet_giohang');
    $coupon = showCoupon();
    // require_once PATH_VIEW . 'layouts/master.php';

    // debug($_SESSION['cart']);
    require_once PATH_VIEW . 'layouts/master.php';
}

function cartInc($productID)
{
    // Kiểm tra sản phẩm tồn tại không ?
    $product = showOne('tb_sanpham', $productID);

    if (empty($product)) {
        debug('404 Not Found');
    }
    // Tăng số lượng lên 1
    if (isset($_SESSION['cart'][$productID]) && $_SESSION['cart'][$productID]['so_luong'] < $product['so_luong']) {
        $qtyTMP = $_SESSION['cart'][$productID]['so_luong'] += 1;

        updateQuantityByCartIDAndProductID($_SESSION['cartID'], $productID, $qtyTMP);
    }
    // Chuyển hướng qua trang list cart

    header('Location: ' . BASE_URL . '?act=cart-list');
}

function cartDec($productID)
{
    // Kiểm tra sản phẩm tồn tại không ?
    $product = showOne('tb_sanpham', $productID);

    if (empty($product)) {
        debug('404 Not Found');
    }

    // Giảm số lượng xuống 1
    if (isset($_SESSION['cart'][$productID]) && $_SESSION['cart'][$productID]['so_luong'] > 1) {
        $qtyTMP = $_SESSION['cart'][$productID]['so_luong'] -= 1;

        updateQuantityByCartIDAndProductID($_SESSION['cartID'], $productID, $qtyTMP);
    }
    // Chuyển hướng qua trang list cart

    header('Location: ' . BASE_URL . '?act=cart-list');
}

function cartDel($productID)
{
    // Kiểm tra sản phẩm tồn tại không ?
    $product = showOne('tb_sanpham', $productID);

    if (empty($product)) {
        debug('404 Not Found');
    }
    // Xóa bản ghi trong session và cart-item

    if (isset($_SESSION['cart'][$productID])) {
        unset($_SESSION['cart'][$productID]);

        deleteCartItemByCartIDAndProductID($_SESSION['cartID'], $productID);
    }
    // Chuyển hướng qua trang list cart

    header('Location: ' . BASE_URL . '?act=cart-list');
}
