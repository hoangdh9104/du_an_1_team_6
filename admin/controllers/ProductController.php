<?php
function tb_sanphamListAll()
{
    $title = 'Danh sách sản phẩms';
    $views = 'tb_sanpham/index';
    $script = 'datatable';
    $script2 = 'tb_sanpham/script';
    $style = 'datatable';

    $products = listAll('tb_sanpham');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function tb_sanphamShowOne($id)
{
    $product = showOne('tb_sanpham', $id);
    $dmsp = listAllDanhMuc();
    if (empty($product)) {
        e404();
    }
    $title = 'Chi tiết sản phẩm: ' . $product['name'];
    $views = 'tb_sanpham/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function tb_sanphamCreate()
{
    $title = 'Danh sách danh mục';
    $views = 'tb_sanpham/create';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? null,
            "gia_ban" => $_POST["gia_ban"] ?? null,
            "id_danhmuc" => $_POST["id_danhmuc"] ?? null,
            "gia_khuyenmai" => $_POST["gia_khuyenmai"] ?? null,
            "mo_ta" => $_POST["mo_ta"] ?? null,
            "ngay_tao" => $_POST["ngay_tao"] ?? null,
            "so_luong" => $_POST["so_luong"] ?? null
        ];
        $img_thumbnail = $_FILES['img_thumbnail'] ?? null;
        if (!empty($img_thumbnail)) {
            $imagePath = '/uploads/products' . time() . '-' . basename($img_thumbnail["name"]);

            if (move_uploaded_file($img_thumbnail["tmp_name"], PATH_UPLOAD . $imagePath)) {

                $data['img_thumbnail'] = $imagePath;
            } else {
                $data['img_thumbnail'] = null;
            }
        }


        $errors = validateProductCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('Location: ' . BASE_URL_ADMIN . '?act=tb_sanpham-create');
            exit();
        }
        insert('tb_sanpham', $data);
        // debug($data); die;
        $_SESSION['success'] = 'Thêm thành công!';
        header('Location: ' . BASE_URL_ADMIN . '?act=tb_sanpham');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function validateProductCreate($data)
{
    $errors = [];
    if (empty($data['name'])) {
        $errors[] = 'Vui lòng nhập tên';
    } else if (strlen($data['name']) > 50) {
        $errors[] = 'Tên tối đa 50 kí tự';
    } else if (!checkUniqueName('tb_sanpham', $data['name'])) {
        $errors[] = 'Tên sản phẩm đã được sử dụng';
    }
    if (!preg_match('/^\d+(\.\d{1,2})?$/', $data['gia_ban'])) {
        $errors[] = 'giá bán phải là số';
    }
    if (!preg_match('/^\d+(\.\d{1,2})?$/', $data['gia_khuyenmai'])) {
        $errors[] = 'giá khuyến mãi phải là số';
    }
    if (empty($data['mo_ta'])) {
        $errors[] = 'Vui lòng nhập mô tả';
    } else if (strlen($data['mo_ta']) < 10) {
        $errors[] = 'Mô tả tối thiểu 10 kí tự';
    }
    if (empty($data['ngay_tao'])) {
        $errors[] = 'Vui lòng nhập thời gian ngày tạo';
    } else if (isFutureTime($data['ngay_tao']) == true) {
        $errors[] = 'Ngày tạo không hợp lệ';
    }
    $quantity = $data['so_luong'];
    if (!is_numeric($quantity) || $quantity < 0 || !ctype_digit($quantity)) {
        $errors[] = 'Số lượng sản phẩm phải là một số nguyên dương';
    }
    if ($data['id_danhmuc'] == 0) {
        $errors[] = 'trường danh mục sản phẩm là bắt buộc';
    }
    return $errors;
}
function isFutureTime($userTime)
{
    // Chuyển đổi thời gian người dùng nhập vào thành timestamp
    $userTimestamp = strtotime($userTime);

    // Kiểm tra xem thời gian người dùng nhập vào có hợp lệ không
    if ($userTimestamp === false) {
        return false; // Trả về false nếu thời gian không hợp lệ
    }

    // Lấy timestamp hiện tại
    $currentTimestamp = time();

    // So sánh thời gian người dùng nhập vào với thời điểm hiện tại
    if ($userTimestamp > $currentTimestamp) {
        return true; // Trả về true nếu thời gian người dùng nhập vào lớn hơn thời điểm hiện tại
    } else {
        return false; // Trả về false nếu thời gian người dùng nhập vào không lớn hơn thời điểm hiện tại
    }
}
function tb_sanphamUpdate($id)
{
    $product = showOne('tb_sanpham', $id);
    $dmsp = listAllDanhMuc();
    if (empty($product)) {
        e404();
    }
    $title = 'Danh sách sản phẩm: ' . $product['name'];
    $views = 'tb_sanpham/update';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? $product['name'],
            "gia_ban" => $_POST["gia_ban"] ?? $product['gia_ban'],
            "id_danhmuc" => $_POST["id_danhmuc"] ?? $product['id_danhmuc'],
            "gia_khuyenmai" => $_POST["gia_khuyenmai"] ?? $product['gia_khuyenmai'],
            "mo_ta" => $_POST["mo_ta"] ?? $product['mo_ta'],
            "ngay_tao" => $_POST["ngay_tao"] ?? $product['ngay_tao'],
            "so_luong" => $_POST["so_luong"] ?? $product['so_luong']
        ];
        // Nếu có lỗi sẽ về giao disện
        $errors =  validateProductUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('tb_sanpham', $id, $data);
            $_SESSION['success'] = 'Cập nhật thành công!';
        }

        header('Location: ' . BASE_URL_ADMIN . '?act=tb_sanpham-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateProductUpdate($id, $data)
{
    // Tên - bắt buộc, tối đa 50 kí tự, không được trùng

    $errors = [];
    if (empty($data['name'])) {
        $errors[] = 'Vui lòng nhập tên';
    } else if (strlen($data['name']) > 50) {
        $errors[] = 'Tên tối đa 50 kí tự';
    } else if (!checkUniqueNameForUpdate('tb_sanpham', $id, $data['name'])) {
        $errors[] = 'Tên sản phẩm đã được sử dụng';
    }
    if (!preg_match('/^\d+(\.\d{1,2})?$/', $data['gia_ban'])) {
        $errors[] = 'giá bán phải là số';
    }
    if (!preg_match('/^\d+(\.\d{1,2})?$/', $data['gia_khuyenmai'])) {
        $errors[] = 'giá khuyến mãi phải là số';
    }
    if (empty($data['mo_ta'])) {
        $errors[] = 'Vui lòng nhập mô tả';
    } else if (strlen($data['mo_ta']) < 10) {
        $errors[] = 'Mô tả tối thiểu 10 kí tự';
    }
    if (empty($data['ngay_tao'])) {
        $errors[] = 'Vui lòng nhập thời gian ngày tạo';
    } else if (isFutureTime($data['ngay_tao']) == true) {
        $errors[] = 'Ngày tạo không hợp lệ';
    }
    $quantity = $data['so_luong'];
    if (!is_numeric($quantity) || $quantity < 0 || !ctype_digit($quantity)) {
        $errors[] = 'Số lượng sản phẩm phải là một số nguyên dương';
    }
    if ($data['id_danhmuc'] == 0) {
        $errors[] = 'trường danh mục sản phẩm là bắt buộc';
    }
    if ($data['id_danhmuc'] == 0) {
        $errors[] = 'trường danh mục sản phẩm là bắt buộc';
    }

    return $errors;
}

function tb_sanphamDelete($id)
{
    delete('tb_sanpham', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=tb_sanpham');
    exit();
}
