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

                <?php foreach ($category as $fieldName => $value) : ?>
                    <tr>
                        <th><?php
                         ucfirst($fieldName);
                         switch ($fieldName) {
                            case 'id_danhmuc':
                                echo 'Id danh mục';
                                break;
                            case 'name':
                                echo 'Tên danh mục';
                                break;
                            
                            default:
                                echo $value;
                                break;
                        }
                         ?></th>
                        <td><?= $value ?></td>   
                    </tr>
                <?php endforeach; ?>

            </table>
            <a href="<?= BASE_URL_ADMIN ?>?act=tb_danhmuc" class="btn btn-danger">Quay lại</a>

        </div>
    </div>
</div>