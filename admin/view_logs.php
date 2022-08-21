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

            <!-- View All Logs -->

            <!--<a href="export.php" class="btn btn-primary ">Download As CSV</a>-->

            <button onclick="window.print()" class="btn btn-primary ">Print</button>
            
               <br> <br>
            
       
            
            <br> <br>

            <table id="example" class="table table-striped table-bordered table-hover display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
			<th>Time</th>
                        <th>Location</th>
                        <th>Category</th>
                        <th>SubCategory</th>
                        <th>Incident</th>
                        <th>Solution</th>
                        <th>User</th>
                        <th>Remark</th>
                        <th>Action</th>
                    </tr>
                </thead>
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
                        <td><a class="btn-link btn" data-toggle="modal" data-target="#detail<?php echo $l_id; ?>" ><?php echo $create_at; ?></a></td>
                        <td><a class="btn-link btn" data-toggle="modal" data-target="#time<?php echo $l_id; ?>" ><?php echo $_time; ?></a></td>
			<td><?php echo $location; ?></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo $subcategory; ?></td>
                        <td><?php echo $incident; ?></td>
                        <td><?php echo $answer; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $remark; ?></td>
                        <td>
                            <form style="display:inline-block" class="form-display" action="backend.php" method="post">
                                <input type="hidden" value=<?php echo '"'.$l_id.'"' ?> name="id">
                                <button type="submit" name="logs_delete" value="Delete"
            			onclick="return confirm('Are you sure you want to delete this Log?')"
                                class="btn btn-outline-danger"><ion-icon name="trash-outline"></ion-icon></button>
                            </form>
                        </td>
                    </tr>
                    <!-- Edit Model Starts Here (KHT) -->
                    <div class="modal" id="detail<?php echo $l_id; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

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
                                            <button type="submit" name="date_edit" value="Edit"  class="btn btn-success">Edit</button>
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
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<?php
            include "footer.php";
        ?>
