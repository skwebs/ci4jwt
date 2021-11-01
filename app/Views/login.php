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
        <form action="<?= site_url('api/v1/auth/login') ?>" method="post">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="emailField" placeholder="Email" required>
            <label for="email">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="passwordField" placeholder="Password" required>
            <label for="password">Password</label>
          </div>
          <button class="btn btn-primary " id="loginBtn">Login</button>
          <a href="<?= site_url("/register") ?>" class="link d-inline-block ms-5">Register</a>
        </form>
      </div>
    </div>
  </div>
  <script src="<?= base_url("node_modules/bootstrap/dist/js/bootstrap.bundle.min.js") ?>"></script>
  <script>
    const BASE_URL = '<?= base_url() ?>';
  </script>
  <script src="<?= base_url("js/login.js") ?>"></script>
</body>

</html>