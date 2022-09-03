<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
        <h4><ion-icon class="mt-2" name="reorder-four-outline" id="sidebarToggle">></ion-icon></h4>
        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">                             
            <li class="nav-item">
                <a href="profile.php" class="text-dark text-decoration-none">
                    <ion-icon class="ion-person" name="person"></ion-icon>
                    <?php echo $_SESSION["FullName"]; ?>
                </a>
            </li>
        </ul>
    </div>
</nav>
