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
                            <th>Tên</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên</th>
                            <th>Trạng thái</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        foreach ($categories as $category) :
                        ?>
                            <tr>
                                <td><?= $category['name']; ?></td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=tb_danhmuc-detail&id_danhmuc=<?= $category['id']; ?>" class="btn btn-info">Chi tiết</a>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=tb_danhmuc-update&id_danhmuc=<?= $category['id']; ?>" class="btn btn-warning">Sửa</a>
                                    <a href="<?= BASE_URL_ADMIN ?>?act=tb_danhmuc-delete&id_danhmuc=<?= $category['id']; ?>" class="btn btn-danger" onclick="return confirm('Bạn muốn xóa không ?')">Xóa</a>
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