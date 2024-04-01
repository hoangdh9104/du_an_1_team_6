<?php
session_start();
// Require file trong commons
require_once '../commons/env.php';
require_once '../commons/helper.php';
require_once '../commons/connect-db.php';
require_once '../commons/model.php';
// Require file trong controllers và models
require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);

// Điều hướng
if (isset($_SESSION['user']) && ($_SESSION['user']['type'] == 1)) {
    $act = $_GET['act'] ?? '/';
    match ($act) {
        '/' => dashboard(),
        // Authen
        //  'login' => authenShowFormLogin(),
        //  'logout' => authenLogout(),
        //CRUD user
        'users' => userListAll(),
        'users-detail' => userShowOne($_GET['id']),
        'users-create' => userCreate(),
        'users-update' => userUpdate($_GET['id']),
        'users-delelte' => userDelete($_GET['id']),
        //ghép code lợi
        // CRUD danh mục
        // CRUD danh mục
        'tb_danhmuc' => tb_danhmucListAll(),
        'tb_danhmuc-detail' => tb_danhmucshowOneDanhMuc($_GET['id_danhmuc']),
        'tb_danhmuc-create' => tb_danhmucCreate(),
        'tb_danhmuc-update' => tb_danhmucupdateDanhMuc($_GET['id_danhmuc']),
        'tb_danhmuc-delete' => tb_danhmucdeleteDanhMuc($_GET['id_danhmuc']),

        // CRUD sản phẩm
        'tb_sanpham' => tb_sanphamListAll(),
        'tb_sanpham-detail' => tb_sanphamShowOne($_GET['id']),
        'tb_sanpham-create' => tb_sanphamCreate(),
        'tb_sanpham-update' => tb_sanphamUpdate($_GET['id']),
        'tb_sanpham-delete' => tb_sanphamDelete($_GET['id']),
        // ghép code ông hoàng

        // CRUD lienhe
        'tb_lienhe' => tb_lienheListAll(),
        'tb_lienhe-detail' => tb_lienheShowOne($_GET['id']),
        'tb_lienhe-update' => tb_lienheUpdate($_GET['id']),
        'tb_lienhe-delete' => tb_lienheDelete($_GET['id']),

        // CRUD khuyến mại
        'tb_khuyenmai' => tb_khuyenmaiListAll(),
        'tb_khuyenmai-detail' => tb_khuyenmaiShowOne($_GET['id']),
        'tb_khuyenmai-create' => tb_khuyenmaiCreate(),
        'tb_khuyenmai-update' => tb_khuyenmaiUpdate($_GET['id']),
        'tb_khuyenmai-delete' => tb_khuyenmaiDelete($_GET['id']),
        // CRUD bình luận

        // CRUD đánh giá

        //Setting
        'setting-form' => settingShowForm(),
        'setting-save' => settingSave(),
        // CRUD đơn hàng
        'tb_donhang' => tb_donhangListAll(),
        'tb_donhang-detail' => tb_donhangShowOne($_GET['id']),
        // 'tb_donhang-create' => tb_donhangCreate(),
        'tb_donhang-update' => tb_donhangUpdate($_GET['id']),
        'tb_donhang-delete' => tb_donhangDelete($_GET['id']),
    };
} else {
    header('Location: ' . BASE_URL . '?act=login');
}


require_once '../commons/disconnect-db.php';
