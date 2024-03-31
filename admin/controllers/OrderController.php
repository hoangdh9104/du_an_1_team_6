<?php
function tb_donhangListAll()
{
    $title = 'Danh sách đơn hàng';
    $views = 'tb_donhang/index';
    $script = 'datatable';
    $script2 = 'tb_donhang/script';
    $style = 'datatable';

    $orders = listAll('tb_donhang');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function tb_donhangShowOne($id)
{
    $order = showOne('tb_donhang', $id);
    $dmsp = listAllDanhMuc();
    if (empty($order)) {
        e404();
    }
    $title = 'Chi tiết đơn hàng: ' . $order['ten_khachhang'];
    $views = 'tb_donhang/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function tb_donhangUpdate($id)
{
    $order = showOne('tb_donhang', $id);

    if (empty($order)) {
        e404();
    }
    $title = 'Danh sách đơn hàng: ' . $order['ten_khachhang'];
    $views = 'tb_donhang/update';

    if (!empty($_POST)) {
        $data = [
            "trang_thai" => $_POST['trang_thai'] ?? $_POST['trang_thai'],
        ];
        // CHƯA FIX

        
        // Nếu có lỗi sẽ về giao diện
        // $errors = validateorderUpdate($id, $data);
        // if (!empty($errors)) {
        //     $_SESSION['errors'] = $errors;
        // } else {
            update('tb_donhang', $id, $data);

            $_SESSION['success'] = 'Cập nhật thành công!';
        // }

        header('Location: ' . BASE_URL_ADMIN . '?act=tb_donhang-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function tb_donhangDelete($id)
{
    delete('tb_donhang', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=tb_donhang');
    exit();
}
