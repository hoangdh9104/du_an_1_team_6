<?php 

// Khai báo các hàm dùng Global
if (!function_exists('require_file')) {
    function require_file($pathFolder) {
        $files = array_diff(scandir($pathFolder), ['.', '..']);

        foreach($files as $file) {
            require_once $pathFolder . $file;
        }
    }
}

if (!function_exists('debug')) {
    function debug($data) {
        echo "<pre>";

        print_r($data);

        die;
    }
}
if (!function_exists('e404')) {
    function e404() {
        echo "404 - Not found";
        die;
    }
}
if (!function_exists('middleware_auth_check')) {
    function middleware_auth_check($act, $arrRouteNeedAuth) {
        if ($act == 'login') {
            if (!empty($_SESSION['user'])) {
                header('Location: ' . BASE_URL);
                exit();
            }
        } 
        elseif (empty($_SESSION['user']) && in_array($act, $arrRouteNeedAuth)) {
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }
}
if (!function_exists('caculator_total_order')) {
    function caculator_total_order($flag = true) {
        if (isset($_SESSION['cart'])) {
            $total = 0;
            foreach ($_SESSION['cart'] as $item){
                $price = $item['gia_khuyenmai'] ?: $item['gia_ban'];
                $total += $price * $item['so_luong'];
            }
            return $flag ? number_format($total) : $total;
        } 
        
        return 0;
    }
}