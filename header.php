<header class="bg-black d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom p-5">
    <a href="home" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-white text-decoration-none">CMB
    </a>

    <ul class="text-white nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="login" class="text-white nav-link px-2 link-secondary">Intra in platforma</a></li>
        <li><a href="login" class="text-white nav-link px-2 link-dark">ADMINISTRATOR</a></li>
    </ul>

    <div class="col-md-3 text-end">
        <button type="button" class="btn btn-primary"><a class="text-white nav-link px-2 link-dark" href="register">Inregistreaza-te</a></button>
        <?php
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            echo '<button type="button" class="btn btn-danger"><a class="text-white nav-link px-2 link-dark" href="logout">Log out</a></button>';
        }
        ?>
    </div>
</header>