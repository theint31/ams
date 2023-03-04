<?php
include_once 'controller/attendanceController.php';
$id = $_GET['id'];
//echo $id;
$attendanceController = new AttendanceController();
$result = $attendanceController->viewAbsenceWithLeave($id);
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
        <div class="row mb-3 mt-3">
            <div class="col-md-4">
                <a href="attendance_absent.php" class="btn btn-outline-success">Back to all Employees Absence</a>
            </div>
        </div>
        
        <div class="row mb-3">
            <table class="table">
                <thead>
                    <tr>
                        
                        <th>Name</th>
                        <th>StartDate</th>
                        <th>EndDate</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php
                     echo "<tr>";
                     echo "<td>".$result['emp_name']."</td>";
                     echo "<td>".$result['start_date']."</td>";
                     echo "<td>".$result['end_date']."</td>";
                     echo "<td>Absent</td>";
                     echo "</tr>";
                    ?>
                </tbody>
            </table>
        </div>
        

        <footer>
            
        </footer>
    </div>
</div>
<?php
include_once "layouts/footer.php";
?>
