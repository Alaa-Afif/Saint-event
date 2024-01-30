<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <title>Nav bar</title>
  </head>
  <body class="overflow-hidden">
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
  </body>
</html>
