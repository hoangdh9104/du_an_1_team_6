<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Nội dung website
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= BASE_URL_ADMIN . '?act=tb_noidung-save'; ?>" method="post">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Trường dữ liệu</th>
                            <th>Dữ liệu</th>
                        </tr>
                        <tr>
                            <td>Logo</td>
                            <td>
                                <input type="text" class="form-control" name="logo" id="logo" value="<?= $settings['logo'] ?? null ?>">
                            </td>

                        </tr>
                        
                        
                    </table>
                    <button type="submit" class="btn btn-success">Save</button>
                    <!-- LƯU Ý ĐỔI ĐƯỜNG DẪN, ĐANG ĐỂ TẠM THỜI (act=posts) -->
                    <a href="<?= BASE_URL_ADMIN ?>?act=tb_noidung" class="btn btn-danger">Back to list</a>
                </div>

            </form>

        </div>
    </div>
</div>