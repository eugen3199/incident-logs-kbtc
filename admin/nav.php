<div class="container-fluid fixed-top border-bottom bg-light">
    <div class="row collapse show no-gutters d-flex h-100 pt-3 pb-2">
        <div class="col-3 px-0 w-sidebar navbar-collapse collapse d-none d-md-flex">
            <!-- spacer col -->
            <b> KBTC IT and DT </b>
        </div>
        <div class="col px-3 px-md-0">
            <div class="d-flex">
                <!-- toggler -->
                <button data-toggle="collapse" data-target=".collapse" role="button" class="btn btn-link text-dark">
                    <ion-icon class="text-dark" name="reorder-four-outline" id="sidebarToggle"></ion-icon>
                </button>
                <a href="#modal" data-target="modal" data-toggle="modal" class="ml-auto text-dark"><i class="fa fa-cog"></i></a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="profile.php" class="text-dark text-decoration-none">
                            <u>
                                <ion-icon class="ion-person" name="person"></ion-icon>
                                <?php echo $_SESSION["FullName"]; ?>
                            </u>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>