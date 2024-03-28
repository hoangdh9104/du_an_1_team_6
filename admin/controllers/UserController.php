<?php
function userListAll()
{
    $titel = 'Danh Sách User';
    $views = 'users/index';
    $script = 'datatable';
    $script2 = 'users/script';
    $style = 'datatable';
    $users = listAll('users');
    // debug($users);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function userShowOne($id)
{

    $user = showOne('users', $id);
    if (empty($user)) {
        e404();
    }
    $titel = 'Chi tiết User: ' . $user['name'];
    $views = 'users/show';
    // debug($user);

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function userUpdate($id)
{
    $user = showOne('users', $id);
    if (empty($user)) {
        e404();
    }
    $titel = 'Cập nhật User: ' . $user['name'];
    $views = 'users/update';
    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? null,
            "email" => $_POST['email'] ?? null,
            "password" => $_POST['password'] ?? null,
            "type" => $_POST['type'] ?? null,
        ];
        $errors = validateUpdate($id,$data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            
        }else{
            update('users', $id, $data);
            $_SESSION['success'] = 'Cập nhật thành công';
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=users-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function validateUpdate($id,$data){
    $errors = [];
    if(empty($data['name'])){
        $errors[] = 'trường name là bắt buộc';
    }else if(strlen($data['name']) > 50){
        $errors[] = 'trường name tối đa 50 ký tự';
    }

    if(empty($data['email'])){
        $errors[] = 'trường email là bắt buộc';
    }else if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
        $errors[] = 'trường email không đúng định dạng';
    }else if(!checkUniqueEmailForUpdate('users', $id ,$data['email'])){
        $errors[] = 'email đã tồn tại';
    }

    if(empty($data['password'])){
        $errors[] = 'trường password là bắt buộc';
    }else if(strlen($data['password'])  < 8 || strlen($data['password'])  > 20 ){
        $errors[] = 'trường password tối thiểu 8 ký tự và tối đa 20 ký tự';
    }

    if($data['type']===null){
        $errors[] = 'trường type là bắt buộc';
    }else if(! in_array($data['type'], [0,1])){
        $errors[] = 'trường type phải là 0 hoặc 1';
    }
    return $errors;
}
function userCreate()
{
    $titel = 'Thêm User';
    $views = 'users/create';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? null,
            "email" => $_POST['email'] ?? null,
            "password" => $_POST['password'] ?? null,
            "type" => $_POST['type'] ?? null,
        ];
        $errors = validateCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            header('Location: ' . BASE_URL_ADMIN . '?act=users-create');
            exit();
        }
        insert('users', $data);
        $_SESSION['success'] = 'Thêm mới thành công';
        header('Location: ' . BASE_URL_ADMIN . '?act=users');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function validateCreate($data){
    $errors = [];
    if(empty($data['name'])){
        $errors[] = 'trường name là bắt buộc';
    }else if(strlen($data['name']) > 50){
        $errors[] = 'trường name tối đa 50 ký tự';
    }

    if(empty($data['email'])){
        $errors[] = 'trường email là bắt buộc';
    }else if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
        $errors[] = 'trường email không đúng định dạng';
    }else if(!checkUniqueEmail('users', $data['email'])){
        $errors[] = 'email đã tồn tại';
    }

    if(empty($data['password'])){
        $errors[] = 'trường password là bắt buộc';
    }else if(strlen($data['password'])  < 8 || strlen($data['password'])  > 20 ){
        $errors[] = 'trường password tối thiểu 8 ký tự và tối đa 20 ký tự';
    }

    if($data['type']===null){
        $errors[] = 'trường type là bắt buộc';
    }else if(! in_array($data['type'], [0,1])){
        $errors[] = 'trường type phải là 0 hoặc 1';
    }
    return $errors;
}
function tb_binhluanDelete($id)
{
    delete('tb_binhluan', $id);
    $_SESSION['success'] = 'Xóa thành công';
    header('Location: ' . BASE_URL_ADMIN . '?act=tb_binhluan');
    exit();
}

