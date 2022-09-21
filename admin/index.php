
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
                <div class="col-md-7">
                <table class="shadow-sm table table-striped text-center">
                    <thead>    
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Incident Name</th>
                                <th class="text-center">Count</th>
                            </tr>
                    </thead>
                    <tbody>
                    <?php
                                $sql = "SELECT * FROM incident WHERE status=1";
                                $result = mysqli_query($connect,$sql);
                                $number_row = mysqli_num_rows($result);
                                $number = 0;
                                $number += $number;
                                if($number_row > 0){
                                    foreach($result as $key=>$value){
                                        $count_id=$value['id'];
                                        $sql = "SELECT * FROM logs WHERE incident_id='$count_id'";
                                        $result = mysqli_query($connect,$sql);
                                        $number_row = mysqli_num_rows($result);
                                        
                                        
                                        ?>
                            <tr>
                                <td><?php echo ++$number; ?></td>
                                <td><a href="solution.php?sub_id=<?php echo $value['sub_cat_id'] ?>&&cat_id=<?php echo $value['cat_id'] ?>&&incident_id=<?php echo $value['id'] ?>">
            
                                        <?php echo $value['title']; ?> <a></td>
                                <td><a href="#">
                                        <?php echo $number_row; ?> <a></td>
                            </tr>
                            <?php
                                        }
                                    }
                                
                            ?>

                        </tbody>
                </table>
                       
                </div>

                <div class="col-md-5">
                    <div class="row">
                        <div class="col-sm-6">
                        <div class="shadow-sm card bg-light mb-3" style="max-width: 18rem;">
                            <div class="card-header">Network</div>
                                <div class="card-body">
                                    <h5 class="card-title">25</h5>
                                    <p class="card-text">Some quick example</p>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-sm-6">
                        <div class="shadow-sm card bg-light mb-3" style="max-width: 18rem;">
                            <div class="card-header">Software</div>
                                <div class="card-body">
                                    <h5 class="card-title">25</h5>
                                    <p class="card-text">Some quick example</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                        <div class="shadow-sm card bg-light mb-3" style="max-width: 18rem;">
                            <div class="card-header">Hardware</div>
                                <div class="card-body">
                                    <h5 class="card-title">25</h5>
                                    <p class="card-text">Some quick example</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                        <div class="shadow-sm card bg-light mb-3" style="max-width: 18rem;">
                            <div class="card-header">Network</div>
                                <div class="card-body">
                                    <h5 class="card-title">25</h5>
                                    <p class="card-text">Some quick example</p>
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
