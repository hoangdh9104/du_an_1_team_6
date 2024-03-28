<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $titel ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Update
            </h6>
        </div>
        <div class="card-body">
            <?php if(isset($_SESSION['errors'])) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($_SESSION['errors'] as $error) : ?>
                        <li><?=$error?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php unset($_SESSION['errors']); ?>
            <?php endif; ?>
            <?php if(isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']);?>
            <?php endif; ?>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">name:</label>
                            <input type="text" class="form-control" value="<?= $user['name'] ?>" id="name" placeholder="Enter name" name="name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" value="<?= $user['email'] ?>" id="email" placeholder="Enter email" name="email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">password:</label>
                            <input type="text" class="form-control" value="<?= $user['password'] ?>" id="password" placeholder="Enter password" name="password">
                        </div>
                        
                        <?php
                          
                          if ($user['type'] == 1) {
                            echo '<div class="mb-3 mt-3">
                                <label for="type" class="form-label">Type:</label>
                                <select name="type" id="type" class="form-control">
                                    <option ' . ($user['type'] == 1 ? 'selected' : null) . ' value="1">Admin</option>
                                </select>
                            </div>';
                        } else {
                            echo '<div class="mb-3 mt-3">
                                <label for="type" class="form-label">Type:</label>
                                <select name="type" id="type" class="form-control">
                                    <option ' . ($user['type'] == 0 ? 'selected' : null) . ' value="0">User</option>
                                </select>
                            </div>';
                        }
                          ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=users" class="btn - btn-danger">Quay lại</a>
            </form>
        </div>
    </div>
</div>