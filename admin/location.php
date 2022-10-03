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




            <div class="col-md-12">

                <form action="backend.php" method="post" enctype="multipart/form">
                    <input type="text" name="location" class="form-control" placeholder="Enter Your Location (Required) " required>
                    <br>
                    <input type="submit" class="btn btn-primary" name="create_location" value="Create">
                </form>

            </div>

            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM location Order by id DESC";
                        $result = mysqli_query($connect,$sql);
                        if($result){
                            foreach($result as $value=>$row){
                                ?>
                    <tr>
                        <td><?php echo ++$value; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>

                </tbody>
            </table>

        </div>
    </div>
</div>







<?php
            include "footer.php";
        ?>