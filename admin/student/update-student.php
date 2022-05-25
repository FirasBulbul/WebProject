<?php
session_start();

require_once('../layout/connection.php');

if(!empty($_GET['id'])){

    $id = $_GET['id'];

    $sql = "SELECT * FROM student where id = $id";
    $result = mysqli_query($call, $sql);
    $data = mysqli_fetch_assoc($result);

    if (!$result) {
        die("Error : " . mysqli_error($call));
    }

    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gpa = $_POST['gpa'];

        $sql = "update student set name = '$name' , email = '$email' , password = '$password' , gpa = '$gpa' where id = $id";
        $result = mysqli_query($call,$sql);
        if($result){
            header('Location:index.php');
        }else{
            die("Error Update data ");
        }
    }
}

    

?>
<!DOCTYPE html>
<html lang="en">
<?php
require_once('../layout/header.php');
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include_once('../layout/sidebar.php')
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include_once('../layout/topbar.php')
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Students</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="display: flex;justify-content: space-between;">
                            <h6 class="m-0 font-weight-bold text-primary">Update Student</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name .." value="<?php echo $data ['name']?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?php echo $data ['email']?>">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password </label>
                                    <input type="password" class="form-control" id="password" placeholder="Your Password" name="password" value="<?php echo $data ['password']?>">
                                </div>

                                <div class="mb-3">
                                    <label for="gpa" class="form-label">GPA</label>
                                    <input type="text" class="form-control" id="gpa" placeholder="gpa ..." name="gpa" value="<?php echo $data ['gpa']?>">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" name="send">Update </button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>

        <?php
        include_once('../layout/footer.php')
        ?>

</body>

</html>