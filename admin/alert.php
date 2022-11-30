<?php

    if(isset($_SESSION["success"])){
        ?>
<script>
    Swal.fire(
        'Success!',
        '<?php echo $_SESSION["success"]; ?>',
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
        '<?php echo $_SESSION["error"]; ?>',
        'error'
    )
</script>
<?php
$_SESSION["error"] = null;
    }
    

?>

