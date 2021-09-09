<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css'); ?>">
    <title>Dashboard</title>
</head>
<body>
<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('user/logout'); ?>">
                <span></span>
                Logout
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h2 style="padding-bottom: 12px;">Data API</h2>
        <div class="table-responsive">
          <?php $this->load->view('templates/partials/popup'); ?>
          <a href="javascript:;" class="btn btn-sm btn-success" data-toggle="modal" data-target="#CreateModal">Tambah</a>
          <table class="table table-striped table-sm" style="margin-top: 12px;">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Avatar</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 0; ?>
              <?php foreach ($user_list['data'] as $user) { ?>
              <tr>
                <th scope="row"><?php ++$i; ?></th>
                <td><img src="<?php echo $user['avatar']; ?>" alt="user-avatar" srcset="<?php echo $user['avatar']; ?>" class="user-circle"></td>
                <td><?php echo $user['first_name']; ?></td>
                <td><?php echo $user['last_name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td style="max-width: 100px;">
                  <a href="javascript:;" class="btn btn-sm btn-primary mr-2"
                  data-uid="<?php echo $user['id']; ?>" data-email="<?php echo $user['email']; ?>"
                  data-firstname="<?php echo $user['first_name']; ?>" data-lastname="<?php echo $user['last_name']; ?>"
                  data-toggle="modal" data-target="#EditModal">Ubah</a>
                  <a href="javascript:;" class="btn btn-sm btn-danger ml-2" data-uid="<?php echo $user['id']; ?>"
                  data-toggle="modal" data-target="#DeleteModal">Hapus</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
            <?php echo $this->pagination->create_links(); ?>
        </div>
      </main>
    </div>
  </div>

    <!-- Modal Create -->
    <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="CreateModalLabel">Tambah</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form style="font-size: 14px;" action="<?php echo site_url('user/store'); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="cr-firstname">Firstname</label>
              <input type="text" class="form-control" name="firstname" id="cr-firstname" placeholder="Enter firstname">
            </div>
            <div class="form-group">
              <label for="cr-lastname">Lastname</label>
              <input type="text" class="form-control" name="lastname" id="cr-lastname" placeholder="Enter lastname">
            </div>
            <div class="form-group">
              <label for="cr-email">Email</label>
              <input type="text" class="form-control" name="email" id="cr-email" placeholder="Enter email">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Tutup Modal Create -->


    <!-- Modal Edit -->
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="EditModalLabel">Ubah</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form style="font-size: 14px;" action="<?php echo site_url('user/update'); ?>" method="POST">
          <input type="hidden" id="ed-user" name="user_id">
          <div class="modal-body">
            <div class="form-group">
              <label for="ed-firstname">Firstname</label>
              <input type="text" class="form-control" name="firstname" id="ed-firstname" placeholder="Enter firstname">
            </div>
            <div class="form-group">
              <label for="ed-lastname">Lastname</label>
              <input type="text" class="form-control" name="lastname" id="ed-lastname" placeholder="Enter lastname">
            </div>
            <div class="form-group">
              <label for="ed-email">Email</label>
              <input type="text" class="form-control" name="email" id="ed-email" placeholder="Enter email">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Tutup Modal Edit -->

    <!-- Modal Delete -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
          <form style="font-size: 14px;" action="<?php echo site_url('user/delete'); ?>" method="POST">
          <input type="hidden" id="del-user" name="user_id">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fas fa-exclamation-triangle" style="margin-right: 10px;"></i>Konfirmasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center" style="margin-bottom: -15px;">
            <p style="font-size: 14px; font-weight: 600;">Hapus User ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Batal</button>
            <button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Tutup Modal Delete -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    let $ = jQuery.noConflict();
    $(document).ready(function() {
        $("#DeleteModal").on("shown.bs.modal", function(event) {
            $("#del-user").attr("value", $(event.relatedTarget).data("uid"));
        });
        $("#EditModal").on("shown.bs.modal", function(event) {
            $("#ed-user").attr("value", $(event.relatedTarget).data("uid"));
            $("#ed-firstname").attr("value", $(event.relatedTarget).data("firstname"));
            $("#ed-lastname").attr("value", $(event.relatedTarget).data("lastname"));
            $("#ed-email").attr("value", $(event.relatedTarget).data("email"));
        });
    });
    </script>
  </body>
</html>