
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
        success_message("Category Created Successfully",$_SERVER['HTTP_REFERER']);
       }else{
        error_message("Failed to Create Category",$_SERVER['HTTP_REFERER']);
       }
    }

        /* Category Delete */
    if(isset($_POST["category_delete"])){
        $id = htmlspecialchars($_POST["id"]);
        $sql = "UPDATE category SET status='0' WHERE id=$id";
        $result = mysqli_query($connect,$sql);
        if($result){
            $sql = "UPDATE sub_category SET status='0' WHERE cat_id=$id";
            $result = mysqli_query($connect,$sql);
            if($result){
                $sql = "UPDATE incident SET status='0' WHERE sub_cat_id='$id'";
                $result = mysqli_query($connect,$sql);
                if($result){
                    $sql = "UPDATE solution SET status='0' WHERE incident_id='$id'";
                $result = mysqli_query($connect,$sql);
                if($result){
                    success_message("Category Deleted Successfully",$_SERVER['HTTP_REFERER']);
                }else{
                error_message("Failed to Delete Category",$_SERVER['HTTP_REFERER']);
                }
            }
        }
    }
 }


    /* Category Edit */
    if(isset($_POST["category_edit"])){
        $id = htmlspecialchars($_POST["cat_id"]);
        $category = htmlspecialchars($_POST["cat_name"]);
        $sql = "UPDATE category SET category='$category' WHERE id=$id";
        $result = mysqli_query($connect,$sql);
        if($result){
         success_message("Category Updated Successfully",$_SERVER['HTTP_REFERER']);
        }else{
         error_message("Failed to Update Category",$_SERVER['HTTP_REFERER']);
        }
    }

    /* Sub Category Create */
    if(isset($_POST["sub_category_create"])){
       $category = htmlspecialchars($_POST["category"]);
       $subcategory = htmlspecialchars($_POST["subcategory"]);
       $sql = "INSERT INTO sub_category(cat_id,subcategory,status) VALUES ('$category','$subcategory','1')";
       $result = mysqli_query($connect,$sql);
       if($result){
        success_message("SubCategory Created Successfully",$_SERVER['HTTP_REFERER']);
       }else{
        error_message("Failed to Create SubCategory",$_SERVER['HTTP_REFERER']);
       }
    }

    /* Sub Category Delete*/
    if(isset($_POST["sub_category_delete"])){
        $id = $_POST["id"];
        $sql = "UPDATE sub_category SET status='0' WHERE id=$id";
        $result = mysqli_query($connect,$sql);
        if($result){
            $sql = "UPDATE incident SET status='0' WHERE sub_cat_id='$id'";
            $result = mysqli_query($connect,$sql);
            if($result){
                $sql = "UPDATE solution SET status='0' WHERE incident_id='$id'";
            $result = mysqli_query($connect,$sql);
            if($result){
               success_message("SubCategory Deleted Successfully",$_SERVER['HTTP_REFERER']);
            }else{
               error_message("Failed to Delete SubCategory",$_SERVER['HTTP_REFERER']);
            }
        }
   }
}

    /* Sub Category Edit */
    if(isset($_POST["subcategory_edit"])){
        $id = htmlspecialchars($_POST["subcat_id"]);
        $subcategory = htmlspecialchars($_POST["subcat_name"]);
        $sql = "UPDATE sub_category SET subcategory='$subcategory' WHERE id=$id";
        $result = mysqli_query($connect,$sql);
        if($result){
         success_message("Subcategory Updated Successfully",$_SERVER['HTTP_REFERER']);
        }else{
         error_message("Failed to Edit Subcategory",$_SERVER['HTTP_REFERER']);
        }
    }

    /* incident_create */
    if(isset($_POST['incident_create'])){
        $cat_id = htmlspecialchars($_POST['category']);
        $sub_id = htmlspecialchars($_POST['subcategory']);
        $incident = htmlspecialchars($_POST['incident']);
        $date = date("d-m-Y");
        $sql = "INSERT INTO incident(title,cat_id,sub_cat_id,create_at,status) VALUES ('$incident','$cat_id','$sub_id','$date',1)";
        $result = mysqli_query($connect,$sql);
        if($result){
            success_message("Incident Created Successfully",$_SERVER['HTTP_REFERER']);
           }else{
            error_message("Failed to Create Incident",$_SERVER['HTTP_REFERER']);
           }
    }

    /* Incident Edit */
    if(isset($_POST["incident_edit"])){
        $id = htmlspecialchars($_POST["id"]);
        $title = htmlspecialchars($_POST["title"]);
        $sql = "UPDATE incident SET title='$title' WHERE id=$id";
        $result = mysqli_query($connect,$sql);
        if($result){
         success_message("Incident Updated Successfully",$_SERVER['HTTP_REFERER']);
        }else{
         error_message("Failed to Edit Incident",$_SERVER['HTTP_REFERER']);
        }
    }

/* incident_delete */
    if(isset($_POST["incident_delete"])){
        $id = htmlspecialchars($_POST["id"]);
        $sql = "UPDATE incident SET status='0' WHERE id='$id'";
        $result = mysqli_query($connect,$sql);
        if($result){
            $sql = "UPDATE solution SET status='0' WHERE incident_id='$id'";
            $result = mysqli_query($connect,$sql);
            if($result){
                success_message("Incident Deleted Successfully",$_SERVER['HTTP_REFERER']);
            }else{
                error_message("Failed to Delete Incident",$_SERVER['HTTP_REFERER']);
            }
        }
    }

    /* solution_create */
    if(isset($_POST['solution_create'])){       
        $incident = htmlspecialchars($_POST['incident']);
        $solution = htmlspecialchars($_POST['solution']);
        $date = date("d-m-Y");
        $sql = "INSERT INTO solution(incident_id,answer,member_id,create_date,status) VALUES ($incident,'$solution',1,'$data',1)";
        $result = mysqli_query($connect, $sql);
        if($result){
            success_message("Solution Created Successfully",$_SERVER['HTTP_REFERER']);
           }else{
            error_message("Failed to Create Solution",$_SERVER['HTTP_REFERER']);
           }
    }

    /* Solution Edit */
    if(isset($_POST["solution_edit"])){
        $id = htmlspecialchars($_POST["id"]);
        $answer = htmlspecialchars($_POST["answer"]);
        $sql = "UPDATE solution SET answer='$answer' WHERE id=$id";
        $result = mysqli_query($connect,$sql);
        if($result){
         success_message("Solution Updated Successfully",$_SERVER['HTTP_REFERER']);
        }else{
         error_message("Failed to Edit Solution",$_SERVER['HTTP_REFERER']);
        }
    }
   
    /* solution_delete */
    if(isset($_POST["solution_delete"])){
        $id = htmlspecialchars($_POST["id"]);
        $sql = "UPDATE solution SET status='0' WHERE id='$id'";
        $result = mysqli_query($connect,$sql);
        if($result){
            success_message("Solution Deleted Successfully",$_SERVER['HTTP_REFERER']);
        }else{
            error_message("Failed to Delete Solution",$_SERVER['HTTP_REFERER']);
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
       $date = date("d-m-Y");
	date_default_timezone_set('Asia/Yangon');
	$_time = date("h:i:sa");
	$user = $_SESSION['username'];
       $sql = "INSERT INTO logs (cat_id,sub_cat_id,incident_id,solution_id, name, location,remark,create_at,_time) VALUES ($cat_id,$sub_id,$inc_id,$answer_id,'$user','$location','$remark','$date','$_time')";
       $result = mysqli_query($connect,$sql);
       if($result){
        success_message("Log Created Successfully","view_logs.php");
       }else{
        error_message("Failed to Create Log","view_logs.php");
       }
    }

    /* Log Delete */
    if(isset($_POST["logs_delete"])){
        $id = htmlspecialchars($_POST["id"]);
        $sql = "DELETE FROM logs WHERE id=$id;";
        $result = mysqli_query($connect,$sql);
        if($result){
         success_message("Log Deleted Successfully",$_SERVER['HTTP_REFERER']);
        }else{
         error_message("Failed to Delete Log",$_SERVER['HTTP_REFERER']);
        }
    }

    /* Log Date Edit */
    if(isset($_POST["date_edit"])){
        $id = htmlspecialchars($_POST["id"]);
        $date = date('d-m-Y', strtotime($_POST['date']));
        $sql = "UPDATE logs SET create_at='$date' WHERE id=$id";
        $result = mysqli_query($connect,$sql);
        if($result){
         success_message("Date Updated Success",$_SERVER['HTTP_REFERER']);
        }else{
         error_message("Failed to Update Date",$_SERVER['HTTP_REFERER']);
        }
    }

	/* Log Time Edit */
    if(isset($_POST["edit_time"])){
        $id = htmlspecialchars($_POST["id"]);
        $_time = date('h:i:sa', strtotime($_POST['_time']));
        $sql = "UPDATE logs SET _time='$_time' WHERE id=$id";
        $result = mysqli_query($connect,$sql);
        if($result){
         success_message("Time Updated Success",$_SERVER['HTTP_REFERER']);
        }else{
         error_message("Failed to Update Time",$_SERVER['HTTP_REFERER']);
        }
    }


    /* create_location */
    if(isset($_POST["create_location"])){
       $location = htmlspecialchars($_POST["location"]);
       $sql = "INSERT INTO location(name) VALUES ('$location')";
       $result = mysqli_query($connect,$sql);
       if($result){
        success_message("Location Created Successfully",$_SERVER['HTTP_REFERER']);
       }else{
        error_message("Failed to Create New Location",$_SERVER['HTTP_REFERER']);
       }
    }


    /* member_create */
    if(isset($_POST["member_create"])){
       $username = htmlspecialchars($_POST["username"]);
       $useremail= htmlspecialchars($_POST["useremail"]);
       $display_name= htmlspecialchars($_POST["display_name"]);
       $job_title= htmlspecialchars($_POST["job_title"]);
       $password = password_hash(htmlspecialchars($_POST["password"]),PASSWORD_DEFAULT);
       $role = htmlspecialchars($_POST["role"]);
       $date = date("d-m-Y");
       $sql = "SELECT * FROM member WHERE name='$username' OR email='$useremail'";
       $result = mysqli_query($connect, $sql);
       $row = mysqli_num_rows($result);
       if($row > 0){
        error_message("Member Already Exists ",$_SERVER['HTTP_REFERER']);
        die();
       }else{
        /* No Encrypt Here Encrypt Your Self */
       $sql2 = "INSERT INTO member(name,email,display_name,job_title,password,role,status,profile,position, department,phone,create_at) VALUES ('$username','$useremail','$display_name','$job_title','$password','$role',1,'-','-','-','-','$date')";
       $result2 = mysqli_query($connect,$sql2);
       if($result){
        success_message("Member Created Successfully",$_SERVER['HTTP_REFERER']);
       }else{
        error_message("Failed to Create New Member",$_SERVER['HTTP_REFERER']);
       }
	}
    }

	/* Account Delete */
    if(isset($_POST["account_delete"])){
        $id = htmlspecialchars($_POST["id"]);
        echo '<script>console.log('.$id.')</script>';
        $sql = "UPDATE member SET status=0 WHERE id=$id";
//      echo $sql;
//      hearder('Location: '.$sql);
//      exit;
        $result = mysqli_query($connect,$sql);
        //header('Location: '.$id);
        //exit;
        if($result){
         success_message("Member Deleted Successfully",$_SERVER['HTTP_REFERER']);
        }else{
         error_message("Failed to Delete Member",$_SERVER['HTTP_REFERER']);
        }
    }

    /* Member profile edit */
    if(isset($_POST['save'])){
      $id = htmlspecialchars($_POST["id"]);
      $display_name = htmlspecialchars($_POST["display_name"]);
      $job_title = htmlspecialchars($_POST["job_title"]);
      $email = htmlspecialchars($_POST["email"]);

      $sql = "UPDATE member SET display_name='$display_name',job_title='$job_title',email='$email' WHERE id=$id";
      $result = mysqli_query($connect,$sql);
      
      if($result){
        success_message("Profile Updated Successfully", $_SERVER['HTTP_REFERER']);
      }else{
        error_message("Failed to Update Profile",$_SERVER['HTTP_REFERER']);
      }
           
    }

    /* Member Password Change */
    if(isset($_POST['update'])){
        $id = htmlspecialchars($_POST["id"]);
        $old_password = htmlspecialchars($_POST['old_password']); 
        $new_password = htmlspecialchars($_POST['new_password']); 
        $confirm_password = htmlspecialchars($_POST['confirm_password']); 

        $sql = "SELECT * FROM member WHERE  id='$id'";
        $data = mysqli_query($connect,$sql);
        $result = mysqli_num_rows($data);
        if($result > 0){
            foreach($data as $key=>$value){
                if(password_verify($old_password,$value['password'])){
        
                    if($new_password == $confirm_password){
                        $password = password_hash(htmlspecialchars($new_password),PASSWORD_DEFAULT);
                        $sql = "UPDATE member SET password='$password' WHERE id=$id";
                        $result = mysqli_query($connect,$sql);
                        $_SESSION["admin_password"] = $new_password;
                        if($result){
                            success_message("Password Updated Successfully", $_SERVER['HTTP_REFERER']);
                        }else{
                            error_message("Failed to Update Password",$_SERVER['HTTP_REFERER']);

                        }
                    }
                    else{
                        error_message("Password Didn't Match", $_SERVER['HTTP_REFERER']);
                    }
                }
                else{
                    error_message("Password Didn't Match",$_SERVER['HTTP_REFERER']);
                }
            }
        }
    }

    /* Member Password reset */
    if(isset($_POST['password_reset'])){
        $id = htmlspecialchars($_POST["id"]);
        $password = password_hash('12345',PASSWORD_DEFAULT);
        $sql = "UPDATE member SET password='$password' WHERE id=$id";
        $result = mysqli_query($connect,$sql);
        if($result){
            success_message("Password Reset Successful. The Password is - 12345", $_SERVER['HTTP_REFERER']);
        }else{
            error_message("Failed to Reset Password",$_SERVER['HTTP_REFERER']);
        }
    }

    // Member Role Change
    if(isset($_POST['role_edit'])){
        $id = htmlspecialchars($_POST["id"]);
        $role = htmlspecialchars($_POST["role"]);
        $sql = "UPDATE member SET role='$role' WHERE id=$id";
        $result = mysqli_query($connect,$sql);
        if($result){
            success_message("Role changed successfully", $_SERVER['HTTP_REFERER']);
        }else{
            error_message("Failed to change role.",$_SERVER['HTTP_REFERER']);
        }
    }
  ?>
