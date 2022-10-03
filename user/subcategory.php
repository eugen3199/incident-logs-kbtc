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
                $id = htmlspecialchars($_GET["id"]) ;
                $sql = "SELECT * FROM category WHERE id=$id";
                $result = mysqli_query($connect,$sql);
                if($result){
                    foreach($result as $row){
                        $id = $row["id"];
                        $name = $row["category"];
                    
                        ?>
            <div class="row">

                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="category.php">Category</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $name; ?></li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th> SubCategory Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM sub_category WHERE cat_id='$id' Order by id desc";
                                $result = mysqli_query($connect,$sql);
                                $number_row = mysqli_num_rows($result);
                                $number = 0;
                                $number += $number;
                                if($number_row > 0){
                                    foreach($result as $key=>$value){
                                        $cat_id = $value['cat_id'];
                                        $status = $value['status'];
                                        if($status == 1){
                                           $cat = $_GET["id"];
                                        
                                        ?>
                            <tr>
                                <td><?php echo ++$number; ?></td>
                                <td>
                                    <a href="incident.php?sub_id=<?php echo $value['id'] ?>&&cat_id=<?php echo $cat ?>">
                                        <?php echo $value['subcategory']; ?> </a>

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
                                                <input type="hidden" name="subcat_id" value="<?php echo $value['id']; ?>">
                                                <input type="text" name="subcat_name" value="<?php echo $value['subcategory']; ?>">
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                    <button type="submit" name="subcategory_edit" value="Edit"  class="btn btn-success">Edit</button>
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
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <?php
                    }
                }

            ?>

            <!-- Sub Category -->


        </div>
    </div>
</div>



<?php
            include "footer.php";
        ?>