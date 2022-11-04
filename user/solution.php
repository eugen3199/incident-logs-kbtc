<?php
    include "head.php";
    include "nav.php";
    include "alert.php";
    $_SESSION['cpage'] = "catalog";
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
                                <div class="col-md-12">
                                    <div class="shadow-sm px-3 pt-3 mb-3 card bg-black text-light">
                                        <h3>Service Catalog</h3>
                                        <hr>
                                        <nav aria-label="breadcrumb text-info">
                                            <ol class="breadcrumb bg-black">
                                                <li class="breadcrumb-item"><a class="text-info" href="index.php">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a class="text-info" href="category.php">Category</a></li>
                                                <li class="breadcrumb-item"><a class="text-info" href="subcategory.php?id=<?php echo $cat_id ?>"><?php echo $name ?></a></li>
                                                <li class="breadcrumb-item"><a class="text-info" href="incident.php?sub_id=<?php echo $sub_id ?>&&cat_id=<?php echo $cat_id ?>"><?php echo $subcategory ?></a></li>
                                                <li class="breadcrumb-item text-light" aria-current="page"><?php echo $title ?></li>
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
                                <div class="col-md-4">
                                    <div class="shadow-sm p-3 pt-3 mb-3 card bg-black text-light">
                                        <div class="form-group">
                                            <h6><u>Create New Solution</u></h6>
                                        </div>
                                        <button class="btn btn-info"  data-toggle="modal" data-target="#addSolution"> Create New Solution </button>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="shadow-sm px-3 pt-3 mb-3 card bg-black text-light">
                                        <h6><u>All Solutions</u></h6>
                                        <br>
                                        <table class="table table-dark table-striped table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Solution</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                        $sql = "SELECT * FROM solution WHERE incident_id='$incident_id' AND status=1;";
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
                                                        <p  data-toggle="modal" data-target="#detail<?php echo $value['id']; ?>" ><a class="text-info" href="#">Solution <?php echo $number; ?></a></p>
                                                    </td>
                                                </tr>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
            include "footer.php";
        ?>
