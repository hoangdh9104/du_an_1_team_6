<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://caodang.fpt.edu.vn/wp-content/uploads/logo-3.png" width="100px" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sản phẩm</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Xin chào: anhnd120</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Tìm</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <h3 class="text-center">Bộ lọc</h3>
                <form action="" method="GET">
                    <div class="form-group">
                        <label for="category">Danh mục:</label>
                        <select class="form-control" name="catalogue_id">
                            <option value="">Tất cả</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tên sản phẩm:</label>
                        <input type="text" class="form-control" name="">
                    </div>
                    <div class="form-group">
                        <label for="">Giá thấp nhất:</label>
                        <input type="number" class="form-control" name="">
                    </div>
                    <div class="form-group">
                        <label for="">Giá cao nhất:</label>
                        <input type="number" class="form-control" name="">
                    </div>
                    <button type="submit" name="search" class="btn btn-primary mt-3">Áp dụng</button>
                </form>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <?php foreach ($products as $product) : ?>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img class="card-img-top img-responsive" height="300px" src="<?= BASE_URL . $product['img_thumbnail'] ?>">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $product['name'] ?></h4>
                                    <p class="card-text"><?= $product['overview'] ?></p>
                                    <p class="card-text"><strong>Giá:</strong> <?= $product['price_regular'] ?></p>
                                    <p class="card-text"><strong>Giảm giá:</strong> <?= $product['price_sale'] ?></p>
                                    <a href="<?= BASE_URL . '?act=addToCart&&id_product=' . $product['id'] ?>" class="btn btn-primary" onclick="return confirm('bạn có muốn thêm sản phẩm vào giỏ hàng không?')">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


            </div>
        </div>
</body>

</html>