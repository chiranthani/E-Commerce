<?php
$pageTitle = "Welcome to Home Page";
require_once __DIR__ . "/components/header.php"; 
?>

<main>
    <div class="container mt-5">
        <h1>Sign Up</h1>
        <p class="lead"></p>
        <form class="row g-3">
          <div class="col-md-6">
            <input type="text" id="name" name="name" class="form-control" placeholder="Name" aria-label="Name">
          </div>
           <div class="col-md-6">
            <input type="text" id="phone_no" name="phone_no" class="form-control" placeholder="Phone No" aria-label="Phone No">
          </div>
          <div class="col-md-12">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" aria-label="Email">
          </div>
          <div class="col-md-6">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
          </div>
          <div class="col-md-6">
            <input type="confirmed_password" id="confirmed_password" name="confirmed_password" class="form-control" placeholder="Confirmed Password" aria-label="Confirmed Password">
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign Up</button>
          </div>
        </form>
    </div>
</main>

<?php require_once __DIR__ . "/components/common-script.php"; ?>
