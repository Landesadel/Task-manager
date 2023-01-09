<head>
    <meta charset="UTF-8">
    <title>General</title>
</head>

<body>
    <h1><?= $pageHeader ?></h1>

    <?php if (is_null($username)): ?>
        <a href="/?controller=security">Join</a>
        <a href="?controller=registration">Registration</a>
    <?php else: ?>
       <h3>Wellcome <?=$username?> : </h3> <br>
        <a href="/?controller=tasks">Tasks</a> <br>
        <a href="/?controller=security&action=logout">Logout</a>
    <?php endif; ?>
</body>
