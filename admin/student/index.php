<?php
session_start();

require_once('../layout/connection.php');

$sql = "SELECT * FROM student";
$result = mysqli_query($call, $sql);

if ( ! $result) {
    die("Error : " . mysqli_error($call));
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
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">All Students</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Eamil</th>
                                                <th>Marks</th>
                                                <th>Age</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Eamil</th>
                                                <th>Marks</th>
                                                <th>Age</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                            if(mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {

                                            ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?> </td>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td>0</td>
                                                <td>0</td>  
                                                <td>
                                                    <!-- <a href="" class="btn btn-warning">Show</a> -->
                                                    <a href="" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>

                                            <?php
                                                }
                                            }else{
                                                echo "No Data";
                                            }

                                            ?>
                                        </tbody>
                                    </table>

                                </div>
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