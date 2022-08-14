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
            
         
	  <form action="view_logs.php" method="get" class="form-inline">
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
                <?php
                 
                 if(isset($_GET['category']))
                 {
                 $start_date = $_GET["start_date"];
                 $end_date = $_GET["end_date"];
                 $cat_id = $_GET['category'];
                 $sub_cat_id = $_GET["subcat"];
                 }
                ?>

                <label> Category :</label> 
                <select name="category"  required class="form-control">  
                    <?php
                        $sql = "SELECT * FROM category ORDER BY ID DESC";
                        $result = mysqli_query($connect,$sql);
                        foreach($result as $r){

                            $id = $r['id'];
                            $status ;
                           
                            ?>
                            <option  <?php if($id == $cat_id){
                                echo "selected";
                            } ?>
                            value="<?php echo $r['id'] ?>"> <?php echo $r['category'] ?> </option>
                            <?php
                        }
                    ?>
		 
                </select>
               </div>
                
		<div class="col-sm-3">
	 	  <label> Sub Category :</label>
                  <select name="subcat" class="form-control" >
                    <option selected disabled value=""> -- SUBCATEGORY -- </option>
                   <?php
                        if(isset($_GET['category'])){
                            $cat_id = $_GET['category'];
                             $sql = "SELECT * FROM sub_category WHERE cat_id=$cat_id";
                             $result = mysqli_query($connect,$sql);
                             foreach($result as $row){
                                 ?>
                                    <option value="<?php echo $row['id'] ?>"> <?php echo $row['subcategory'] ?> </option>
                                 <?php
                             }
                        }
                       
                    ?>
                </select>
                </div>
                
                
                &nbsp; &nbsp; 
 	     <div class="row">
	         <div class="col-sm-4">
                  <input class="btn btn-outline-success" type="submit" value="Search">
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
                    $cateogry;$subcategory;$incident;$solution;
                    //  SELECT `id`, `cat_id`, `sub_cat_id`, `incident_id`, `solution_id`, `name`, `location`, `remark`, `create_at` FROM `logs` WHERE 1
                        $sql = "SELECT * FROM logs WHERE cat_id=$cat_id && sub_cat_id=$sub_cat_id && ( $start_date < create_at < $end_date  )   order  by id desc";
                        $result = mysqli_query($connect,$sql);
                        foreach($result as $i=>$value){
                            $cat_id = $value['cat_id'];
                            $sub_cat_id = $value['sub_cat_id'];
                            $incident_id = $value['incident_id'];
                            $solution_id = $value['solution_id'];
                            $name = $value['name'];
                            $location = $value['location'];
                            $remark = $value['remark'];
                            $create_at = $value['create_at'];

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
                        <td><?php echo $create_at; ?></td>
                        <td><?php echo $location; ?></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo $subcategory; ?></td>
                        <td><?php echo $incident; ?></td>
                        <td><?php echo $answer; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $remark; ?></td>
                        <td>


                            <form style="display:inline-block" class="form-display" action="backend.php" method="post">
                                <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                                <button type="submit" name="logs_delete" value="Delete"
                                    onclick="return confirm('Are you sure you want to delete this Log?')"
                                    class="btn btn-outline-danger"><ion-icon name="trash-outline"></ion-icon></button>
                            </form>
                        </td>
                    </tr>
                    <?php
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
