<?php
function tb_khuyenmaiListAll()
{
    $title = 'Danh sách coupon';
    $views = 'tb_khuyenmai/index';
    $script = 'datatable';
    $script2 = 'tb_khuyenmai/script';
    $style = 'datatable';
    updateStatus();

    $coupons = listAll('tb_khuyenmai');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function tb_khuyenmaiShowOne($id)
{
    $coupon = showOne('tb_khuyenmai', $id);

    if (empty($coupon)) {
        e404();
    }
    $title = 'Chi tiết coupon: ' . $coupon['ten_khuyenmai'];
    $views = 'tb_khuyenmai/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function tb_khuyenmaiCreate()
{
    $title = 'Danh sách coupon';
    $views = 'tb_khuyenmai/create';

    if (!empty($_POST)) {
        $data = [
            "ten_khuyenmai" => $_POST['ten_khuyenmai'] ?? null,
            "ma_khuyenmai" => $_POST['ma_khuyenmai'] ?? null,
            "thoigian_bd" => $_POST['thoigian_bd'] ?? null,
            "thoigian_kt" => $_POST['thoigian_kt'] ?? null,
            "gia_tri" => $_POST['gia_tri'] ?? null,        

            // "trang_thai" => $_POST['trang_thai'] ?? null,
        ];

        $errors = validatecouponCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('Location: ' . BASE_URL_ADMIN . '?act=tb_khuyenmai-create');
            exit();
        }

        insert('tb_khuyenmai', $data);

        $_SESSION['success'] = 'Thêm thành công!';
        header('Location: ' . BASE_URL_ADMIN . '?act=tb_khuyenmai');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validatecouponCreate($data)
{
    // Tên - bắt buộc, tối đa 50 kí tự
    // ma_khuyenmai - bắt buộc, phải là ma_khuyenmai, không bị trùng
    // Mật khẩu - bắt buộc, độ dài nhỏ nhất là 8, lớn nhất là 20
    // Chức vụ - bắt buộc là 0 hoặc 1

    $errors = [];
    if (empty($data['ten_khuyenmai'])) {
        $errors[] = 'Vui lòng nhập tên';
    } else if (strlen($data['ten_khuyenmai']) > 50) {
        $errors[] = 'Tên tối đa 50 kí tự';
    }
    // Validatecoupon ma_khuyenmai
    if (empty($data['ma_khuyenmai'])) {
        $errors[] = 'Vui lòng nhập ma_khuyenmai';
    } else if (!checkUniqueKhuyenmai('tb_khuyenmai', $data['ma_khuyenmai'])) {
        $errors[] = 'ma_khuyenmai đã được sử dụng';
    }
    // Validatecoupon bắt đầu
    if (empty($data['thoigian_bd'] && $data['thoigian_kt'] > $data['thoigian_bd'])) {
        $errors[] = 'Vui lòng nhập thời gian';
    }
     // Validatecoupon kết thúc
     if (empty($data['thoigian_kt']) ) {
        $errors[] = 'Vui lòng nhập thời gian';
    }
    // Giá KM
    if (empty($data['gia_tri'])) {
        $errors[] = 'Vui lòng khuyến mại';
    } 
    // Validatecoupon chức vụ
    // if ($data['trang_thai'] === null) {
    //     $errors[] = 'Vui lòng nhập chức vụ';
    // } else if (!in_array($data['trang_thai'], [0, 1])) {
    //     $errors[] = 'Chức vụ phải là 0 hoặc 1';
    // }
    return $errors;
}

function tb_khuyenmaiUpdate($id)
{
    $coupon = showOne('tb_khuyenmai', $id);

    if (empty($coupon)) {
        e404();
    }
    $title = 'Danh sách coupon: ' . $coupon['ten_khuyenmai'];
    $views = 'tb_khuyenmai/update';

    if (!empty($_POST)) {
        $data = [
            "ten_khuyenmai" => $_POST['ten_khuyenmai'] ?? $_POST['ten_khuyenmai'],
            "ma_khuyenmai" => $_POST['ma_khuyenmai'] ?? $_POST['ma_khuyenmai'],
            "thoigian_bd" => $_POST['thoigian_bd'] ?? $_POST['thoigian_bd'],
            "thoigian_kt" => $_POST['thoigian_kt'] ?? $_POST['thoigian_kt'],        
            "gia_tri" => $_POST['gia_tri'] ?? $_POST['gia_tri'],        
            // "trang_thai" => $_POST['trang_thai'] ?? $_POST['trang_thai'],
        ];
        // Nếu có lỗi sẽ về giao diện
        $errors = validatecouponUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('tb_khuyenmai', $id, $data);
            $_SESSION['success'] = 'Cập nhật thành công!';
        }

        header('Location: ' . BASE_URL_ADMIN . '?act=tb_khuyenmai-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validatecouponUpdate($id, $data)
{
    // Tên - bắt buộc, tối đa 50 kí tự
    // ma_khuyenmai - bắt buộc, phải là ma_khuyenmai, không bị trùng
    // Mật khẩu - bắt buộc, độ dài nhỏ nhất là 8, lớn nhất là 20
    // Chức vụ - bắt buộc là 0 hoặc 1

    $errors = [];
    if (empty($data['ten_khuyenmai'])) {
        $errors[] = 'Vui lòng nhập tên';
    } else if (strlen($data['ten_khuyenmai']) > 50) {
        $errors[] = 'Tên tối đa 50 kí tự';
    }
    // Validatecoupon ma_khuyenmai
    if (empty($data['ma_khuyenmai'])) {
        $errors[] = 'Vui lòng nhập ma_khuyenmai';
    } else if (!checkUniqueKhuyenmaiForUpdate('tb_khuyenmai', $id, $data['ma_khuyenmai'])) {
        $errors[] = 'ma_khuyenmai đã được sử dụng';
    }
    // Validate bắt đầu
    if (empty($data['thoigian_bd'] && $data['thoigian_kt'] > $data['thoigian_bd']) ) {
        $errors[] = 'Vui lòng nhập thời gian';
    } 
    // Validate kết thúc
    if (empty($data['thoigian_kt'])) {
        $errors[] = 'Vui lòng nhập thời gian';
    }
    // Giá KM
    if (empty($data['gia_tri'] && $data['gia_tri'] > 0) ) {
        $errors[] = 'Vui lòng khuyến mại lớn hơn 0';
    } 
    // Validate chức vụ
    // if ($data['trang_thai'] === null) {
    //     $errors[] = 'Vui lòng nhập chức vụ';
    // } else if (!in_array($data['trang_thai'], [0, 1])) {
    //     $errors[] = 'Chức vụ phải là 0 hoặc 1';
    // }
    return $errors;
}

function tb_khuyenmaiDelete($id)
{
    delete('tb_khuyenmai', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=tb_khuyenmai');
    exit();
}
function updateStatus(){
    $t = date("Y-m-d");
    $coupons = listAll('tb_khuyenmai');
    foreach ($coupons as $cou) {
        // var_dump($cou['thoigian_bd']);

        if ($cou['thoigian_bd'] <= $t && $cou['thoigian_kt'] >= $t) {
            update('tb_khuyenmai', $cou['id'], ['trang_thai' => 1]);
        } else {
            update('tb_khuyenmai', $cou['id'], ['trang_thai' => 0]);
        }

        // if ($cou['thoigian_kt'] <= $t && $cou['trang_thai'] == 1 ) {
        //     # update trạng thái là 0
        //     update('tb_khuyenmai', $cou['id'], ['trang_thai' => 0]);
        // } 
        // else {
        //     update('tb_khuyenmai', $cou['id'], ['trang_thai' => 1]);     
        // }
    }
    // $data = ['1'];
    // $ids = showOne('tb_khuyenmai', $id);

    // if(date("Y-m-d",$t) ==  $_POST['thoigian_bd']){
    //     update('tb_khuyenmai', $ids, $data);
    // }
}