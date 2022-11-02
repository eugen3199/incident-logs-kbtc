<?php
session_start();
?>
<?php
    // $connect = mysqli_connect("kmh-mysql-db.mysql.database.azure.com","itadmin","Kbtc321!@#","ims_db");
    $connect = mysqli_connect("localhost","admin","passwordformoodledude","cp473227_laravel2");
    if(!$connect){
        ?>
        <h2 style="color:red">Database Connection Error</h2>
	<script>console.log('db error');</script>
        <?php
	}
?>
<?php
if(isset($_POST['login'])){
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    
    $sql = "SELECT * FROM member WHERE  name='$username' AND status=1";
    $data = mysqli_query($connect,$sql);
    $result = mysqli_num_rows($data);
    if($result > 0){
      foreach($data as $key=>$value){
        if(password_verify($password,$value['password'])){        
          $role = $value['role'];
          if($role == "admin"){
              $_SESSION["role"] = $role;
              $_SESSION["admin_username"] = $username;
              $_SESSION["admin_password"] = $password;
              $_SESSION["username"] = $username;
              $_SESSION["FullName"] = $value['display_name'];
              $_SESSION['id'] = $value['id'];
              $_SESSION['cpage'] = 'home';
              header("location:admin");
              exit;
          }else{
            $_SESSION["role"] = $role;
            $_SESSION["user_username"] = $username;
            $_SESSION["user_password"] = $password;
            $_SESSION["username"] = $username;
            $_SESSION["FullName"] = $value['display_name'];
            $_SESSION['id'] = $value['id'];
            $_SESSION['cpage'] = 'home';
            header("location:user");
            exit;
          }
        }
      }
    }
    header("location: /");
  }
?>



