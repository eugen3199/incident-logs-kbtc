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
                            <div class="row">
                                <div class="col-12">
                                    <div class="shadow-sm px-3 pt-3 mb-3 card bg-black text-light">
                                        <h3>Service Catalog</h3>
                                        <hr>
                                        <nav aria-label="breadcrumb text-info">
                                            <ol class="breadcrumb bg-black">
                                                <li class="breadcrumb-item"><a class="text-info" href="index.php">Dashboard</a></li>
                                                <li class="breadcrumb-item">Category</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-md-12 px-5">
                                    <div class="shadow-sm px-3 pt-3 card bg-black text-light">
                                        <h6><u>All Categories</u></h6>
                                        <br>
                                        <table class="table table-dark table-striped table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
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
                                                    <td><a class="text-info" href="subcategory.php?id=<?php echo $value['id']; ?>"> <?php echo $value['category']; ?> <a></td>
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
                            <hr>
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