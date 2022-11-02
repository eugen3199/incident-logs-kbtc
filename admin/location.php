<?php
    include "head.php";
    include "nav.php";
    include "alert.php";
?>
<div class="d-flex" id="wrapper">
    <div class="container-fluid px-0">
        <div class="d-flex" id="wrapper">
            <div id="page-content-wrapper">
                <div class="row  collapse show no-gutters d-flex">
                    <!-- Sidebar-->
                    <?php
                        include "slidebar.php";
                    ?>
                        
                    <!-- Page content wrapper-->
                    <div class="col p-3">

                        <!-- Top navigation-->
                        <?php
                        include "nav.php";
                        ?>
                        <!-- Page content-->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="shadow-sm my-3 px-3 py-3 card bg-black text-light">
                                        <h3>Locations</h3>
                                        <hr>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <div class="shadow-sm my-3 px-3 py-3 card bg-black text-light">
                                        <form action="backend.php" method="post" enctype="multipart/form">
                                            <input type="text" name="location" class="form-control" placeholder="Enter Your Location (Required) " required>
                                            <br>
                                            <input type="submit" class="btn btn-primary" name="create_location" value="Create">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="shadow-sm my-3 p-3 card bg-black text-light">
                                        <h6><u>All Locations</u></h6>
                                        <br>
                                        <table class="table table-dark table-striped table-bordered table-sm">
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
                                                    <td>
                                                        <div class="d-flex flex-row">
                                                            <div class="p-1">
                                                                <button class="text-light btn" data-toggle="modal" data-target="#detail<?php echo $value['id']; ?>" >
                                                                <h5><ion-icon name="pencil-outline"></ion-icon></h5></button>
                                                            </div>
                                                            <!-- Edit button Ends Here (KHT) -->
                                                            <div class="p-1">
                                                                <form style="display:inline-block" class="form-display" action="backend.php"
                                                                    method="post">
                                                                    <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                                                                    <button class="text-light btn" type="submit" name="location_delete" value="Delete"
                                                                        onclick="return confirm('Are you sure you want to delete this Incident?')"
                                                                        >
                                                                        <h5>
                                                                            <ion-icon name="trash-outline"></ion-icon>
                                                                        </h5>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
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