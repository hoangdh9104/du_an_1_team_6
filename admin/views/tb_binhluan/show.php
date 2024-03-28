<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $titel?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detail
            </h6>
        </div>
        <?php
            $data = getData_tb_sanpham($comment['id']);
        ?>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Dữ liệu</th>
                </tr>
                <?php foreach ($comment as $fieldName => $value) : ?>
                <?php
                if(($fieldName == 'trang_thai')  ) {
                    $fieldName = null;
                    $value = null;
                    // $x = false;
                    // $none = "display: none;";
                }
                ?>
                <tr style="<?= ($x==false) ? $none: '' ?>">
                    <td>   
                         <?= ucfirst($fieldName);?>
                    </td>
                    <td>
                        <?php 
                        switch ($fieldName) {
                            case 'ten_sanpham':
                                echo $data[0]['name'];
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
            <a href="<?= BASE_URL_ADMIN ?>?act=tb_binhluan" class="btn - btn-danger">Back-to-list</a>       
        </div>
    </div>
</div>