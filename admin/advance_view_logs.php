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
         
	  <form action="advance_view_logs.php" method="post" class="form-inline">
		<div class="row">
                <div class="col-sm-3">
               	 <label>Start Date : </label>
               	 <input type="date" name="start_date" placeholder="" class="form-control" required>
                
                &nbsp;  &nbsp;
		</div>	
                <div class="col-sm-3">
               	 <label>End Date : </label>
               	 <input type="date" name="end_date" placeholder="" class="form-control" required>
               
                </div>
		<div class="col-sm-3">
                <label> Category :</label> 
                <select name="category" id="category" required class="form-control" onchange='changeAction(this.value)'>
                    <script>
                        var id_array = [];
                        var name_array = [];
                    </script>
                    <option selected value="*"> -- CATEGORY -- </option>
                    <script>
                        var sel = document.getElementById('category');
                    <?php
                        $sql = "SELECT * FROM category ORDER BY ID DESC";
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
                
		<div class="col-sm-3">
	 	  <label> Sub Category :</label>
                <select name="subcat" id="subcat" class="form-control">
                    <script>
                        var catid_array = [];
                        var id_array = [];
                        var name_array = [];
                    </script>
                    <option selected value="*"> -- SUBCATEGORY -- </option>
                    <script>
                    <?php
                        $sql = "SELECT * FROM sub_category";
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
                            opt.innerHTML = ' -- SUBCATEGORY -- ';
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
                &nbsp; &nbsp; 
 	     <div class="row">
	         <div class="col-sm-4">
                  <input class="btn btn-outline-success" name="search" type="submit" value="Search">
                 </div> 	
              </div>
</div>
            </form>
            
            <br> <br>
</div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
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
                        if (isset($_POST['start_date'])) {
                            $sdate = explode("-",preg_replace('!\s+!', ' ', htmlspecialchars($_POST['start_date'])));
                        }
                        if (isset($_POST['end_date'])) {
                            $edate = explode("-",preg_replace('!\s+!', ' ', htmlspecialchars($_POST['end_date'])));
                        }
                        if (isset($_POST['category'])) {
                            $category = htmlspecialchars($_POST['category']);
                        }
                        if (isset($_POST['subcat'])) {
                            $subcat = htmlspecialchars($_POST['subcat']);
                        }
                        if (isset($_POST['start_date']) AND isset($_POST['end_date']) AND isset($_POST['category']) AND isset($_POST['subcat'])) {
                            // echo "$sdate[0], $sdate[1], $sdate[2]<br>$edate[0], $edate[1], $edate[2]";
                        
                        
                        if ($category == '*') {
                            if ($subcat == '*') {
                                $sql = "SELECT * FROM logs order by id desc";
                            } else {
                                $sql = "SELECT * FROM logs where sub_cat_id=$subcat order by id desc";
                            }
                        } else {
                            if ($subcat == '*') {
                                $sql = "SELECT * FROM logs where cat_id=$category order by id desc";
                            }
                            $sql = "SELECT * FROM logs where cat_id=$category AND sub_cat_id=$subcat order by id desc";
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
                            $create_at = explode("-",preg_replace('!\s+!', ' ', $value['create_at']));
                            if($create_at[0] >= $sdate[0] && $create_at[0] <= $edate[0] && $create_at[1] >= $sdate[1] && $create_at[1] <= $edate[1] && $create_at[2] >= $sdate[2] && $create_at[2] <= $edate[2]){

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
                        <td><?php echo "$create_at[1]-$create_at[2]-$create_at[0]"; ?></td>
                        <td><?php echo $location; ?></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo $subcategory; ?></td>
                        <td><?php echo $incident; ?></td>
                        <td><?php echo $answer; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $remark; ?></td>
                        <td>
                            <form style="display:inline-block" class="form-display" action="backend.php" method="post">
                                <input type="hidden" value="<?php echo $l_id ?>" name="id">
                                <button type="submit" name="logs_delete" value="Delete" onclick="return confirm('Are you sure you want to delete this Log?')"
                                class="btn btn-outline-danger"><ion-icon name="trash-outline"></ion-icon></button>
                            </form>
                        </td>
                    </tr>
                    <?php       }
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
