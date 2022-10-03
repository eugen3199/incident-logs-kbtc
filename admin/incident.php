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
                                ?>
            <div class="row">

                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="category.php">Category</a></li>
                            <li class="breadcrumb-item">
                                <a href="subcategory.php?id=<?php echo $cat_id ?>"><?php echo $name ?></a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo $subcategory ?></a></li>

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
                <form action="backend.php" method="post">
                    <input type="hidden" name="category" value="<?php echo $_GET["cat_id"]; ?>">
                    <input type="hidden" name="subcategory" value="<?php echo $_GET["sub_id"]; ?>">
                    <div class="form-group ">
                        <label for="category">Incident :</label>
                        <input type="text" class="form-control" placeholder="Enter Incident " name="incident"
                            id="category" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" name="incident_create" class="btn btn-outline-primary" value="Create">
                    </div>
                </form>
            </div>

            <hr>

            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Soultion Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $sql = "SELECT * FROM incident WHERE cat_id=$cat_id && sub_cat_id=$sub_id && status=1;";
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
                                <a
                                    href="solution.php?cat_id=<?php echo $cat_id; ?>&&sub_id=<?php echo $sub_id ?>&&incident_id=<?php echo $value['id']; ?>">
                                    <?php echo $value['title']; ?> </a>

                            </td>
                            <td>
                                <?php
                                        $sql2 = "SELECT * FROM solution WHERE incident_id=$id AND status=1";
                                        $result2 = mysqli_query($connect,$sql2);
                                        $count = mysqli_num_rows($result2);
                                        
                                    ?>
                                <button type="button" class="btn btn-primary">
                                    <?php
echo $count;
?>
                                </button>
                            </td>
                            <td>

                                <!-- Edit button Starts Here (KHT) -->
                                <div class="d-flex flex-row">
                                    <div class="p-2">
                                    <button class="text-dark btn" data-toggle="modal" data-target="#detail<?php echo $value['id']; ?>" >
                                    <h5><ion-icon name="pencil-outline"></ion-icon></h5></button>
                                    </div>
                                    <!-- Edit button Ends Here (KHT) -->
                                    <div class="p-2">
                                <form style="display:inline-block" class="form-display" action="backend.php"
                                    method="post">
                                    <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                                    <button class="text-dark btn" type="submit" name="incident_delete" value="Delete"
                                        onclick="return confirm('Are you sure you want to delete this Incident?')"
                                        >
                                        <h5>
                                            <ion-icon name="trash-outline"></ion-icon>
                                        </h5>
                                    </button>
                                </form>
                                    </div>
                                    </div>

                            </td>
                        </tr>
                        <!-- Edit Model Starts Here (KHT) -->
                            <div class="modal" id="detail<?php echo $value['id'] ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title"> Edit Form</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form action="backend.php" method="post">
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                                                <input type="text" name="title" value="<?php echo $value['title']; ?>">
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                    <button type="submit" name="incident_edit" value="Edit"  class="btn btn-success">Confirm</button>
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
</div>



<?php
            include "footer.php";
        ?>
