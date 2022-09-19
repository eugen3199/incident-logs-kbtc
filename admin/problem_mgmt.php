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
            <!-- Contents -->
            
            <!-- End Contents -->
        </div>
    </div>
</div>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    function changedateAction(){

    }
</script>
<?php
include "footer.php";
?>