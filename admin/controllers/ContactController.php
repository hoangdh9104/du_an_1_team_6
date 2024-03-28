<?php
function tb_lienheListAll()
{
    $title = 'Danh sách liên hệ';
    $views = 'tb_lienhe/index';
    $script = 'datatable';
    $script2 = 'tb_lienhe/script';
    $style = 'datatable';

    $contacts = listAll('tb_lienhe');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function tb_lienheShowOne($id)
{
    $contact = showOne('tb_lienhe', $id);

    if (empty($contact)) {
        e404();
    }
    $title = 'Chi tiết liên hệ: ' . $contact['ten_khachhang'];
    $views = 'tb_lienhe/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function tb_lienheUpdate($id)
{
    $contact = showOne('tb_lienhe', $id);

    if (empty($contact)) {
        e404();
    }
    $title = 'Danh sách liên hệ: ' . $contact['ten_khachhang'];
    $views = 'tb_lienhe/update';

    if (!empty($_POST)) {
        $data = [
            "trang_thai_lien_he" => $_POST['trang_thai_lien_he'] ?? $_POST['trang_thai_lien_he'],
        ];
        // CHƯA FIX

        
        // Nếu có lỗi sẽ về giao diện
        // $errors = validatecontactUpdate($id, $data);
        // if (!empty($errors)) {
        //     $_SESSION['errors'] = $errors;
        // } else {
            update('tb_lienhe', $id, $data);

            $_SESSION['success'] = 'Cập nhật thành công!';
        // }

        header('Location: ' . BASE_URL_ADMIN . '?act=tb_lienhe-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function tb_lienheDelete($id)
{
    delete('tb_lienhe', $id);

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=tb_lienhe');
    exit();
}
