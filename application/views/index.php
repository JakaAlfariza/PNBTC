<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Home</title>
  </head>

  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="<?= base_url('chalaman/index');?>">
        <img src="<?= base_url('images/pnb.png');?>" width="40" height="40" alt="">
      </a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0">
          <div class="input-group">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari Event" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-outline-primary" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <ul class="navbar-nav font-weight-bold">
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-layer-group"></i> 
		      Kategori</a>
        </li>
        <li class="nav-item">
          <?php
// Check if the user is logged in
if ($this->session->userdata('id')) {
    // User is logged in
    echo '<a class="nav-link" href="' . base_url('chalaman/logout') . '">Sign Out</a>';
} else {
    // User is not logged in
    echo '<a class="nav-link" href="' . base_url('chalaman/login') . '">Login</a>';
}
?>

        </li>
      </ul>
    </nav>
  
    <!-- Container -->
	  <div class="container text-center mt-5">
      <h1>ON PROGRESS</h1>
      <?php
      echo '<pre>';
print_r($this->session->all_userdata());
echo '</pre>';
?>
    </div>
  
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
