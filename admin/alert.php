<?php

    if(isset($_SESSION["success"])){
        ?>
<script>
    Swal.fire(
        'Success!',
        '<div class="text-light"><?php echo $_SESSION["success"]; ?></div>',
        'success'
    )
</script>
<?php
$_SESSION["success"] = null;
    }

    if(isset($_SESSION["error"])){
        ?>
<script>
    Swal.fire(
        'Failed',
        '<div class="text-light"><?php echo $_SESSION["error"]; ?></div>',
        'error'
    )
</script>
<?php
$_SESSION["error"] = null;
    }
    

?>

