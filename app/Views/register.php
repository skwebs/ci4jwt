<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page!</title>
  <link rel="stylesheet" href="<?= base_url("node_modules/bootstrap/dist/css/bootstrap.min.css") ?>">
</head>

<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6 mx-auto">
        <h1 class="text-center py-4">Login Form</h1>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <button class="btn btn-primary " id="login">Login</button>
      </div>
    </div>
  </div>
  <script src="<?= base_url("node_modules/bootstrap/dist/js/bootstrap.bundle.min.js") ?>"></script>
  <script src="<?= base_url("js/index.js") ?>"></script>
</body>

</html>