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
                                $id = htmlspecialchars($_GET["id"]) ;
                                $sql = "SELECT * FROM category WHERE id=$id";
                                $result = mysqli_query($connect,$sql);
                                if($result){
                                    foreach($result as $row){
                                        $id = $row["id"];
                                        $name = $row["category"];
                                        ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="shadow-sm px-3 pt-3 mb-3 card bg-black text-light">
                                        <h3>Service Catalog</h3>
                                        <hr>
                                        <nav aria-label="breadcrumb text-info">
                                            <ol class="breadcrumb bg-black">
                                                <li class="breadcrumb-item"><a class="text-info" href="index.php">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a class="text-info" href="category.php">Category</a></li>
                                                <li class="breadcrumb-item text-light" aria-current="page"><?php echo $name; ?></li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-md-12 px-5">
                                    <div class="shadow-sm p-3 card bg-black text-light">
                                        <h6><u>All Sub-Categories</u></h6>
                                        <br>
                                        <table class="table table-dark table-striped table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>SubCategory</th>
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
                                                        <a class="text-info" href="incident.php?sub_id=<?php echo $value['id'] ?>&&cat_id=<?php echo $cat ?>">
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
                            </div>
                            <?php
                                    }
                                }

                            ?>
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