<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
        <button class="btn btn-outline-primary" id="sidebarToggle"><ion-icon name="reorder-four-outline"></ion-icon></button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a href="profile.php" class="link-secondary">
                        <ion-icon class="ion-person" name="person"></ion-icon>
                        <?php echo $_SESSION["username"]; ?>
                        
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
