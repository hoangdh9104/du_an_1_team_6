<?php
function tb_binhluanListAll()
{
    $title = 'Danh sách bình luận';
    $views = 'tb_binhluan/index';
    $script = 'datatable';
    $script2 = 'tb_binhluan/script';
    $style = 'datatable';

    $comments = listAll('tb_binhluan');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function tb_binhluanShowOne($id)
{
    $comment = showOne('tb_binhluan', $id);
    if (empty($comment)) {
        e404();
    }
    $titel = 'Chi tiết bình luận của khách hàng: ' . $comment['ten_khachhang'];
    $views = 'tb_binhluan/show';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function userDelete($id)
{
    delete('users', $id);
    $_SESSION['success'] = 'Xóa thành công';
    header('Location: ' . BASE_URL_ADMIN . '?act=users');
    exit();
}
function tb_binhluanStatus($id)
{
    $comment = showOne('tb_binhluan', $id);
    if (empty($comment)) {
        e404();
    }
    if($comment['trang_thai'] === 0){
        $data = [
            "trang_thai" => '1' ?? null,
        ];
    }else{
        $data = [
            "trang_thai" => '0' ?? null,
        ];
    }
    update('tb_binhluan', $id, $data);
    $_SESSION['success'] = 'Thao tác thành công';
    header('Location: ' . BASE_URL_ADMIN . '?act=tb_binhluan');
    exit();
}