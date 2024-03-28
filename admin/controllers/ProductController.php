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
            "gia_ban" => $_POST["gia_ban"] ?? null
        ];
        $img_thumbnail = $_FILES['img_thumbnail'] ?? null;
        if(!empty($img_thumbnail)) {
            $imagePath ='/uploads/products' . time() . '-'. basename($img_thumbnail["name"]);

            if (move_uploaded_file($img_thumbnail["tmp_name"], PATH_UPLOAD . $imagePath)) {

                $data ['img_thumbnail'] = $imagePath;
              } 
              else { 
                $data ['img_thumbnail'] = null;
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
    // Tên - bắt buộc, tối đa 50 kí tự, không được trùng


    $errors = [];
    if (empty($data['name'])) {
        $errors[] = 'Vui lòng nhập tên';
    } else if (strlen($data['name']) > 50) {
        $errors[] = 'Tên tối đa 50 kí tự';
    } else if (!checkUniqueName('tb_sanpham', $data['name'])) {
        $errors[] = 'Tên danh mục đã được sử dụng';
    }
    return $errors;
}

function tb_sanphamUpdate($id)
{
    $product = showOne('tb_sanpham', $id);

    if (empty($product)) {
        e404();
    }
    $title = 'Danh sách sản phẩm: ' . $product['name'];
    $views = 'tb_sanpham/update';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? $product['name'],
            
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
        $errors[] = 'Tên danh mục đã được sử dụng';
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
