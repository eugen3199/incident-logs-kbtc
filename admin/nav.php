<nav class="shadow navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <h4><ion-icon class="text-light" name="reorder-four-outline" id="sidebarToggle"></ion-icon></h4>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="profile.php" class="text-light text-decoration-none">
                    <u>
                        <ion-icon class="ion-person" name="person"></ion-icon>
                        <?php echo $_SESSION["FullName"]; ?>
                    </u>
                </a>
            </li>
        </ul>
    </div>
</nav>
