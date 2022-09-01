<?php
            include "head.php";
            include "alert.php";
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

            <!-- Category -->



            <!-- Sub Category -->

            <div class="col-md-6">

                <form action="backend.php" method="post" enctype="multipart/form">
                    <input type="text" name="display_name" class="form-control" placeholder="Display Name" required>
                    <br>
                    <input type="text" name="job_title" class="form-control" placeholder="Job Title" required>
                    <br>
                    <input type="text" name="email" class="form-control" placeholder="Useremail" required>
                    <br>
                    <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
                    <br>
                    <input type="submit" class="btn btn-primary" name="save" value="Save">
                </form>

            </div>

            

        </div>
    </div>
</div>


<?php
            include "footer.php";
        ?>