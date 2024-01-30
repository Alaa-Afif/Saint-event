<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Sign Up</title>
  </head>
  <body>
    <head>
    <nav
      class="navbar navbar-expand-lg navbar-light"
      style="background-color: rgba(255, 255, 255, 0.15)"
    >
      <div class="container">
        <!--logo-->
        <a class="navbar-brand text-dark" href="#">Saint-Vailentin</a>
        <!--toggle button-->
        <button
          class="navbar-toggler border-0 "
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar"
        >
          <span class="navbar-toggler-icon" ></span>
        </button>
        <!--Side bar-->
        <div
          class="sidebar offcanvas offcanvas-start"
          tabindex="-1"
          id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel"
        >
          <!-- Side bar header -->
          <div class="offcanvas-header text-dark border-bottom-1">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
              Saint-Valentin
            </h5>
            <button
              type="button"
              class="btn-close btn-close-dark"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <!--Side bar body-->
          <div class="offcanvas-body d-flex flex-column flex-lg-row p-lg-0 p-4">
            <ul
              class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3"
            >
              <li class="nav-item mx-2">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link " href="#">Services</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link " href="#">Contact</a>
              </li>
            </ul>
            <!--Login / Sign up-->
            <div
              class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3"
            >
              <a href="login.php" class="text-dark">Login</a>
              <a
                href="signup.php"
                class="text-white text-decoration-none px-3 py-1 bg-danger rounded-2"
                >Sign Up</a
              >
            </div>
          </div>
        </div>
      </div>
    </nav>
    </head>
    <main>
      <!----------------------- Main Container -------------------------->
    <div
      class="container d-flex justify-content-center align-items-center min-vh-100"
    >
      <!----------------------- Login Container -------------------------->
      <div class="row border rounded-5 p-3 bg-white shadow box-area">
        <!--------------------------- Left Box ----------------------------->

        <div
          class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column bg-danger left-box"
        >
          <div class="featured-image mb-3">
            <img src="images/1.png" class="img-fluid" style="width: 250px" />
          </div>
          <p
            class="text-white fs-2"
            style="
              font-family: 'Courier New', Courier, monospace;
              font-weight: 600;
            "
          >
            Be verified
          </p>
          <small
            class="text-white text-warp text-center"
            style="width: 17rem; font-family: 'Courier New', Courier, monospace"
            >Join our Rating community.</small
          >
        </div>

        <!-------------------- ------ Right Box ---------------------------->
        <div class="col-md-6 right-box">


          <?php
            include('config/conn.php');
            if (isset($_POST['submit'])) {
              $name = $_POST['name'];
              $insta = $_POST['insta'];
              $password = $_POST['password'];
              $rpass = $_POST['repeat_password'];
              $gendre = $_POST['gendre'];
              $img = $_FILES['image']['name'];

              
              //verifying the unique name
              if ($gendre == "Homme") {
                $verify_query_n = mysqli_query($conn,"SELECT fname FROM homme WHERE fname='$name'");
                $verify_query_insta = mysqli_query($conn,"SELECT instagram_id FROM homme WHERE instagram_id='$insta'") or die('error, instagram verification');
              }elseif($gendre = "Femme"){
                $verify_query_n = mysqli_query($conn,"SELECT fname FROM femme WHERE fname='$name'");
                $verify_query_insta = mysqli_query($conn,"SELECT instagram_id FROM femme WHERE instagram_id='$insta'") or die('error, instagram verification');
              }
              if (mysqli_num_rows($verify_query_n) != 0) {
                echo "<div class='message'>
                  <p>This name is used, Try another one.</p>
                </div></br>";
                echo"<a href='javascript:self.history.back()'><button class='btn btn-danger rounded-2 text-center p-4'>Go back</button></a>";
              }elseif (mysqli_num_rows($verify_query_insta) != 0) {
                echo "<div class=' d-flex flex-column justify-content-center align-items-center'>
                <div class='message'>
                  <p>This instagram ID is used, Try another one.</p>
                </div>
                <a href='javascript:self.history.back()'><button class='btn btn-danger rounded-2 text-center p-4'>Go back</button></a>
                </div>";
              }elseif (strlen($password)< 8) {
                echo "<div class=' d-flex flex-column justify-content-center align-items-center'>
                <div class='message'>
                  <p>Your password must have 8 charachters.</p>
                </div>
                <a href='javascript:self.history.back()'><button class='btn btn-danger rounded-2 text-center p-4'>Go back</button></a>
                </div>";
              }elseif ($password != $rpass) {
                echo "<div class=' d-flex flex-column justify-content-center align-items-center'>
                <div class='message'>
                  <p>Retype your password correctly.</p>
                </div>
                <a href='javascript:self.history.back()'><button class='btn btn-danger rounded-2 text-center p-4'>Go back</button></a>
                </div>";
              }elseif($gendre != 'Homme' and $gendre != 'Femme' ){
                echo "<div class=' d-flex flex-column justify-content-center align-items-center'>
                <div class='message'>
                  <p>You have entered a wrong gendre.</p>
                </div>
                <a href='javascript:self.history.back()'><button class='btn btn-danger rounded-2 text-center p-4'>Go back</button></a>
                </div>";
              }else{
                if ($gendre == "Homme") {
                  $insert = "INSERT INTO homme(fname,instagram_id,gendre,pass,pp) VALUES('$name','$insta','$gendre','$password','$img')" or die("error inserting values");
                  if (mysqli_query($conn,$insert)) {
                    move_uploaded_file($_FILES['image']['tmp_name'],"picture/hpic/$img");
                  }
                }elseif($gendre == 'Femme'){
                  $insert = "INSERT INTO femme(fname,instagram_id,gendre,pass,pp) VALUES('$name','$insta','$gendre','$password','$img')" or die("error inserting values");
                  if (mysqli_query($conn,$insert)) {
                    move_uploaded_file($_FILES['image']['tmp_name'],"picture/fpic/$img");
                  }
                }
                echo "
                <div class='col-md-6 right-box'>
                <div class='row align-items-center'>
                  <div class='header-text mb-4'>
                    <h2>Welcome <b>$name</b></h2>
                    <p>this i th eimg $img</p>
                    <p
                      class='w-100 padiing 10px bg-success text-center p-2 rounded-1 text-white'
                    >
                      You've signed up successfully
                    </p>
                  </div>
                  <div
                    class='d-flex flex-column justify-content-center align-items-center'
                  >
                    <img
                      src='images/pp.jfif'
                      class='img-fluid p-2 rounded-circle'
                      style='width: 250px'
                    />
                    <p>Thomas Chilbi</p>
                    <p><i class='fa-brands fa-instagram'></i> $insta </p>
                  </div>
                  <div class='input-group mb-3'>
                    <button class='btn btn-lg btn-danger w-100 fs-6'>
                      <a href='index.php' style='text-decoration: none; color: #fff'>Continue</a>
                    </button>
                  </div>
                </div>
              </div>";
              }
            }else{
          ?>



          <div class="row align-items-center">
            <div class="header-text mb-4">
              <h2>Welcome to our website</h2>
              <p>We are happy to have you here.</p>
            </div>


            <form action="" method="post" enctype="multipart/form-data">
              <div class="input-group mb-3">
                <input
                  type="text"
                  id="name"
                  name="name"
                  class="form-control form-control-lg bg-light fs-6"
                  placeholder="FUll Name"
                />
              </div>
              <div class="input-group mb-3">
                <input
                  type="text"
                  id="insta"
                  name="insta"
                  class="form-control form-control-lg bg-light fs-6"
                  placeholder="instagram id"
                />
              </div>
              <div class="input-group mb-3">
                <input
                  type="password"
                  name="password"
                  id="password"
                  class="form-control form-control-lg bg-light fs-6"
                  placeholder="password"
                />
              </div>

              <div class="input-group mb-3">
                <input
                  type="password"
                  id="repeat_password"
                  name="repeat_password"
                  class="form-control form-control-lg bg-light fs-6"
                  placeholder="Repeat password"
                />
              </div>

              <div class="input-group mb-3">
                <input
                  list="gendre"
                  name="gendre"
                  id="gnedre"
                  class="form-control form-control-lg bg-light fs-6"
                  placeholder="Gendre"
                  required
                />
                <datalist id="gendre">
                  <option value="Homme"></option>
                  <option value="Femme"></option>
                </datalist>
              </div>

              <div class="input-group mb-1">
                <input
                  name="image"
                  type="file"
                  class="form-control form-control-lg bg-light fs-6"
                />
              </div>


              <div class="input-group mb-5 d-flex justify-content-between">
                <div class="form-check">
                  <input
                    type="checkbox"
                    class="form-check-input"
                    id="formCheck"
                  />
                  <label for="formCheck" class="form-check-label text-secondary"
                    ><small>Remember me</small></label
                  >
                </div>

                <div class="forgot">
                  <small><a href="#">Forgot Password?</a></small>
                </div>
              </div>

              <div class="input-group mb-3">
                <input
                  name="submit"
                  type="submit"
                  value="Sign Up"
                  class="btn btn-lg btn-danger w-100 fs-6"
                />
              </div>

              <div class="row">
                <small>I have an account! <a href="login.php">Login</a></small>
              </div>
            </form>
          </div>
          <?php }?>
        </div>
      </div>
    </div>
  </main>
    

  </body>
</html>
