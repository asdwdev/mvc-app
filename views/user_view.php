<!-- views/user_view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>daftar user</title>
</head>

<body>

    <h1>daftar user</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= $user['id']; ?> - <?= $user['name']; ?></li>
        <?php endforeach; ?>
    </ul>

</body>

</html>