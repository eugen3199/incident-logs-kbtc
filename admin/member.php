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
                            <label for="category">Username:</label>
                            <input type="text" class="form-control" placeholder="Enter Username" name="username"
                                id="category" required>
                        </div>
                        <br>

                        <div class="form-group ">
                            <label for="category">Email:</label>
                            <input type="text" class="form-control" placeholder="Enter Email" name="useremail"
                                id="category" required>
                        </div>
                        <br>
                       
                        <div class="form-group ">
                            <label for="category">Password:</label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password"
                                id="category" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="category">Role:</label>
                            <select type="text" name="role" class="form-control" id="category" required="required">
                                <option value="user"> User </option>
                                <option value="admin"> Admin </option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" name="member_create" class="btn btn-primary" value="Create">
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM member Order by id DESC";
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
                                <td><a href="#">
                                        <?php echo $value['name']; ?> <a></td>
                                <td><a href="#">
                                        <?php echo $value['email']; ?> <a></td>
                                <td><a href="#"> <?php echo $value['role']; ?> <a></td>
                                <td>



                                    <form style="display:inline-block" class="form-display" action="backend.php"
                                        method="post">
                                        <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                                        <h5><a class="text-dark" type="submit" name="account_delete" value="Delete"
                                            onclick="return confirm('Are you sure you want to delete this Account?')"
                                            ><ion-icon name="trash-outline"></ion-icon></button></h5>
                                    </form>

                                </td>
                            </tr>
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