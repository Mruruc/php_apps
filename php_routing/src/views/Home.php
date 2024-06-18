<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title><?=$pageTitle?></title>
</head>
<body>
    <h2><?php echo $message?></h2>
    <h1>This page is a Home Page.</h1>
    <p>Its a complete HTML page.</p>

    <button id="register-btn">Register</button>

    <?php include __DIR__ .'/component/Footer.php'; ?>


    <script src="./js/main.js"></script>
</body>
</html>