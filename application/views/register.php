<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Index</title>
</head>
<body style="background-color: salmon;">
    <div class="container mt-5">
      <div class="d-flex justify-content-around h-100">
          <div class="card col-sm-4">
            <div class="card-header">
              <h5 class="card-title text-center">Registrasi Akun</h5>
              <?php $this->load->view('templates/partials/popup'); ?>
            </div>
            <div class="card-body">
              <form action="<?php echo site_url('register/store'); ?>" method="POST">
              <div class="form-group">
                  <label for="input-email">Email address</label>
                  <input type="email" class="form-control" id="input-email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                  
              </div>
              <div class="form-group">
                  <label for="input-password">Password</label>
                  <input type="password" class="form-control" name="password" id="input-password" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-primary">Register</button>
              </form>
            </div>
          </div>

          <div class="card col-sm-4">
            <div class="card-header">
              <h5 class="card-title text-center">Login</h5>
              <?php if (isset($_SESSION['auth_failed'])) { ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Gagal - </strong> <?php echo $_SESSION['auth_failed']; ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php } ?>
            </div>
            <div class="card-body">
              <form action="<?php echo site_url('login/auth'); ?>" method="POST">
              <div class="form-group">
                  <label for="input-email">Email address</label>
                  <input type="email" class="form-control" id="input-email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                  <label for="input-password">Password</label>
                  <input type="password" class="form-control" name="password" id="input-password" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
              </form>
            </div>
          </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>