<?php 

// Khai báo các biến môi trường dùng Global
define('PATH_CONTROLLER',   __DIR__ . '/../controllers/');
define('PATH_MODEL',        __DIR__ . '/../models/');
define('PATH_VIEW',         __DIR__ . '/../views/');

define('PATH_CONTROLLER_ADMIN',   __DIR__ . '/../admin/controllers/');
define('PATH_MODEL_ADMIN',        __DIR__ . '/../admin/models/');
define('PATH_VIEW_ADMIN',         __DIR__ . '/../admin/views/');

define('PATH_UPLOAD',       __DIR__ . '/../');

define('BASE_URL',          'http://localhost/duan1nhom_6/');
define('BASE_URL_ADMIN',    'http://localhost/duan1nhom_6/admin/');



define('DB_HOST',           'localhost');
define('DB_PORT',           '3306');
define('DB_USERNAME',       'root');
define('DB_PASSWORD',       '');
define('DB_NAME',           'du_an_1_team6');
define('STATUS_DELIVERY_WFC',       0);     // WAITING FOR CONFIRMATION - chờ xác nhận
define('STATUS_DELIVERY_WFP',       1);     // WAITING FOR PICKUP - chờ lấy hàng ~ Đã xử lí
define('STATUS_DELIVERY_CF',        2);     // WAITING FOR CONFIRM - Đã tiếp nhận
define('STATUS_DELIVERY_WFD',       3);     // WAITING FOR DELIVERY - chờ giao hàng ~ Đang giao hàng
define('STATUS_DELIVERY_ED',        4);     // DELIVERED - đã giao 
define('STATUS_DELIVERY_CED',       5);    // CANCELED - đã hủy

define('STATUS_PAYMENT_UNPAID',     0);     // chưa thanh toán ~ Online
define('STATUS_PAYMENT_PAID',       1);     // đã thanh toán ~ Ship COD
// define('STATUS_PAYMENT_CANCELED',   -1);    // đơn hàng đã hủy


