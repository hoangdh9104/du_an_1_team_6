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
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" value="<?= $product['name'] ?>" placeholder="Enter name" name="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Danh mục sản phẩm:</label>
                            <select class="form-control" name="id_danhmuc" id="">
                                <option value="0" selected hidden>Chọn tên danh mục</option>
                                <?php foreach ($dmsp as $key) : ?>
                                    <?php

                                    if ($key['id'] == $product['id_danhmuc']) {
                                        $s = "selected";
                                    } else {
                                        $s = "";
                                    }
                                    ?>
                                    <option value="<?= $key['id'] ?>" <?= $s ?>><?= $key['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="gia_ban" class="form-label">Giá Bán:</label>
                            <input type="text" class="form-control" id="gia_ban" value="<?= $product['gia_ban']; ?>" placeholder="Enter gia" name="gia_ban">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="gia_khuyenmai" class="form-label">Giá khuyến mãi:</label>
                            <input type="text" class="form-control" id="gia_khuyenmai" value="<?= $product['gia_khuyenmai']; ?>" placeholder="Enter gia" name="gia_khuyenmai">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="so_luong" class="form-label">Số lượng</label>
                            <input type="number" class="form-control" id="" value="<?= $product['so_luong']; ?>" placeholder="Nhập số lượng sản phẩm" name="so_luong">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="gia_khuyenmai" class="form-label">Mô tả:</label>
                            <input type="text" class="form-control" name="mo_ta" id="" value="<?= $product['mo_ta']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="pass" class="form-label">Ngày tạo:</label>
                            <input type="datetime" class="form-control" value="<?= $product['ngay_tao']; ?>" id="ngay_tao" value="" placeholder="Enter time" name="ngay_tao">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="img_thumbnail" class="form-label">Img:</label>
                            <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="<?= BASE_URL_ADMIN ?>?act=tb_sanpham" class="btn btn-danger">Back to list</a>
                    </div>
            </form>
        </div>
    </div>
</div>