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

            <br><br><hr><br>

            <form action="advance_view_logs.php" method="post" class="form-inline">
                <div class="row">
                    <div class="col-sm-2">
                        <label>Start Date : </label>
                        <input type="date" name="start_date" placeholder="" class="form-control" onchange='changeggAction(this.value)'>
                        
                    </div>  
                    <br>
                    <div class="col-sm-2">
                        <label>End Date : </label>
                        <input type="date" name="end_date" placeholder="" class="form-control" onchange='changeggAction(this.value)'>

                    </div>
                    <br>
                    <div class="col-sm-2">
                        <label> Category :</label> 
                        <select name="category" id="category" required class="form-control form-select" onchange='changeAction(this.value)'>
                            <script>
                            var id_array = [];
                            var name_array = [];
                            </script>
                            <option selected value="*"> -- All -- </option>
                            <script>
                                var sel = document.getElementById('category');
                                <?php
                                    $sql = "SELECT * FROM category WHERE status=1 ORDER BY ID DESC";
                                    $result = mysqli_query($connect,$sql);
                                    foreach($result as $row){
                                ?>
                                        id_array.push("<?php echo $row['id'] ?>");
                                        name_array.push("<?php echo $row['category'] ?>");
                                <?php
                                    }
                                ?>
                                for (var i = 0; i<=id_array.length; i++){
                                    var opt = document.createElement('option');
                                    opt.value = id_array[i];
                                    opt.innerHTML = name_array[i];
                                    sel.appendChild(opt);
                                }
                            </script>
                        </select>
                    </div>
                    <br>
                    <div class="col-sm-2">
                        <label> Sub Category :</label>
                        <select name="subcat" id="subcat" class="form-control form-select" onchange='changeincAction(this.value)'>
                            <script>
                                var catid_array = [];
                                var id_array = [];
                                var name_array = [];
                            </script>
                            <option selected value="*"> -- All -- </option>
                            <script>
                                <?php
                                    $sql = "SELECT * FROM sub_category WHERE status=1 ORDER BY ID DESC";
                                    $result = mysqli_query($connect,$sql);
                                    foreach($result as $row){
                                ?>
                                        catid_array.push("<?php echo $row['cat_id'] ?>");
                                        id_array.push("<?php echo $row['id'] ?>");
                                        name_array.push("<?php echo $row['subcategory'] ?>");
                                <?php
                                    }
                                ?>
                            </script>
                            <script type="text/javascript">
                                function changeAction(id){
                                    console.log(id);
                                    // id = 1;
                                    var sel = document.getElementById('subcat');
                                    var i, L = sel.options.length - 1;
                                    for(i = L; i >= 0; i--) {
                                        sel.remove(i);
                                    }
                                    var opt = document.createElement('option');
                                    opt.value = '*';
                                    opt.innerHTML = ' -- All -- ';
                                    sel.appendChild(opt);
                                    for (var i = 0; i<=id_array.length; i++){
                                        if (catid_array[i] == id) {
                                            // console.log();
                                            var opt = document.createElement('option');
                                            opt.value = id_array[i];
                                            opt.innerHTML = name_array[i];
                                            sel.appendChild(opt);
                                        }
                                    }
                                }
                            </script>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label> Incident :</label>
                        <select name="incident" id="incident" class="form-control form-select" onchange="changeggAction(this.value)">
                            <script>
                                var inc_catid_array = [];
                                var inc_subcatid_array = [];
                                var inc_id_array = [];
                                var inc_name_array = [];
                            </script>
                            <option selected value="*"> -- All -- </option>
                            <script>
                                <?php
                                    $sql = "SELECT * FROM incident WHERE status = 1 ORDER BY ID DESC";
                                    $result = mysqli_query($connect,$sql);
                                    foreach($result as $row){
                                ?>
                                        inc_catid_array.push("<?php echo $row['cat_id'] ?>");
                                        inc_subcatid_array.push("<?php echo $row['sub_cat_id'] ?>");
                                        inc_id_array.push("<?php echo $row['id'] ?>");
                                        inc_name_array.push("<?php echo $row['title'] ?>");
                                <?php
                                    }
                                ?>
                            </script>
                            <script type="text/javascript">
                                function changeincAction(id){
                                    console.log(id);
                                    // id = 1;
                                    var incsel = document.getElementById('incident');
                                    var i, L = incsel.options.length - 1;
                                    for(i = L; i >= 0; i--) {
                                        incsel.remove(i);
                                    }
                                    var opt = document.createElement('option');
                                    opt.value = '*';
                                    opt.innerHTML = ' -- All -- ';
                                    incsel.appendChild(opt);
                                    for (var i = 0; i<=inc_id_array.length; i++){
                                        if (inc_subcatid_array[i] == id) {
                                            // console.log();
                                            var opt = document.createElement('option');
                                            opt.value = inc_id_array[i];
                                            opt.innerHTML = inc_name_array[i];
                                            incsel.appendChild(opt);
                                        }
                                    }
                                }

                                function changeggAction(id){
                                    console.log(id);
                                }
                            </script>
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <label></label>
                        <br>
                        <input class="btn btn-outline-success" name="search" type="submit" value="Search">
                    </div>     
                    </div>
            </form>
            <br>
            <hr>
            <br>
        </div>
        <div class="container-fluid">
            <table class="table table-striped table-bordered table-hover display table-responsive" id="example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="px-1 py-1">No</th>
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
                        <th class="px-1 py-1">No</th>
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

                        if (isset($_POST['start_date'])) {
                            $sdate = explode("-",preg_replace('!\s+!', ' ', htmlspecialchars($_POST['start_date'])));
                            $sdate1 = strtotime(htmlspecialchars($_POST['start_date']));
                        }
                        
                        if (isset($_POST['end_date'])) {
                            $edate = explode("-",preg_replace('!\s+!', ' ', htmlspecialchars($_POST['end_date'])));
                            $edate1 = strtotime(htmlspecialchars($_POST['end_date']));
                        }
                        if (isset($_POST['category'])) {
                            $category = htmlspecialchars($_POST['category']);
                        }
                        if (isset($_POST['subcat'])) {
                            $subcat = htmlspecialchars($_POST['subcat']);
                        }
                        if (isset($_POST['incident'])) {
                            $incident = htmlspecialchars($_POST['incident']);
                        }
                        $dstr = date('Y-m-d', strtotime($_POST['start_date']));
                        if ($category == '*') {
                            if ($subcat == '*') {
                                $sql = "SELECT * FROM logs order by id desc";
                            } else {
                                if ($incident == '*'){
                                    $sql = "SELECT * FROM logs where sub_cat_id=$subcat order by id desc";
                                }
                                else{
                                    $sql = "SELECT * FROM logs where sub_cat_id=$subcat AND incident_id=$incident order by id desc";
                                }
                                
                            }
                        } else {
                            if ($subcat == '*') {
                                $sql = "SELECT * FROM logs where cat_id=$category order by id desc";
                            } else {
                                if ($incident == '*'){
                                    $sql = "SELECT * FROM logs where sub_cat_id=$subcat order by id desc";
                                }
                                else{
                                    $sql = "SELECT * FROM logs where sub_cat_id=$subcat AND incident_id=$incident order by id desc";
                                }
                            }
                        }

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
                            $create_at1 = strtotime($value['create_at']);
                            $_time = $value['_time'];
                            $datecon = true;
                            $sdatecon = true;
                            if ($sdate1=='' and $edate1==''){
                                $datecon = false;
                            }
                            elseif ($sdate1!='' and $edate1=='') {
                                $sdatecon = false;
                            }
                            
                            if(($sdate1=='' and $edate1=='') or ($create_at1 >= $sdate1 and $create_at1 <= $edate1)){

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
                        <td class="px-1 py-1"><?php echo ++$i; ?></td>
                        <td class="px-1 py-1">

                        <!-- Edit button Starts Here (KHT) -->
                        <a class="btn-link btn" data-toggle="modal" data-target="#detail<?php echo $l_id; ?>" ><?php echo $create_at; ?></a>
                        <!-- Edit button Ends Here (KHT) -->
                        </td>
                        <td class="px-1 py-1">

                        <!-- Edit button Starts Here (KHT) -->
                        <a class="btn-link btn" data-toggle="modal" data-target="#edit_time<?php echo $l_id; ?>" ><?php echo $_time; ?></a>
                        <!-- Edit button Ends Here (KHT) -->
                        </td>
                        <td class="px-1 py-1"><?php echo $location; ?></td>
                        <td class="px-1 py-1"><?php echo $category; ?></td>
                        <td class="px-1 py-1"><?php echo $subcategory; ?></td>
                        <td class="px-1 py-1"><?php echo $incident; ?></td>
                        <td class="px-1 py-1"><?php echo $answer; ?></td>
                        <td class="px-1 py-1"><?php echo $name; ?></td>
                        <td class="px-1 py-1"><?php echo $remark; ?></td>
                        <td class="px-1 py-1">
                            <form style="display:inline-block" class="form-display" action="backend.php" method="post">
                                <input type="hidden" value="<?php echo $l_id ?>" name="id">
                                <button type="submit" name="logs_delete" value="Delete" onclick="return confirm('Are you sure you want to delete this Log?')"
                                class="text-dark btn"><h5><ion-icon name="trash-outline"></ion-icon></h5></button>
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

                    <div class="modal" id="edit_time<?php echo $l_id; ?>">
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
                                        <input type="time" name="_time" class="form-control" required>
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
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    function changedateAction(){

    }
</script>
<?php
include "footer.php";
?>
