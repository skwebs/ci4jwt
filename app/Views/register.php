<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page!</title>
  <link rel="stylesheet" href="<?= base_url("node_modules/bootstrap/dist/css/bootstrap.min.css") ?>">
</head>

<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6 mx-auto">
        <form action="<?= base_url("api/v1/auth/register") ?>" method="post">
          <h1 class="text-center py-4">Register Form</h1>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nameField" placeholder="name">
            <label for="nameField">Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="emailField" placeholder="email">
            <label for="emailField">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="passwordField" placeholder="Password">
            <label for="passwordField">Password</label>
          </div>
          <button class="btn btn-primary " id="registerBtn">Register</button>
          <a href="<?= site_url("/login") ?>" class="link ms-5 d-inline-block">Login</a>
        </form>
      </div>
    </div>
  </div>
  <script src="<?= base_url("node_modules/bootstrap/dist/js/bootstrap.bundle.min.js") ?>"></script>
  <script>
    const BASE_URL = '<?= base_url() ?>';
  </script>
  <script src="<?= base_url("js/register.js") ?>"></script>
</body>

</html>