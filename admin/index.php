
<?php
            include "head.php";
            include "nav.php";
            $_SESSION['cpage'] = "home";
        ?>
<div class="d-flex" id="wrapper">
    <div class="container-fluid px-0">
        <div id="page-content-wrapper">
            <div class="row collapse show no-gutters d-flex">
            <!-- Sidebar-->
            <?php
                include "slidebar.php";
            ?>
                
            <!-- Page content wrapper-->
            <div class="col p-3">
                
                    <div class="container-fluid">
                        <div class="shadow-sm my-3 px-3 py-3 card">
                            <h2> Dashboard </h2>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="shadow-sm px-3 py-3 mb-3 card">
                                    <h5><u>Incidents List</u></h5>
                                    <br>
                                    <table id="example" class="table table-striped table-bordered table-sm">
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
                                                <td><a class="text-info" href="solution.php?sub_id=<?php echo $value['scid']; ?>&&cat_id=<?php echo $value['cid'] ?>&&incident_id=<?php echo $value['inid'] ?>">
                            
                                                        <?php echo $key; ?> <a></td>
                                                <td><a href="#" class="text-info">
                                                        <?php echo $value['count']; ?> <a></td>
                                            </tr>
                                            <?php
                                                        }
                                                    }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="shadow-sm px-3 pt-3 card">
                                    <h5><u>Top Categories</u></h5>
                                    <br>
                                    <div class="row">
                                <?php
                                    $sql1 = "SELECT cat_id, COUNT(*) AS total FROM logs GROUP BY cat_id ORDER BY COUNT(*) DESC";
                                    $result1 = mysqli_query($connect,$sql1);
                                    $number_row1 = mysqli_num_rows($result1);

                                    $n = 0;

                                    if($number_row > 0){
                                        foreach ($result1 as $key1 => $value1) {
                                            if ($n>4) {
                                                break;
                                            }
                                            $cat_id=$value1['cat_id'];
                                            $sql2 = "SELECT * FROM category WHERE status=1 AND id=$cat_id";
                                            $result2 = mysqli_query($connect,$sql2);
                                            $number_row2 = mysqli_num_rows($result2);
                                            foreach ($result2 as $key2 => $value2) {
                                ?>
                                        <div class="col-sm-6">
                                            <div class="shadow-sm card mb-3 mx-auto" style="max-width: 18rem;">
                                                <div class="card-header"><?php echo $value2["category"]; ?></div>
                                                <div class="card-body">
                                                    <h3 class="card-title"><?php echo $value1["total"]; ?></h3>
                                                    <p class="card-text">
                                                        <a href="subcategory.php?id=<?php echo $value1['cat_id']; ?>" class="text-info">details..</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                            }
                                            $n += 1;
                                        }
                                    }
                                ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

<?php
            include "footer.php";
        ?>
