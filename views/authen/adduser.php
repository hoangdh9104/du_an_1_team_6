<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= BASE_URL . '?act=createUser' ?>" method="post">
        Tên:
        <input type="text" name="name">
        Email:
        <input type="text" name="email">
        Pass:
        <input type="text" name="pass">
        <button type="submit" name="addUser">Submit</button>
    </form>
</body>
</html>