
<?php
    session_start();
    include "database.php";

    /* Success message */
function success_message($data,$location){
    $_SESSION["success"] = $data;
    header("location:$location");
}

/* Error message */
function error_message($data,$location){
    $_SESSION["error"] = $data;
    header("location:$location");
    
}
/* Image Filter */
function image_filter($image,$location){
    $name = $image["name"];
    $size = $image["size"];
    $error = $image["error"];
    $tmp_name = $image["tmp_name"];
    $type = $image["type"];
    $image_upload_location = "uploads/";
    global $unique_file_name ;
    $unique_file_name = rand(0,100) . "_" . $name;

    if($error == 0){
        if($size < 2000000){
            if($type == "image/png" || $type=="image/jpg" || $type =="image/jpeg" || $type == "image/gif"){
                move_uploaded_file($tmp_name , $image_upload_location . $unique_file_name);
                return $unique_file_name;
            }else{
                error_message("We only accept jpg png and gif",$location);
                die();
            }
        }else{
            error_message("File is too big",$location);
            die();
        }
    }else{
        error_message("File has error" , $location);
        die();
    }

}


    /* Create Category */
    if(isset($_POST["category_create"])){
       $category = htmlspecialchars($_POST["category"]);
       $sql = "INSERT INTO category(category,status) VALUES ('$category',1)";
       $result = mysqli_query($connect,$sql);
       if($result){
        success_message("Create Category Success",$_SERVER['HTTP_REFERER']);
       }else{
        error_message("Create Category Fail",$_SERVER['HTTP_REFERER']);
       }
    }

    /* incident_create */
    if(isset($_POST['incident_create'])){
        $cat_id = htmlspecialchars($_POST['category']);
        $sub_id = htmlspecialchars($_POST['subcategory']);
        $incident = htmlspecialchars($_POST['incident']);
        $date = date("Y-m-d");
        $sql = "INSERT INTO incident(title,cat_id,sub_cat_id,create_at,status) VALUES ('$incident','$cat_id','$sub_id','$date',1)";
        $result = mysqli_query($connect,$sql);
        if($result){
            success_message("Create Incident Success",$_SERVER['HTTP_REFERER']);
           }else{
            error_message("Create Incident  Fail",$_SERVER['HTTP_REFERER']);
           }
    }

    /* solution_create */
    if(isset($_POST['solution_create'])){

       
        $incident = htmlspecialchars($_POST['incident']);
        $solution = htmlspecialchars($_POST['solution']);
        $date = date("Y-m-d");
        $sql = "INSERT INTO solution(incident_id,answer,member_id,create_date,status) VALUES ($incident,'$solution',1,'$data',1)";
        $result = mysqli_query($connect, $sql);
        if($result){
            success_message("Create Solution Success",$_SERVER['HTTP_REFERER']);
           }else{
            error_message("Create Solution  Fail",$_SERVER['HTTP_REFERER']);
           }
    }

    /* create_log */
    if(isset($_POST['create_log'])){
       $cat_id = htmlspecialchars($_POST["cat_id"]);
       $sub_id = htmlspecialchars($_POST["sub_id"]);
       $inc_id = htmlspecialchars($_POST["inc_id"]);
       $answer_id = htmlspecialchars($_POST["answer_id"]);
       $location  = htmlspecialchars($_POST["location"]);
       $remark = htmlspecialchars($_POST["remark"]);
       $date = date("Y-m-d");
    date_default_timezone_set('Asia/Yangon');
    $_time = date("h:i:sa");
    $user = $_SESSION['username'];
       $sql = "INSERT INTO logs (cat_id,sub_cat_id,incident_id,solution_id, name, location,remark,create_at,_time) VALUES ($cat_id,$sub_id,$inc_id,$answer_id,'$user','$location','$remark','$date','$_time')";
       $result = mysqli_query($connect,$sql);
       if($result){
        success_message("Create Logs Success","view_logs.php");
       }else{
        error_message("Create Logs  Fail","view_logs.php");
       }
    }

    /* Log Date Edit */
    if(isset($_POST["date_edit"])){
        $id = htmlspecialchars($_POST["id"]);
        $date = date('Y-m-d', strtotime($_POST['date']));
        $sql = "UPDATE logs SET create_at='$date' WHERE id=$id";
        $result = mysqli_query($connect,$sql);
        if($result){
         success_message("Edit Solution Success",$_SERVER['HTTP_REFERER']);
        }else{
         error_message("Edit Solution Fail",$_SERVER['HTTP_REFERER']);
        }
    }

    /* Log Time Edit */
    if(isset($_POST["edit_time"])){
        $id = htmlspecialchars($_POST["id"]);
        $_time = date('h:i:sa', strtotime($_POST['_time']));
        $sql = "UPDATE logs SET _time='$_time' WHERE id=$id";
        $result = mysqli_query($connect,$sql);
        if($result){
         success_message("Edit Solution Success",$_SERVER['HTTP_REFERER']);
        }else{
         error_message("Edit Solution Fail",$_SERVER['HTTP_REFERER']);
        }
    }
?>
