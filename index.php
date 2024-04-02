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
    
]; 

// Kiểm tra xem user đã đăng nhập chưa
// middleware_auth_check($act);
match($act) {
    '/' => homeIndex(),
    // Authen
    'login' => authenShowFormLogin(),
    'logout' => authenLogout(),
    'sing-up' => authenShowFormSingup(),
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

    
};

require_once './commons/disconnect-db.php';