<?php
  use MvcProject\Mruruc\auth\UserAuth;
  UserAuth::startSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>App</title>
</head>
<body>
<header class="alert alert-primary d-flex justify-content-between align-items-center p-3">
    <h1 class="m-0">
        <a href="./" class="text-dark text-decoration-none">LaunchChart</a>
    </h1>

    <div class="search-form-container">
        <form method="post" class="d-flex">
            <input type="search" name="id" placeholder="Search" class="form-control me-2">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
        </form>
    </div>

    <div class="d-flex align-items-center">
        <button onclick="logout()" class="btn btn-danger me-3">Log out</button>
        <a href="./profile" class="text-dark text-decoration-none fs-4">&#9776;</a>
    </div>
</header>

<main class="container mt-5">
    <h1>Welcome <?php echo htmlspecialchars($_SESSION['userName']) ?>!</h1>
    <div class="mt-2">
        <h4>Name: <?php echo $name ;?></h4>
        <p>Symbol: <?php echo $symbol ;?></p>
        <p>Description:<?php echo $description ;?></p>
    

    </div>
</main>

<?php include __DIR__ . "/../components/Footer.php" ?>

<script src="./js/main.js"></script>
</body>
</html>