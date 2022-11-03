<?php
    include "head.php";
    include "nav.php";
    include "alert.php";
    $_SESSION['cpage'] = "vlogs";
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
            <div class="shadow-sm my-3 px-3 py-3 card bg-black text-light">
                <h3>Incident Logs</h3>
                <hr>
            </div>
            <div class="shadow-sm my-3 p-3 pb-3 card bg-black text-light">
                <!-- View All Logs -->
                <div class="row">
                    <div class="col-6">
                        <h5><u>View All Incident Logs</u></h5>
                    </div>
                    <div class="col-6">
                        <button onclick="window.print()" class="btn btn-info text-light float-right" style="width: 100px;">Print</button>
                    </div>
                </div>
                <br>
                <table id="example" class="table table-dark table-responsive-sm table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="px-1 py-1">Date</th>
                            <th class="px-1 py-1">Time</th>
                            <th class="px-1 py-1">Location</th>
                            <th class="px-1 py-1">Category</th>
                            <th class="px-1 py-1">SubCategory</th>
                            <th class="px-1 py-1">Incident</th>
                            <th class="px-1 py-1">Solution</th>
                            <th class="px-1 py-1">User</th>
                            <th class="px-1 py-1">Remark</th>
                            <th class="px-1 py-1">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th class="px-1 py-1">Date</th>
                            <th class="px-1 py-1">Time</th>
                            <th class="px-1 py-1">Location</th>
                            <th class="px-1 py-1">Category</th>
                            <th class="px-1 py-1">SubCategory</th>
                            <th class="px-1 py-1">Incident</th>
                            <th class="px-1 py-1">Solution</th>
                            <th class="px-1 py-1">User</th>
                            <th class="px-1 py-1">Remark</th>
                            <th class="px-1 py-1">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        $cateogry;$subcategory;$incident;$solution;
                        //  SELECT `id`, `cat_id`, `sub_cat_id`, `incident_id`, `solution_id`, `name`, `location`, `remark`, `create_at` FROM `logs` WHERE 1
                            $sql = "SELECT * FROM logs    order  by id desc";
                            $result = mysqli_query($connect,$sql);
                            foreach($result as $i=>$value){
    				            $l_id = $value['id'];
                                $cat_id = $value['cat_id'];
                                $sub_cat_id = $value['sub_cat_id'];
                                $incident_id = $value['incident_id'];
                                $solution_id = $value['solution_id'];
                                $name = $value['name'];
                                $location = $value['location'];
                                $remark = $value['remark'];
                                $create_at = $value['create_at'];
    			                $_time = $value['_time'];

                                $sql2 = "SELECT * FROM category WHERE id=$cat_id && status=1";
                                $result2 = mysqli_query($connect,$sql2);
                                foreach($result2 as $value){
                                    $category = $value["category"];
                                }

                                $sql2 = "SELECT * FROM sub_category WHERE id=$sub_cat_id && status=1";
                                $result2 = mysqli_query($connect,$sql2);
                                foreach($result2 as $value){
                                    $subcategory = $value["subcategory"];
                                }

                                $sql3 = "SELECT * FROM incident WHERE id=$incident_id";
                                $result3 = mysqli_query($connect,$sql3);
                                foreach($result3 as $value){
                                    $incident = $value["title"];
                                }

                                $sql4 = "SELECT * FROM solution WHERE id=$solution_id";
                                $result4 = mysqli_query($connect,$sql4);
                                foreach($result4 as $value){
                                    $answer = $value["answer"];
                                }

                                $sql5 = "SELECT * FROM location WHERE id=$location";
                                $result5 = mysqli_query($connect,$sql5);
                                foreach($result5 as $value){
                                    $location = $value["name"];
                                }
                                ?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td class="px-1 py-1">
                                <a class="btn-link btn text-info" data-toggle="modal" data-target="#detail<?php echo $l_id; ?>" ><?php echo date('d/m/Y', strtotime($create_at)); ?></a>
                            </td>
                            <td class="px-1 py-1"><a class="btn-link btn text-info" data-toggle="modal" data-target="#edit_time<?php echo $l_id; ?>" ><?php echo $_time; ?></a></td>
                            <td class="px-1 py-1"><?php echo $location; ?></td>
                            <td class="px-1 py-1"><?php echo $category; ?></td>
                            <td class="px-1 py-1"><?php echo $subcategory; ?></td>
                            <td class="px-1 py-1"><?php echo $incident; ?></td>
                            <td class="px-1 py-1"><?php echo $answer; ?></td>
                            <td class="px-1 py-1"><?php echo $name; ?></td>
                            <td class="px-1 py-1"><?php echo $remark; ?></td>
                            <td class="px-1 py-1">
                                <form style="display:inline-block" class="form-display" action="backend.php" method="post">
                                    <input type="hidden" value=<?php echo '"'.$l_id.'"' ?> name="id">
                                    <button class="text-dark btn" type="submit" name="logs_delete" value="Delete" onclick="return confirm('Are you sure you want to delete this Log?')">
                                        <h5><ion-icon name="trash-outline"></ion-icon></h5></button>
                                </form>
                            </td>
                        </tr>
                        <!-- Edit Model Starts Here (KHT) -->
                        <div class="modal" id="detail<?php echo $l_id; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content bg-dark">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"> Edit Date</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="backend.php" method="post">
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?php echo $l_id; ?>">
                                            <input type="date" name="date" class="form-control" required>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                                <button type="submit" name="date_edit" value="Edit"  class="btn btn-info">Edit</button>
                                                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Model Ends Here (KHT) -->
            			<!-- Edit Model Starts Here (KHT) -->
            			<div class="modal" id="edit_time<?php echo $l_id; ?>">
            				<div class="modal-dialog">
            					<div class="modal-content">
            						<!-- Modal Header -->
            						<div class="modal-header">
            							<h4 class="modal-title"> Edit Time</h4>
            							<button type="button" class="close" data-dismiss="modal">&times;</button>
            						</div>
            						<form action="backend.php" method="post">
            							<!-- Modal body -->
            							<div class="modal-body">
            								<input type="hidden" name="id" value="<?php echo $l_id; ?>">
            								<input type="time" id="_time" name="_time">
            							</div>
            							<!-- Modal footer -->
            							<div class="modal-footer">
            								<button type="submit" name="edit_time" value="Edit"  class="btn btn-success">Edit</button>
            								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            							</div>
            						</form>
            					</div>
            				</div>
            			</div>
            			<!-- Edit Model Ends Here (KHT) -->
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
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
