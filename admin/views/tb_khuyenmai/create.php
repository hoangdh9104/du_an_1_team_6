<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Create
            </h6>
        </div>
        <div class="card-body">

            <?php
            // Thông báo thêm thành công
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
            // Thông báo lỗi
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
                            <input type="text" class="form-control" id="ten_khuyenmai" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['ten_khuyenmai'] : null; ?>" placeholder="Enter name" name="ten_khuyenmai">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Mã khuyến mại:</label>
                            <input type="text" class="form-control" id="ma_khuyenmai" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['ma_khuyenmai'] : null; ?>" placeholder="Enter code" name="ma_khuyenmai">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="bd" class="form-label">Thời gian bắt đầu:</label>
                            <input type="date" class="form-control" id="thoigian_bd" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['thoigian_bd'] : null; ?>" placeholder="Enter pass" name="thoigian_bd">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="kt" class="form-label">Thời gian kết thúc:</label>
                            <input type="date" class="form-control" id="thoigian_kt" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['thoigian_kt'] : null; ?>" placeholder="Enter pass" name="thoigian_kt">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="gia_tri" class="form-label">Số tiền giảm:</label>
                            <input type="number" class="form-control" id="gia_tri" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['gia_tri'] : null; ?>" placeholder="Enter coupon" name="gia_tri">
                        </div>
                        
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tạo mới</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=tb_khuyenmai" class="btn btn-danger">Quay lại</a>
            </form>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
}
null; ?>