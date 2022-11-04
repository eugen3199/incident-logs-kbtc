<?php
    include "head.php";
    include "nav.php";
    include "alert.php";
    $_SESSION['cpage'] = "advlogs";
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
                                <h3>Advanced Search Incident Logs</h3>
                                <hr>
                            </div>
                            <div class="shadow-sm my-3 px-3 py-3 card bg-black text-light">
                                <h6><u>Filters</u></h6>
                                <form action="advance_view_logs.php" method="post" class="form-inline">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <br>
                                            <label>Start Date : </label>
                                            <input type="text" name="start_date" placeholder="<?php echo $_POST['start_date']; ?>" class="form-control form-date" style="width: 100%;" onfocus="(this.type='date')" onblur="(this.type='text')" id="sdate">
                                        </div>
                                        <br>
                                        <div class="col-md-2">
                                            <br>
                                            <label>End Date : </label>
                                            <input type="text" name="end_date" placeholder="<?php echo $_POST['end_date']; ?>" class="form-control form-date" style="width: 100%;" onfocus="(this.type='date')" onblur="(this.type='text')" id="edate">
                                        </div>
                                        <br>
                                        <div class="col-md-2">
                                            <br>
                                            <label>Location :</label>
                                            <select class="form-control form-select" name="location" style="width: 100%;" id="locsel">
                                                <option value="*" selected> -- All -- </option>
                                                <?php
                                                        $selected = false;
                                                        $sql = "SELECT * FROM location ORDER BY id DESC";
                                                        $result = mysqli_query($connect,$sql);
                                                        foreach($result as $row){
                                                ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name'];?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="col-md-2">
                                            <br>
                                            <label> Category :</label> 
                                            <select name="category" id="category" class="form-control form-select" onchange='changeAction(this.value)' style="width: 100%;">
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
                                        <div class="col-md-2">
                                            <br>
                                            <label> Sub-Category :</label>
                                            <select name="subcat" id="subcat" class="form-control form-select" onchange='changeincAction(this.value)' style="width: 100%;">
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
                                        <div class="col-md-2">
                                            <br>
                                            <label> Incident :</label>
                                            <select name="incident" id="incident" class="form-control form-select" onchange="changeggAction(this.value)" style="width: 100%;">
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

                                        <div class="col-md-2 col-6">
                                            <br>
                                            <input class="btn btn-info text-black" name="search" type="submit" value="Search" style="width: 100%;">
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <br>
                                            <input class="btn btn-info text-black" name="clear" type='submit' value="Clear" style="width: 100%;">
                                        </div>
                                    </div>
                                </form>
                                <br>
                                <hr>
                                <div class="container-fluid justify-content-center">
                                    <h6 class="text-light">Results Found - <span id="result_count"></span></h6>
                                    <table id="example" class="table table-responsive-sm table-dark table-striped table-bordered table-sm" width="100%">
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
                                            if(isset($_POST["search"])){
                                                if (isset($_POST['start_date'])) {
                                                    $sdate = explode("-",preg_replace('!\s+!', ' ', htmlspecialchars($_POST['start_date'])));
                                                    $sdate1 = strtotime(htmlspecialchars($_POST['start_date']));
                                                }
                                                
                                                if (isset($_POST['end_date'])) {
                                                    $edate = explode("-",preg_replace('!\s+!', ' ', htmlspecialchars($_POST['end_date'])));
                                                    $edate1 = strtotime(htmlspecialchars($_POST['end_date']));
                                                }
                                                if (isset($_POST['location'])) {
                                                    $location = htmlspecialchars($_POST['location']);
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
                                                $dstr = date('d/m/Y', strtotime($_POST['start_date']));
                                                if ($location == '*') {
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
                                                        }
                                                        else {
                                                            if ($incident == '*'){
                                                                $sql = "SELECT * FROM logs where sub_cat_id=$subcat order by id desc";
                                                            }
                                                            else{
                                                                $sql = "SELECT * FROM logs where sub_cat_id=$subcat order by id desc";
                                                            }
                                                        }
                                                    }
                                                }
                                                else{
                                                    if ($category == '*') {
                                                        if ($subcat == '*') {
                                                            $sql = "SELECT * FROM logs where location=$location order by id desc";
                                                        } else {
                                                            if ($incident == '*'){
                                                                $sql = "SELECT * FROM logs where sub_cat_id=$subcat AND location=$location order by id desc";
                                                            }
                                                            else{
                                                                $sql = "SELECT * FROM logs where sub_cat_id=$subcat AND incident_id=$incident AND location=$location order by id desc";
                                                            }
                                                        }
                                                    } else {
                                                        if ($subcat == '*') {
                                                            $sql = "SELECT * FROM logs where cat_id=$category AND location=$location order by id desc";
                                                        }
                                                        else {
                                                            if ($incident == '*'){
                                                                $sql = "SELECT * FROM logs where sub_cat_id=$subcat AND location=$location order by id desc";
                                                            }
                                                            else{
                                                                $sql = "SELECT * FROM logs where sub_cat_id=$subcat AND incident_id=$incident AND location=$location order by id desc";
                                                            }
                                                        }
                                                    }
                                                }
                                                

                                                $result = mysqli_query($connect,$sql);
                                                $cat_count = 0;
                                                $subcat_count = 0;
                                                $incident_count = 0;
                                                $cat_result_arr = array();
                                                $subcat_result_arr = array();
                                                $inc_result_arr = array();
                                                $result_count = 0;

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
                                                    $result_count += 1;
                                                    
                                                    if(($sdate1=='' and $edate1=='') or ($create_at1 >= $sdate1 and $create_at1 <= $edate1)){

                                                        $sql2 = "SELECT * FROM category WHERE id=$cat_id";
                                                        $result2 = mysqli_query($connect,$sql2);
                                                        foreach($result2 as $value){
                                                            $category = $value["category"];
                                                            if (array_key_exists($category, $cat_result_arr)){
                                                                $cat_result_arr[$category]['count'] += 1;
                                                            }
                                                            else{
                                                                // array_push($result_arr, $category);
                                                                $cat_result_arr[$category]['count'] = 1;
                                                                $cat_result_arr[$category]['id'] = $cat_id;
                                                            }
                                                        }

                                                        $sql2 = "SELECT * FROM sub_category WHERE id=$sub_cat_id";
                                                        $result2 = mysqli_query($connect,$sql2);
                                                        foreach($result2 as $value){
                                                            $subcategory = $value["subcategory"];
                                                            if (array_key_exists($subcategory, $subcat_result_arr)){
                                                                $subcat_result_arr[$subcategory]['count'] += 1;
                                                            }
                                                            else{
                                                                // array_push($result_arr, $category);
                                                                $subcat_result_arr[$subcategory]['count'] = 1;
                                                                $subcat_result_arr[$subcategory]['id'] = $sub_cat_id;
                                                            }
                                                        }

                                                        $sql3 = "SELECT * FROM incident WHERE id=$incident_id";
                                                        $result3 = mysqli_query($connect,$sql3);
                                                        foreach($result3 as $value){
                                                            $incident = $value["title"];
                                                            if (array_key_exists($incident, $inc_result_arr)){
                                                                $inc_result_arr[$incident]['count'] += 1;
                                                            }
                                                            else{
                                                                // array_push($result_arr, $category);
                                                                $inc_result_arr[$incident]['count'] = 1;
                                                                $inc_result_arr[$incident]['id'] = $incident_id;
                                                            }
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
                                                    <a class="btn-link btn text-info" data-toggle="modal" data-target="#detail<?php echo $l_id; ?>" ><?php echo date('d/m/Y', strtotime($create_at)); ?></a>
                                                <!-- Edit button Ends Here (KHT) -->
                                                </td>
                                                <td class="px-1 py-1">

                                                <!-- Edit button Starts Here (KHT) -->
                                                    <a class="btn-link btn text-info" data-toggle="modal" data-target="#edit_time<?php echo $l_id; ?>" ><?php echo $_time; ?></a>
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
                                                        class="text-black btn"><h5><ion-icon name="trash-outline"></ion-icon></h5></button>
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

                                            <div class="modal" id="edit_time<?php echo $l_id; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bg-dark">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"> Edit Time</h4>
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
                                                                <button type="submit" name="edit_time" value="Edit"  class="btn btn-info">Edit</button>
                                                                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Model Ends Here (KHT) -->

                                            <?php
                                                    }
                                                }
                                            }
                                            elseif(isset($_POST["clear"])){
                                                unset($_POST['location']);
                                                unset($_POST['category']);
                                                unset($_POST['subcat']);
                                                unset($_POST['incident']);
                                                unset($_POST['start_date']);
                                                unset($_POST['end_date']);
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="shadow-sm my-3 px-3 py-3 card bg-black text-light">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <table class="table table-responsive-sm table-dark table-striped table-bordered table-sm mx-auto" id="dt1" width="100%">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Category</th>
                                                </tr>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Category Name</th>
                                                    <th>Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $n = 1;
                                                foreach ($cat_result_arr as $cat => $cvalue) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $n; ?></td>
                                                    <td><?php echo $cat; ?></td>
                                                    <td><?php echo $cvalue['count']; ?></td>
                                                </tr>
                                                <?php
                                                $n += 1;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-4">
                                        <table class="table table-responsive-sm table-dark table-striped table-bordered table-sm" id="dt2" width="100%">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Sub-Category</th>
                                                </tr>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Sub-Category Name</th>
                                                    <th>Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $n = 1;
                                                foreach ($subcat_result_arr as $subcat => $scvalue) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $n; ?></td>
                                                    <td><?php echo $subcat; ?></td>
                                                    <td><?php echo $scvalue['count']; ?></td>
                                                </tr>
                                                <?php
                                                $n += 1;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-4">
                                        <table class="table table-responsive-sm table-dark table-striped table-bordered table-sm" id="dt3" width="100%">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Incident</th>
                                                </tr>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Incident Name</th>
                                                    <th>Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $n = 1;
                                                foreach ($inc_result_arr as $inc => $incvalue) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $n; ?></td>
                                                    <td><?php echo $inc; ?></td>
                                                    <td><?php echo $incvalue['count']; ?></td>
                                                </tr>
                                                <?php
                                                $n += 1;
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
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').dataTable({
            "sort": true
        });
    });
    $(document).ready(function () {
        $('#dt1').dataTable({
            "sort": false,
            "searching":false
        });
    });
    $(document).ready(function () {
        $('#dt2').dataTable({
            "sort": false,
            "searching":false
        });
    });
    $(document).ready(function () {
        $('#dt3').dataTable({
            "sort": false,
            "searching":false
        });
    });
</script>
<script>

        var v = document.getElementById('result_count');
        v.innerHTML="<?php echo $result_count; ?>";
            <?php
        if (isset($_POST['location'])) {
            if ($_POST['location']!='*') {
                ?>
                var loc = document.getElementById('locsel');
                loc.value="<?php echo $_POST['location']; ?>";

                <?php
            }
        }

        if (isset($_POST['category'])) {
            if ($_POST['category']!='*') {
                ?>
                var sel = document.getElementById('category');
                sel.value=<?php echo $_POST['category']; ?>;
                var subsel = document.getElementById('subcat');
                changeAction(sel.value);
                <?php
            }
        }

        if (isset($_POST['subcat'])) {
            if ($_POST['subcat']!='*') {
                ?>
                subsel.value=<?php echo $_POST['subcat']; ?>;
                var incsel = document.getElementById('incident');
                changeincAction(subsel.value);
                <?php
            }
        }

        if (isset($_POST['incident'])) {
            if ($_POST['incident']!='*') {
                ?>
                incsel.value=<?php echo $_POST['incident']; ?>;
                <?php
            }
        }

        

    ?>
</script>
<?php
include "footer.php";
?>
