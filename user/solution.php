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

            <!-- Category -->



            <?php
                $sub_id = htmlspecialchars($_GET['sub_id']);
                $cat_id = htmlspecialchars($_GET["cat_id"]) ;
                $incident_id = htmlspecialchars($_GET["incident_id"]);
                $sql = "SELECT * FROM category WHERE id=$cat_id";
                $result = mysqli_query($connect,$sql);
                if($result){
                    foreach($result as $row){
                        $id = $row["id"];
                        $name = $row["category"];
                        $sql2 = "SELECT * FROM sub_category WHERE id=$sub_id";
                        $result2 = mysqli_query($connect,$sql2);
                        if($result2){
                            foreach($result2 as $row2){
                               
                                $subcategory = $row2["subcategory"];
                                $sql3 = "SELECT * FROM incident WHERE id=$incident_id";
                                $result3 = mysqli_query($connect,$sql3);
                                if($result3){
                                    foreach($result3 as $row3){
                                        $title  = $row3["title"];
                                    }
                                }

                                $sql4 = "SELECT * FROM incident WHERE id='$incident_id'";
                                $result4 = mysqli_query($connect,$sql4);
                                if($result4){
                                    foreach($result4 as $row4){
                                        $question = $row4["title"];
                                    }
                                }
                                ?>
            <div class="row">

                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="category.php">Category</a></li>
                            <li class="breadcrumb-item"><a
                                    href="subcategory.php?id=<?php echo $cat_id ?>"><?php echo $name ?></a></li>
                            <li class="breadcrumb-item"><a
                                    href="incident.php?sub_id=<?php echo $sub_id ?>&&cat_id=<?php echo $cat_id ?>"><?php echo $subcategory ?></a>
                            </li>

                            <li class="breadcrumb-item"><a href="#"><?php echo $title ?></a></li>

                        </ol>
                    </nav>
                </div>


            </div>
            <?php
                            }
                        }
                        
                    }
                }

            ?>

            <!-- Sub Category -->


        

            <div class="col-md-12">
               <button class="btn btn-outline-primary"  data-toggle="modal" data-target="#addSolution"> Add New Solution </button>
                <br> <br>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Solution</th>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $sql = "SELECT * FROM solution WHERE incident_id='$incident_id' ";
                                $result = mysqli_query($connect,$sql);
                                $number_row = mysqli_num_rows($result);
                                $number = 0;
                                $number += $number;
                                if($number_row > 0){
                                    foreach($result as $key=>$value){
                                      
                                        
                                        ?>
                        <tr>
                            <td><?php echo ++$number; ?></td>
                            <td>
                                <p  data-toggle="modal" data-target="#detail<?php echo $value['id']; ?>" >Solution <?php echo $number; ?></p>
                            </td>
       
                           
                        </tr>
                        <div class="modal" id="detail<?php echo $value['id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> Solution</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <?php echo $value['answer']; ?>
                
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <form action="logs.php" method="post">
            <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>">
            <input type="hidden" name="sub_id" value="<?php echo $sub_id; ?>">
            <input type="hidden"  name="inc_id" value="<?php echo $incident_id; ?>">
            <input type="hidden"  name="answer_id" value="<?php echo $value['id']; ?>">
            <input type="submit" name="redirect_log" class="btn btn-primary" value="Log with this solution" />
        </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>

  </div>
</div>

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


<!-- The Modal -->
<div class="modal" id="addSolution">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Solution</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="backend.php" method="post">
                    
                    <div class="form-group ">
                            <label for="category">Incident:</label>
                            <input type="hidden" name="incident" value="<?php echo $incident_id;  ?>">
                            <input type="text" disabled class="form-control" placeholder="Enter Sub Category"
                                id="category"  value="<?php echo $question; ?>" required>
                        </div>
                    <div class="form-group ">
                        <label for="category">Solution :</label>
                        <textarea type="text" class="form-control" placeholder="Write Solution" name="solution" style="height: 200px;"
                            id="category" required></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                       
                    </div>
                
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <input type="submit" name="solution_create" class="btn btn-outline-primary" value="Create">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
    </form>
  </div>
</div>





<?php
            include "footer.php";
        ?>
