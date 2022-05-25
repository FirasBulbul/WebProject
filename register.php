<?php
    session_start();
    require_once 'db_config.php';

    if(!empty($_SESSION)){
      if($_SESSION['logined_in'] == 'true'){
        header('Location:admin/student/index.php');
      }
    }


    if(empty($_GET['type'])){
      header('Location:register.php?type=student');

    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){

            $name = $_POST['fname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            
            
            $errors = [];

            
            if(empty($name)){
                $errors['fname'] = "Full name is empty";
            }
            if(empty($email)){
              $errors['email'] = "Email is empty";
            }
            if(empty($password)){
                $errors['password'] = "Password is empty";
            }
            if(strlen($password) < 6) {
              $errors['password'] = "Password must be minimum of 6 characters";
            }
            if($password != $cpassword) {
              $errors['cpassword'] = "Password and Confirm Password doesn't match";
            } 

            if(empty($errors)){
                if(!empty($_GET['type'])){
                  $type = $_GET['type'];
                  if($type == "admin"){
                      // query admin

                          $query = "INSERT INTO teacher(name,email,password)
                          VALUES('$name', '$email','$password')";

                          $result = mysqli_query($con, $query);
                          
                          if($result){
                              $_SESSION['name'] = $name;
                              $_SESSION['email'] = $email;
                              $_SESSION['logined_in'] = 'true';
                              $_SESSION['type'] = 'admin';

                              header('location:admin/student/index.php');
                          }else{
                              die('Error : ' . mysqli_error($con));
                          }


                  }else if($type == "student"){
                    // student

                        $query = "INSERT INTO student(name,email,password)
                        VALUES('$name', '$email','$password')";

                        $result = mysqli_query($con, $query);
                        
                        if($result){
                            $_SESSION['name'] = $name;
                            $_SESSION['email'] = $email;
                            $_SESSION['logined_in'] = 'true';
                            $_SESSION['type'] = 'student';


                            header('location:admin/student/index.php');
                        }else{
                            die('Error : ' . mysqli_error($con));
                        }


                  }else{
                    die("Type is inValide");
                  }
                }
            }
        }


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>


<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" action="" method="post">
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user"
                     id="exampleFirstName" name="fname" placeholder="Full Name">
                     <?php
                        isset($errors['fname']) ? print("<div class='text-center' style='color:red'>". $errors['fname'] ."</div>") : '';
                      ?>
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                  <?php
                      isset($errors['email']) ? print("<div class='text-center' style='color:red'>". $errors['email'] ."</div>") : '';
                    ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    <?php
                        isset($errors['password']) ? print("<div class='text-center' style='color:red'>". $errors['password'] ."</div>") : '';
                      ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="cpassword" 
                    class="form-control form-control-user" placeholder="Repeat Password">
                    <?php
                        isset($errors['cpassword']) ? print("<div class='text-center' style='color:red'>". $errors['cpassword'] ."</div>") : '';
                      ?>
                  </div>
                </div>
                <button class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>      
              </form>
              <div class="text-center">
                <a class="small" href="index.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
