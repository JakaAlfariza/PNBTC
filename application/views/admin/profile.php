<!-- profile_view.php (View) -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        .form-group {
            margin-bottom: 20px;
        }

        .edit-btn,
        .update-btn {
            cursor: pointer;
        }

        .update-btn {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand font-weight-bold" href="<?php echo base_url('cdashboard/tampildata'); ?>">
            <img src="<?= base_url('images/pnb.png');?>" width="40" height="40" alt=""> PNBCC [<?= strtoupper($this->session->userdata('role')); ?>]
        </a>
        <ul class="navbar-nav font-weight-bold ml-auto">
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle custom-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        <span class="ml-2"><?= $this->session->userdata('nama'); ?></span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?php echo base_url('cdashboard/tampildata'); ?>">Home</a>
                        <a class="dropdown-item text-danger" href="<?= base_url('cadmin/logout');?>">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>


    <div class="container mt-5">
        <h2>Edit Profile</h2>
        <form action="<?= base_url('cprofile/simpanprofile') ?>" method="post">
            <!-- Add a hidden input field to store the user's ID -->
            <input type="hidden" name="id" value="<?= $this->session->userdata('id') ?>">

            <div class="form-group">
                <label for="nama">Name:</label>
                <input type="text" class="form-control" name="nama" value="<?= $this->session->userdata('nama') ?>">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?= $this->session->userdata('email') ?>">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" value="">
                <!-- Note: It's not recommended to pre-fill the password field for security reasons -->
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" value="<?= $this->session->userdata('username') ?>">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-success">Update</button>
                <button type="button" onclick="hapusakun()" class="btn btn-sm btn-danger">Hapus Akun</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script>
    function hapusakun(id) {
        var id = document.querySelector('input[name="id"]').value;
        
        if (confirm("Apakah yakin menghapus data ini?")) {
            window.location.href = "<?php echo base_url()?>cprofile/hapusakun/" + id;
        }
    }
</script>
</body>

</html>
