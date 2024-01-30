<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
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
    <title>Login</title>
  </head>
  <body>
    <!--navbar-->
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
              $name = mysqli_real_escape_string($conn,$_POST['name']);
              $password = mysqli_real_escape_string($conn,$_POST['password']);
              
              $res = mysqli_query($conn,"SELECT * FROM user_prop WHERE fname='$name' AND pass='$password'") or die("error selecting");
              $row = mysqli_fetch_assoc($res);

              if (is_array($row) && !empty($row)){
                $_SESSION['valid'] = $row['fname'];
                $_SESSION['instagram_id'] = $row['instagram_id'];
                $_SESSION['gendre'] = $row['gendre'];
                $_SESSION['pp'] = $row['pp'];
              } else{
                echo "<div class=' d-flex flex-column justify-content-center align-items-center'>
                <div class='message'>
                  <p>Wrong name or password.</p>
                </div>
                <a href='javascript:self.history.back()'><button class='btn btn-danger rounded-2 text-center p-4'>Go back</button></a>
                </div>";
              }
              if(isset($_SESSION['valid'])){
                header("Location: index.php");
              }
            }else{
          ?>

          <div class="row align-items-center">
            <div class="header-text mb-4">
              <h2>Hello Again</h2>
              <p>We are happy to have you back.</p>
            </div>
            <form action="" method="post">
              <div class="input-group mb-3">
                <input
                  name="name"
                  type="text"
                  class="form-control form-control-lg bg-light fs-6"
                  placeholder="Enter your name : "
                />
              </div>

              <div class="input-group mb-1">
                <input
                  name="password"
                  type="password"
                  class="form-control form-control-lg bg-light fs-6"
                  placeholder="password"
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
                  value="Login"
                  class="btn btn-lg btn-danger w-100 fs-6"
                />
              </div>

              <div class="row">
                <small
                  >Don't have an account?<a href="signup.php"
                    >Sign Up</a
                  ></small
                >
              </div>
            </form>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </body>
</html>
