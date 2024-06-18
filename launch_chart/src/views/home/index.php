<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Home</title>
</head>

<body>
    <header>
        <nav class="alert alert-primary ">
            <ul class="d-flex justify-content-around list-unstyled">
                <a class="navbar-brand fs-1 " href="./">
                    LaunchChart
                </a>
                <li class="nav-item">
                    <a class="nav-link active mt-3 fs-4" aria-current="page" href="./">Home</a>
                </li>
                <li class="nav-item mt-3 ">
                    <a href="./login" id="loginBtn" class="btn btn-success rounded-btn">
                        Login
                    </a>
                </li>
                <li class="nav-item  mt-3">
                    <a href="./register" class="btn btn-primary rounded-lg">
                        Register
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="container mt-4">
        <div class="row">
            <div class="col">
                <h1>What is LaunchChart ?</h1>
                <p>LaunchChart is a platform that provides information about cryptocurrencies. </p>
                <ul>
                    <li>We provide information about the latest prices, market cap, volume, and other information about cryptocurrencies. </li>
                    <li>We also provide a platform for users to create an account and track their favorite cryptocurrencies.</li>
                    <li>Users can also create a watchlist of cryptocurrencies they are interested in.</li>
                    <li>We provide a platform for users to create an account and track their favorite cryptocurrencies.</li>
                    <li>Users can also create a watchlist of cryptocurrencies they are interested in.</li>
                </ul>
            </div>

            <div class="col">
                <h1>What is the Bitcoin All About ??</h1>

                <h2 style="display: inline-block; margin-right: 10px;"><?php echo $symbol; ?></h2>
                <img src="<?php echo $logo; ?>" alt="bitcoin logo" style="display: inline-block; vertical-align: middle;">

                <p>
                    <?php echo $description ?>
                </p>
            </div>
        </div>
    </main>

    <?php include __DIR__ . "/../components/Footer.php" ?>
</body>

</html>