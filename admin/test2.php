<?php
	$sdate = htmlspecialchars($_POST['start_date']);
    $edate = htmlspecialchars($_POST['end_date']);
    $category = htmlspecialchars($_POST['category']);
    $subcat = htmlspecialchars($_POST['subcat']);
    
	echo "$sdate, $edate, $category, $subcat";
?>
