    
<?php
include_once "controller/attendanceController.php";
$id = $_GET['id'];

$attendanceController = new AttendanceController();
$attendanceResult = $attendanceController->getAttendance($id);



include_once "layouts/header.php";
//include_once "includes/db.php";
echo $id;

var_dump($attendanceResult);


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
        <div class="mt-5">
            <a class="btn btn-outline-success mb-3" href = "attendance_index.php">Back to All Attendance List</a>

        <table class="table">
            <thead>
                <tr class = 'text-center'>
                   
                    <th>Employee Name</th>
                    <th>Date</th>
                    <th>Shift Type</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php
                //foreach($attendanceResult as $attendance){
                    echo "<tr class='text-center'>";
                    echo "<td>".$attendanceResult['emp_name']."</td>";
                    echo "<td>".$attendanceResult['date']."</td>";
                    echo "<td>".$attendanceResult['shift_name']."</td>";
                    
                    echo "</tr>";
                //}
               
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
