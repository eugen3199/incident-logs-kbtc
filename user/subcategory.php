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