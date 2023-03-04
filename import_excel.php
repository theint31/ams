<?php
include_once 'controller/attendanceController.php';


$attendanceController = new AttendanceController();

//var_dump($result);
include_once "layouts/header.php";
?>
<div id="app">
        <?php
         include_once "layouts/sidebar.php";
        ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <h1>Employee Attendance Management System</h1>
        <h4>Employee Absence With Leave</h4>
        <div class="row mt-5">
            <h1>Excel Upload</h1>

            <form method="POST" action="excelUpload.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                        
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <button type="submit" name="Submit" class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </div>
                
                
                
                
            </form>
        </div>
        

        <footer>
            
        </footer>
    </div>
</div>
<?php
include_once "layouts/footer.php";
?>
