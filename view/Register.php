<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
     <?php include "assets/bootstrapjs.php"; ?>
    <link rel="stylesheet" href="assets/register.css">
    <title>Register - UMNews</title>
</head>
<body>
<div class="container d-flex justify-content-sm-center position-absolute top-50 start-50 translate-middle">
    <div class="card">
        <div class="card-body">
            <h4><b>Create an account</b></h4>
            <form action="" method="POST" enctype="multipart/form-data" class="row g-3">
               <!-- First Name & Last Name -->
                <div class="col-md-6">
                    <label for="FirstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="First Name"/>
                </div>
                <div class="col-md-6">
                    <label for="LastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Last Name"/>
                </div>
                <!-- Username & Password -->
                <div class="col-12">
                    <label for="Username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="Username" name="Username" placeholder="Username"/>
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" onkeyup='check();'/>
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" onkeyup='check();'/>
                     <span id='message'></span>
                </div>
                  <script>
                    var check = function() {
                    if (document.getElementById('password').value ==
                        document.getElementById('confirm_password').value) {
                        document.getElementById('message').style.color = 'white';
                        document.getElementById('message').innerHTML = 'matching';
                    } else {
                        document.getElementById('message').style.color = 'red';
                        document.getElementById('message').innerHTML = 'not matching';
                    }
                    }
                    </script>
                 <!-- Gender -->
                <div class="col-md-6">
                    <label for="Gender" class="form-label">Gender</label>
                    <select id="Gender" class="form-select" name="Gender">
                        <option value="" hidden selected></option>
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                    </select>
                </div>
                <!-- Tanggal Lahir -->
                <div class="col-md-6">
                    <label for="TanggalLahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="TanggalLahir" id="TanggalLahir">
                </div>
                <!-- Upload Profile Picture -->
                <div class="col-12">
                    <label class="form-label" for="Picture">Profile Picture</label>
                    <input class="form-control form-control-file" type="file" name="Picture" id="Picture">
                    
                </div>
                  <div class="d-grid gap-2">
                  <button name="submit" type="submit" name="Register" class="btn btn-dark float-right">REGISTER NOW</button>
                  </div>
                  <div style="color:white;"class="form-text">
                    Already had an account? <a style="color:white;" href="?view=login">Login Here!</a>
                </div>
                </form>
</div>
</div>
</div>
</body>
</html>