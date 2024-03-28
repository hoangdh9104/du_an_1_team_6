<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detail
            </h6>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Dữ liệu</th>
                </tr>

                <?php foreach ($contact as $fieldName => $value) : ?>
                    <tr>
                        <td><?= ucfirst($fieldName) ?></td>
                        <td>
                            <?php
                            switch ($fieldName) {
                                case 'trang_thai_lien_he':
                                    echo $value ? '<span class="badge badge-success">Đã xử lí</span>' : '<span class="badge badge-warning">Chưa xử lí</span>';
                                    break;
                                default:
                                    echo $value;
                                    break;
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
            <a href="<?= BASE_URL_ADMIN ?>?act=tb_lienhe" class="btn btn-danger">Quay lại</a>

        </div>
    </div>
</div>