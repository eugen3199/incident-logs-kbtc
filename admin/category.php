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
           
            <div class="row">
                <div class="col-md-6">
                    <form action="backend.php" method="post">
                        <div class="form-group ">
                            <label for="category">Category:</label>
                            <input type="text" class="form-control" placeholder="Enter Category" name="category"
                                id="category" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" name="category_create" class="btn btn-primary" value="Create">
                            <!-- <p type="submit" name="category_create" class="btn btn-outline-primary" value="">  Create </p> -->
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM category Order by id DESC";
                                $result = mysqli_query($connect,$sql);
                                $number_row = mysqli_num_rows($result);
                                $number = 0;
                                $number += $number;
                                if($number_row > 0){
                                    foreach($result as $key=>$value){
                                        $status = $value['status'];
                                        if($status == 1){

                                        
                                        ?>
                            <tr>
                                <td><?php echo ++$number; ?></td>
                                <td><a href="subcategory.php?id=<?php echo $value['id']; ?>"> <?php echo $value['category']; ?> <a></td>
                                <td>

                                    <!-- Edit button Starts Here (KHT) -->
                                    <a class="btn btn-outline-warning" data-toggle="modal" data-target="#detail<?php echo $value['id']; ?>" ><ion-icon name="pencil-outline"></ion-icon></a>
                                    <!-- Edit button Ends Here (KHT) -->

                                    <form style="display:inline-block" class="form-display" action="backend.php" method="post">
                                        <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                                        <button type="submit" name="category_delete" value="Delete" onclick="return confirm('Are you sure you want to delete this Category?')" class="btn btn-outline-danger"><ion-icon name="trash-outline"></ion-icon></button>
                                    </form>

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
                                                <input type="hidden" name="cat_id" value="<?php echo $value['id']; ?>">
                                                <input type="text" name="cat_name" value="<?php echo $value['category']; ?>">
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                    <button type="submit" name="category_edit" value="Edit"  class="btn btn-success">Edit</button>
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

             <hr>

            
        </div>
    </div>
</div>



<?php
            include "footer.php";
        ?>