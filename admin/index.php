
<?php
            include "head.php";
        ?>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <?php
                include "slidebar.php";
           ?>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <?php
                    include "nav.php";
                ?>
        <!-- Page content-->
        <div class="container-fluid">
            <br>
            <h2> Dashboard </h2>

            <div class="row">
                <div class="col-md-8">
                <table class="table table-striped text">
                        
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Incident Name</th>
                                <th class="text-center">Count</th>
                            </tr>
                </table>
                       
                </div>

                <div class="col-md-4">
                    <div class="row">
                       <div class="col-md-6">
                            <div class="card">
                                <div class="card-body bg-info">
                                    <h4 class="card-title">Network</h4>
                                    <p class="card-text">25</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
            

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body bg-info">
                                    <h4 class="card-title">Software</h4>
                                    <p class="card-text">30</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                       <div class="col-md-6">
                            <div class="card">
                                <div class="card-body bg-info">
                                    <h4 class="card-title">Network</h4>
                                    <p class="card-text">25</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
            

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body bg-info">
                                    <h4 class="card-title">Software</h4>
                                    <p class="card-text">30</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        

</div>
</div>

<?php
            include "footer.php";
        ?>
