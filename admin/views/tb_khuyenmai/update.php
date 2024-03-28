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
                            <label for="name" class="form-label">Tên khuyến mại:</label>
                            <input type="text" class="form-control" id="ten_khuyenmai" value="<?= $coupon['ten_khuyenmai'] ?>" placeholder="Enter name" name="ten_khuyenmai">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="coupon" class="form-label">Mã khuyến mại:</label>
                            <input type="coupon" class="form-control" id="ma_khuyenmai" value="<?= $coupon['ma_khuyenmai'] ?>" placeholder="Enter code" name="ma_khuyenmai">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="pass" class="form-label">Thời gian bắt đầu:</label>
                            <input type="date" class="form-control" id="thoigian_bd" value="<?= $coupon['thoigian_bd'] ?>" placeholder="Enter time" name="thoigian_bd">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="pass" class="form-label">Thời gian kết thúc:</label>
                            <input type="date" class="form-control" id="thoigian_kt" value="<?= $coupon['thoigian_kt'] ?>" placeholder="Enter time" name="thoigian_kt">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="pass" class="form-label">Giá giảm:</label>
                            <input type="number" class="form-control" id="gia_tri" value="<?= $coupon['gia_tri'] ?>" placeholder="Enter time" name="gia_tri">
                        </div>

                        <!-- XEM XÉT BẬT KHUYẾN MẠI THỦ CÔNG
                            <div class="mb-3 mt-3">
                            <label for="type" class="form-label">Type:</label>
                            <select name="chuc_vu" id="chuc_vu" class="form-control">
                                <option <//?= // $coupon['chuc_vu'] == 1 ? 'selected' : null; ?//> value="1">Admin</option>
                                <option <//?= // $coupon['chuc_vu'] == 0 ? 'selected' : null; ?//> value="0">User</option>
                            </select>
                        </div>
                         -->
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=tb_khuyenmai" class="btn btn-danger">Quay lại</a>
            </form>
        </div>
    </div>
</div>