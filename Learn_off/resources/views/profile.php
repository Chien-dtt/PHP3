<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1 align="center">Thông tin sinh viên</h1>
    <table border="1" align="center" class="table-info">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Tên</th>
                <th>Tuổi</th>
                <th>Quê quán</th>
                <th>Số điện thoại</th>
                <th>Chuyên Ngành</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($chiens as $value) : ?>
                <tr align="center">
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['name'] ?></td>
                    <td><?= $value['age'] ?></td>
                    <td><?= $value['address'] ?></td>
                    <td><?= $value['phone'] ?></td>
                    <td><?= $value['major'] ?></td>
                    <td>
                        <a class="btn btn-secondary" href="#">Xem</a>
                        <a class="btn btn-warning" href="#">Sửa</a>
                        <a class="btn btn-danger" href="#">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>