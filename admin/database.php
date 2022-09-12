<?php
    // $connect = mysqli_connect("kmh-mysql-db.mysql.database.azure.com","itadmin","Kbtc321!@#","ims_db");
    $connect = mysqli_connect("localhost","admin","passwordformoodledude","cp473227_laravel2");
    if(!$connect){
        ?>
        <h2 style="color:red">Database Connection Error</h2>
        <?php
    }
?>
