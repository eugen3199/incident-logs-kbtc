<div class="container-fluid fixed-top bg-black">
    <div class="row collapse show no-gutters d-flex h-100">
        <div class="col-3 px-0 w-sidebar navbar-collapse collapse d-none d-md-flex text-light">
            <!-- spacer col -->
            <b> KBTC IT and DT </b>
        </div>
        <div class="col px-3 px-md-0 py-3">
            <div class="d-flex">
                <!-- toggler -->
                <button data-toggle="collapse" data-target=".collapse" role="button" class="btn btn-link text-white">
                    <ion-icon class="text-light" name="reorder-four-outline" id="sidebarToggle"></ion-icon>
                </button>
                <a href="#modal" data-target="modal" data-toggle="modal" class="ml-auto text-white"><i class="fa fa-cog"></i></a>

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
        </div>
    </div>
</div>