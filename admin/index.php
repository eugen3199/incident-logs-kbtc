
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
                <table class="shadow-sm table table-striped table-hover display table-responsive" id="example">
                
                    <thead>    
                            <tr>
                                <th>No</th>
                                <th>Incident Name</th>
                                <th>Count</th>
                            </tr>
                    </thead>
                    <tbody>
                    <?php
                                $sql = "SELECT * FROM incident WHERE status=1";
                                $result = mysqli_query($connect,$sql);
                                $number_row = mysqli_num_rows($result);
                                $number = 0;
                                
                                if($number_row > 0){
                                    $titles = [];
                                    $scid = [];
                                    $cid = [];
                                    $inid = [];
                                    foreach($result as $key=>$value){
                                        $count_id=$value['id'];
                                        $sql = "SELECT * FROM logs WHERE incident_id='$count_id'";
                                        $result1 = mysqli_query($connect,$sql);
                                        $number_row1 = mysqli_num_rows($result1);
                                        $artmp =[   'count'=>$number_row1,
                                                    'scid'=>$value['sub_cat_id'],
                                                    'cid'=>$value['cat_id'],
                                                    'inid'=>$value['id']
                                                ];
                                        $titles[$value['title']]=$artmp;
                                    }
                                    arsort($titles);
                                    foreach ($titles as $key => $value) {

                                        ?>
                            <tr>
                                <td><?php echo ++$number; ?></td>
                                <td><a href="solution.php?sub_id=<?php echo $value['scid']; ?>&&cat_id=<?php echo $value['cid'] ?>&&incident_id=<?php echo $value['inid'] ?>">
            
                                        <?php echo $key; ?> <a></td>
                                <td><a href="#">
                                        <?php echo $value['count']; ?> <a></td>
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function () {
            $('#example').DataTable();
        });
        </script>

<?php
            include "footer.php";
        ?>
