<?php
function tb_danhmucListAll()
{
    $title = 'Danh sách danh mục';
    $views = 'tb_danhmuc/index';
    $script = 'datatable';
    $script2 = 'tb_danhmuc/script';
    $style = 'datatable';

    $categories = listAllDanhMuc();

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function tb_danhmucshowOneDanhMuc($id_danhmuc)
{
    $category = showOneDanhMuc('tb_danhmuc', $id_danhmuc);

    if (empty($category)) {
        e404();
    }
    $title = 'Chi tiết danh mục: ' . $category['name'];
    $views = 'tb_danhmuc/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function tb_danhmucCreate()
{
    $title = 'Danh sách danh mục';
    $views = 'tb_danhmuc/create';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? null,
        ];

        $errors = validateCategoryCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('Location: ' . BASE_URL_ADMIN . '?act=tb_danhmuc-create');
            exit();
        }

        insert('tb_danhmuc', $data);
        // debug($data); die;
        $_SESSION['success'] = 'Thêm thành công!';
        header('Location: ' . BASE_URL_ADMIN . '?act=tb_danhmuc');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCategoryCreate($data)
{
    // Tên - bắt buộc, tối đa 50 kí tự, không được trùng


    $errors = [];
    if (empty($data['name'])) {
        $errors[] = 'Vui lòng nhập tên';
    } else if (strlen($data['name']) > 50) {
        $errors[] = 'Tên tối đa 50 kí tự';
    } else if (!checkUniqueName('tb_danhmuc', $data['name'])) {
        $errors[] = 'Tên danh mục đã được sử dụng';
    }
    return $errors;
}

function tb_danhmucupdateDanhMuc($id_danhmuc)
{
    $category = showOneDanhMuc('tb_danhmuc', $id_danhmuc);

    if (empty($category)) {
        e404();
    }
    $title = 'Danh sách danh mục: ' . $category['name'];
    $views = 'tb_danhmuc/update';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? $category['name'],
        ];
        
        // Nếu có lỗi sẽ về giao diện
        $errors =  validateCategoryUpdate($id_danhmuc, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            updateDanhMuc('tb_danhmuc', $id_danhmuc, $data);

            $_SESSION['success'] = 'Cập nhật thành công!';
        }
        // debug($data);

        header('Location: ' . BASE_URL_ADMIN . '?act=tb_danhmuc-update&id_danhmuc=' . $id_danhmuc);
        
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCategoryUpdate($id_danhmuc, $data)
{
    // Tên - bắt buộc, tối đa 50 kí tự, không được trùng

    $errors = [];
    if (empty($data['name'])) {
        $errors[] = 'Vui lòng nhập tên';
    } else if (strlen($data['name']) > 50) {
        $errors[] = 'Tên tối đa 50 kí tự';
    } else if (!checkUniqueNameForUpdate('tb_sanpham', $id_danhmuc, $data['name'])) {
        $errors[] = 'Tên danh mục đã được sử dụng';
    }
   
    return $errors;
}

function tb_danhmucdeleteDanhMuc($id_danhmuc)
{
    deleteDanhMuc('tb_danhmuc', $id_danhmuc);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=tb_danhmuc');
    exit();
}
