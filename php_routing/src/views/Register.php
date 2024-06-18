<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Register</title>
</head>
<body>
    <h1>Welcome ....</h1>
    <form action="" method="post" autocomplete="on">
        <label for="email"> Email </label> <br>
        <input type="email" id="email" name="email" require> <br>

        <label for="password"> Password </label> <br>
        <input type="password" id="password" name="password" require> <br>

        <input type="submit" value="submit">
    </form>

    <?php include __DIR__.'/component/Footer.php'?>

</body>
</html>