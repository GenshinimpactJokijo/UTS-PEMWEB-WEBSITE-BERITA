
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "assets/bootstrapjs.php" ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    
     <?php include "assets/bootstrapjs.php"; ?>

    <link rel="stylesheet" href="assets/Login.css">
    <title>Login to UMNews</title>
</head>
<body>

 
<div class="container d-flex justify-content-sm-center position-absolute top-50 start-50 translate-middle">
  <div class="card">
    <div class="card-body">
      <form class="myForm" method="post">
        <h4><b>Welcome back!</b></h4>
        <div class="mb-3">
          <label for="Username" class="form-label">Username</label>
          <input type="Username" class="form-control" id="Username" name="Username" placeholder="Enter your username">
        </div>
    <div class="mb-3">
          <label for="Password" class="form-label">Password</label>
          <input type="Password" name="Password" class="form-control" id="Password" placeholder="Enter your password">
      
        </div>
        <div class="g-recaptcha" data-sitekey="6Lcy37EcAAAAADVIXmg52jbLCPt9A-UKaKb-EDRY" style="margin-bottom:10px;"></div>
        <div class="d-grid gap-2">
                <button type="submit" name="submit" class="btn btn-dark">Login</button>
              </div>
  
     <div class="form-text">
          Need an account? <a style="color:white;" href="?view=register">Register Here!</a>
        </div>

  </form>
</div>
</div>
</div>
    
</body>
</html>