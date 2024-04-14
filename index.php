<?php 
session_start();
// Require file trong commons
require_once './commons/env.php';
require_once './commons/helper.php';
require_once './commons/connect-db.php';
require_once './commons/model.php';
// Require file trong controllers và models
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);
// Điều hướng
$act = $_GET['act'] ?? '/';
// Biến này cần khai báo được link cần đăng nhập mới vào được
$arrRouteNeedAuth = [
    'cart-add',
    'cart-list',
    'cart-inc',
    'cart-dec',
    'cart-del',
    'order-checkout',
    'order-purchase',
    'order-success',
    'order-detail-client',
    'order-showOne',
    'order-update',
]; 
// Kiểm tra xem user đã đăng nhập chưa
middleware_auth_check($act,$arrRouteNeedAuth);
match($act) {
    '/' => homeIndex(),
    // Authen
    'login' => authenShowFormLogin(),
    'logout' => authenLogout(),
    'sing-up' => authenShowFormSingup(),
    //contact
    'contact' => showFormContact(),
    // Cart
    // 'cart' => cartViews(),
    'cart-add' => cartAdd($_GET['id_sanpham'], $_GET['so_luong']),
    'cart-list' => cartList(),
    'cart-inc' => cartInc($_GET['id_sanpham']),
    'cart-dec' => cartDec($_GET['id_sanpham']),
    'cart-del' => cartDel($_GET['id_sanpham']),

    'order-checkout' => orderCheckOut(),
    'order-purchase' => orderPurchase(),
    'order-success' => orderSuccess(),
    'order-detail-client' => historyOrder(),
    'order-showOne' => tb_donhangShowOneClient($_GET['id']),
    'order-update' => tb_donhangUpdateClient($_GET['id']),
    //product-detail
    'product-detail' => showOneProduct($_GET['id']),
    'thanks' => showThanks(),
    //review
};

require_once './commons/disconnect-db.php';