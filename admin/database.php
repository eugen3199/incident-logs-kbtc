<?php
   // $connect = mysqli_connect("localhost","admin","passwordformoodledude","cp473227_laravel2");
    $connect = mysqli_connect("localhost","yuuji","3ug3n32c4r13T//","cp473227_laravel2");
    if(!$connect){
        ?>
        <h2 style="color:red">Database Connection Error</h2>
        <?php
    }
?>
