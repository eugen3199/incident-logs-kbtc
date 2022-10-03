<?php
            include "head.php";
            include "alert.php";
            $redirect_log = $_POST["redirect_log"];
            if(!isset($redirect_log)){
                header("Location:index.php");
            }
            $cat_id = $_POST["cat_id"];
            $sub_id = $_POST["sub_id"];
            $inc_id = $_POST["inc_id"];
            $answer_id = $_POST["answer_id"];
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

            <!-- Display Text -->
            <?php
                $category ; $subcategory ; $incident ; $solution ;
                
                $sql1 = "SELECT * FROM category WHERE id=$cat_id";
                $result1 = mysqli_query($connect,$sql1);
                foreach($result1 as $data){
                    $category = $data['category'];
                }


                $sql2 = "SELECT * FROM sub_category WHERE id=$sub_id";
                $result2 = mysqli_query($connect,$sql2);
                foreach($result2 as $data){
                    $subcategory = $data['subcategory'];
                }

                $sql3 = "SELECT * FROM incident WHERE id=$inc_id";
                $result3 = mysqli_query($connect,$sql3);
                foreach($result3 as $data){
                    $incident = $data['title'];
                }
               
                $sql4 = "SELECT * FROM solution WHERE id=$answer_id";
                $result4 = mysqli_query($connect, $sql4);
                foreach($result4 as $data){
                    $answer = $data['answer'];
                }
            
                
            ?>

            <form action="backend.php" method="post">

                <input type="hidden" name="cat_id" value="<?php echo $cat_id ?>">
                <input type="hidden" name="sub_id" value="<?php echo $sub_id ?>">
                <input type="hidden" name="inc_id" value="<?php echo $inc_id ?>">
                <input type="hidden" name="answer_id" value="<?php echo $answer_id ?>">
                <div class="form-group ">
                    <label for="category">Category:</label>
                    <input type="text" disabled class="form-control"  id="category"
                        value="<?php echo $category ?>" required>
                </div>

                <div class="form-group ">
                    <label for="category">Sub Category:</label>
                    <input type="text" disabled class="form-control"  id="category"
                        value="<?php echo $subcategory ?>" required>
                </div>

                <div class="form-group ">
                    <label for="category">Incident:</label>
                    <input type="text" disabled class="form-control"  id="category"
                        value="<?php echo $incident ?>" required>
                </div>

                <div class="form-group ">
                    <label for="category">Solution:</label>
                    <textarea type="text" disabled class="form-control"  id="category"
                        value=""><?php echo $answer ?></textarea>
                </div>

                <div class="form-group ">
                    <label for="category">Location:</label>
                    <select type="text" name="location" class="form-control"  id="category" 
                    required="required">
                  
                    <?php
                        $sql = "SELECT * FROM location";
                        $result = mysqli_query($connect, $sql);
                        foreach ($result as $row){
                            ?>
                                <option value="<?php echo $row['id']; ?>" ><?php echo $row['name'] ?></option>
                            <?php
                        }
                    ?>
                  </select>
                </div>

                <div class="form-group ">
                    <label for="category">Remark (Optional):</label>
                    <textarea   type="text"  class="form-control"  id="category"
                        name="remark"></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" name="create_log" class="btn btn-outline-primary" value="Create Log">
                </div>
            </form>


        </div>
    </div>
</div>



<?php
            include "footer.php";
        ?>