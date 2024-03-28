<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Update
            </h6>
        </div>
        <div class="card-body">
            <?php
            // Thông báo cập nhật thành công
            if (isset($_SESSION['success'])) :
            ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php
            endif;
            ?>
            <?php
            if (isset($_SESSION['errors'])) :
            ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php
                        foreach ($_SESSION['errors'] as $error) :
                        ?>
                            <li><?= $error ?></li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
                <?php unset($_SESSION['errors']); ?>
            <?php
            endif;
            ?>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="ten_khachhang" value="<?= $contact['ten_khachhang'] ?>" placeholder="Enter name" name="ten_khachhang">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" value="<?= $contact['email'] ?>" placeholder="Enter email" name="email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="SĐT" class="form-label">SĐT:</label>
                            <input type="text" class="form-control" id="sdt" value="<?= $contact['sdt'] ?>" placeholder="Enter pass" name="sdt">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="noi_dung" class="form-label">Nội dung:</label>
                            <input type="text" class="form-control" id="noi_dung" value="<?= $contact['noi_dung'] ?>" placeholder="Enter pass" name="noi_dung">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="created_at" class="form-label">Ngày tạo:</label>
                            <input type="date" class="form-control" id="created_at" value="<?= $contact['created_at'] ?>" placeholder="Enter pass" name="created_at">
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="type" class="form-label">Trạng thái:</label>
                            <select name="trang_thai_lien_he" id="trang_thai_lien_he" class="form-control">
                                <option <?= $contact['trang_thai_lien_he'] == 1 ? 'selected' : null; ?> value="1">Đã xử lí</option>
                                <option <?= $contact['trang_thai_lien_he'] == 0 ? 'selected' : null; ?> value="0">Chưa xử lí</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=tb_lienhe" class="btn btn-danger">Quay lại</a>
            </form>
        </div>
    </div>
</div>