<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Register</title>
</head>
<body>
    
   <?php include __DIR__ . "/../components/Login_register_header.php"?>

   <main class="container mt-5">
       <div class="row justify-content-center">
           <div class="col-md-6 mt-5 m-4">

               <div class="text-center mb-4">
                   <a href="./login" class="btn btn-outline-secondary">Already have an Account?</a>
               </div>
              
               <div class="card shadow-lg">
                   <div class="card-body">
                       <form action="./register" method="POST">
                           
                           <div class="mb-3">
                               <label for="userName" class="form-label">Email</label>
                               <input type="email" id="userName" name="userName" class="form-control" required>
                           </div>
                           <div class="mb-3">
                               <label for="password" class="form-label">Password</label>
                               <input type="password" id="password" name="password" class="form-control" required>
                           </div>
                          
                           <button type="submit" class="btn btn-primary w-100">Register</button>
                       </form>
                       
                       <?php if (!empty($errorMessage)) echo "<p class='text-danger mt-3'>" . htmlspecialchars($errorMessage) . "</p>"; ?>
                   </div>
               </div>
           </div>
       </div>
   </main>

    <?php include __DIR__ . "/../components/Footer.php" ?>
</body>
</html>