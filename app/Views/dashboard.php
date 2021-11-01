<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Page!</title>
  <link rel="stylesheet" href="<?= base_url("node_modules/bootstrap/dist/css/bootstrap.min.css") ?>">
</head>

<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6 mx-auto">
        <div class="display-4 fw-bold" id="welcome">Welcome to the dashboard!</div>
      </div>
    </div>
  </div>
  <script src="<?= base_url("node_modules/bootstrap/dist/js/bootstrap.bundle.min.js") ?>"></script>
  <script>
    const BASE_URL = '<?= base_url() ?>';
  </script>
  <script src="<?= base_url("js/dashboard.js") ?>"></script>
</body>

</html>