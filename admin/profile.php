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
            <h3> Profile </h3>

            <!-- Category -->



            <!-- Sub Category -->

            <div class="col-md-6">

                <form action="backend.php" method="post" enctype="multipart/form">

                <?php
                    $uid = $_SESSION['id'];
                    $sql = "SELECT * FROM member where id = $uid";
                    $result = mysqli_query($connect,$sql);
                    $number_row = mysqli_num_rows($result);
                    
                    if($number_row > 0){
                        foreach($result as $key=>$value){
                            $display_name= $value['display_name'];
                            $job_title=$value['job_title'];
                            $email=$value['email'];
                    ?>

                    <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                    <label> Display Name </label>
                    <input type="text" name="display_name" class="form-control" placeholder="<?php echo $value['display_name']; ?>" value="<?php echo $value['display_name']; ?>">
                    <br>
                    <label> Job Title </label>
                    <input type="text" name="job_title" class="form-control" placeholder="<?php echo $value['job_title']; ?>" value="<?php echo $value['job_title']; ?>">
                    <br>
                    <label> Useremail </label>
                    <input type="text" name="email" class="form-control" placeholder="<?php echo $value['email']; ?>" value="<?php echo $value['email']; ?>">
                    <br>
                    <input type="submit" class="btn btn-primary" name="save" value="Save">
                    <?php
                        }}
                    ?>
                </form> &nbsp;&nbsp;

                    
                            


                <h3> Change Password </h3>
                    <form action="backend.php" method="post" enctype="multipart/form">
                    

                    <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                    <label> Old Password </label>
                    <input type="password" name="old_password" class="form-control" placeholder="Old Password" required>
                    <br>
                    <label> New Password </label>
                    <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
                    <br>
                    <label> Comfirm Password </label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Comfirm Password" required>
                    <br>
                    <input type="submit" class="btn btn-primary" name="update" value="Update">
                    
                </form>

            </div>

            

        </div>
    </div>
</div>


<?php
            include "footer.php";
?>