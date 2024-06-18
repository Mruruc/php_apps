<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Profile</title>
</head>
<body>
<header class="alert alert-primary d-flex justify-content-between align-items-center p-3">
    <h1 class="m-0">
        <a href="./account" class="text-dark text-decoration-none">Dashboard</a>
    </h1>
    <button onclick="logout()" class="btn btn-danger">Log out</button>
</header>

<main class="container mt-5">
    <h1>Welcome to your profile, <?php echo htmlspecialchars($_SESSION['userName']) ?>!</h1>

    <h3>Update Your Account:</h3>
    <form action="./profile" method="post" autocomplete="on" class="mb-3">
        <div class="mb-3">
            <label for="userName" class="form-label">Update Email Address</label>
            <input type="text" id="userName" name="userName" value="<?php echo htmlspecialchars($_SESSION['userEmail']) ?>" class="form-control" disabled>
            <input type="text" name="userId" value="<?php echo htmlspecialchars($_SESSION['userId']) ?>" hidden>
            <input type="text" name="newUserName" placeholder="New Email Address" class="form-control mt-2">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Update your password</label>
            <input type="password" id="password" name="password" placeholder="Current Password" class="form-control">
            <input type="password" name="newPassword" placeholder="New Password" class="form-control mt-2">
            <input type="password" name="confirmPassword" placeholder="Confirm New Password" class="form-control mt-2">
        </div>
        <button type="submit" class="btn btn-primary w-100">Update</button>
    </form>

    <?php if(isset($errorMessage)): ?>
        <p class='text-danger'><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <h3>Delete Your Account:</h3>
    <form onsubmit="handleDelete(event)" class="mt-2">
        <input type="text" name="userId" value="<?php echo htmlspecialchars($_SESSION['userId']) ?>" hidden>
        <button type="submit" class="btn btn-danger w-100">Delete</button>
    </form>
</main>

<?php include __DIR__ . "/../components/Footer.php" ?>
<script src="./js/main.js"></script>
</body>
</html>