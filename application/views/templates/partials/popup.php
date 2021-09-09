<?php if (isset($_SESSION['delete_success'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil - </strong> <?php echo $_SESSION['delete_success']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>

<?php if (isset($_SESSION['delete_failed'])) { ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Gagal - </strong> <?php echo $_SESSION['delete_failed']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>

<?php if (isset($_SESSION['update_success'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil - </strong> <?php echo $_SESSION['update_success']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>

<?php if (isset($_SESSION['update_failed'])) { ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Gagal - </strong> <?php echo $_SESSION['update_failed']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>

<?php if (isset($_SESSION['insert_success'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil - </strong> <?php echo $_SESSION['insert_success']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>

<?php if (isset($_SESSION['insert_failed'])) { ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Gagal - </strong> <?php echo $_SESSION['insert_failed']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>

<?php if (isset($_SESSION['register_success'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil - </strong> <?php echo $_SESSION['register_success']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>

<?php if (isset($_SESSION['register_failed'])) { ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Gagal - </strong> <?php echo $_SESSION['register_failed']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>