<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
    </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                DataTables
            </h6>
        </div>
        <div class="card-body">
            <?php
            // Thông báo Xóa thành công
            if (isset($_SESSION['success'])) :
            ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php
            endif;
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Nội dung</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Yêu cầu</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Nội dung</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Yêu cầu</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        foreach ($contacts as $contact) :
                        ?>
                            <tr>
                                <td><?= $contact['id']; ?></td>
                                <td><?= $contact['ten_khachhang']; ?></td>
                                <td><?= $contact['email']; ?></td>
                                <td><?= $contact['sdt']; ?></td>
                                <td><?= $contact['noi_dung']; ?></td>
                                <td><?= $contact['created_at']; ?></td>
                                <td><?= $contact['trang_thai_lien_he'] ? '<span class="badge badge-success">Đã xử lí</span>' : '<span class="badge badge-warning">Chưa xử lí</span>'; ?></td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=tb_lienhe-update&id=<?= $contact['id']; ?>" class="btn btn-warning">Sửa trạng thái</a>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=tb_lienhe-delete&id=<?= $contact['id']; ?>" class="btn btn-danger" onclick="return confirm('Bạn muốn xóa không ?')">Xóa liên hệ</a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>