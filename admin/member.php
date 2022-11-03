<?php
    include "head.php";
    include "nav.php";
    include "alert.php";
    $_SESSION['cpage'] = "member";
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
                            <br>
                            <!-- Category -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="shadow-sm px-3 pt-3 mb-3 card bg-black text-light">
                                        <h3>Members</h3>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="shadow-sm px-3 pt-3 mb-3 card bg-black text-light">
                                        <h5><u>Create New Member</u></h5>
                                        <br>
                                        <form action="backend.php" method="post">
                                            <div class="form-group ">
                                                <label for="category">Username:</label>
                                                <input type="text" class="form-control" placeholder="Enter Username" name="username"
                                                    id="category" required>
                                            </div>
                                            <br>

                                            <div class="form-group ">
                                                <label for="category">Email:</label>
                                                <input type="text" class="form-control" placeholder="Enter Email" name="useremail" id="category" required>
                                            </div>
                                            <br>
                                            <div class="form-group ">
                                                <label for="category">Displayname:</label>
                                                <input type="text" class="form-control" placeholder="Enter Displayname" name="display_name" id="category" required>
                                            </div>
                                            <br>
                                            <div class="form-group ">
                                                <label for="category">Job Title:</label>
                                                <input type="text" class="form-control" placeholder="Enter Job Title" name="job_title" id="category" required>
                                            </div>
                                            <br>
                                           <div class="form-group ">
                                                <label for="category">Password:</label>
                                                <input type="password" class="form-control" placeholder="Enter Password" name="password" id="category" required>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="category">Role:</label>
                                                <select type="text" name="role" class="form-control form-select" id="category" required="required">
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
                                </div>
                                <div class="col-md-9">
                                    <div class="shadow-sm px-3 pt-3 mb-3 card bg-black text-light">
                                        <h5><u>All Members</u></h5>
                                        <br>
                                        <table id="example" class="table table-dark table-responsive-sm table-striped table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Display Name</th>
                                                    <th>Job Title</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = "SELECT * FROM member Order by name";
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
                                                    <td>
                                                        <?php echo $value['name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value['email']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value['display_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value['job_title']; ?>
                                                    </td>
                                                    <td>
                                                        <a class="btn-link btn text-info" data-toggle="modal" data-target="#role-<?php echo $value['id']; ?>" ><?php echo $value['role']; ?></a>
                                                        <a class="text-info" href="#">  </a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-row">
                                                            <div class="p-0">
                                                                <form style="display:inline-block" class="form-display" action="backend.php" method="post">
                                                                    <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                                                                    <button class="text-light btn" type="submit" name="password_reset" value="Password reset" onclick="return confirm('Are you sure you want to reset password for this account?')">
                                                                    
                                                                        <h5><ion-icon name="key" ></ion-icon></h5>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            <!-- Edit button Ends Here (KHT) -->
                                                            <div class="p-0">
                                                                <form style="display:inline-block" class="form-display" action="backend.php" method="post">
                                                                    <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                                                                    <button class="text-light btn" type="submit" name="category_delete" value="" onclick="return confirm('Are you sure you want to delete this Category?')"
                                                                     ><h5><span data-tooltip="Tooltip help here!" data-flow="right"><ion-icon name="trash"></ion-icon></span></h5>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div class="modal" id="role-<?php echo $value['id'] ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content bg-dark">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> Edit Role For <?php echo $value['display_name']; ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <form action="backend.php" method="post">
                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                                                                    <select class="form-select" name="role">
                                                                        <option value="user"> User </option>
                                                                        <option value="admin"> Admin </option>
                                                                    </select>
                                                                </div>
                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                        <button type="submit" name="role_edit" value="Edit"  class="btn btn-info">Confirm</button>
                                                                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                            }
                                                        }
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
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<?php
    include "footer.php";
?>