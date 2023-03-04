    
<?php
include_once "controller/attendanceController.php";
include_once "controller/employeecontroller.php";


$attendanceController = new AttendanceController();
$attendanceResult = $attendanceController->getAllAttendances();

$empController = new employeecontroller();
$empResults = $empController->getEmployees();

$todayDate = date("Y/m/d");
echo $todayDate;
echo date('m');
echo date('t');

$withoutLeaves = $attendanceController->getAbsenceWithoutLeaves1($todayDate);
//var_dump($withoutLeaves);

include_once "layouts/header.php";
//include_once "includes/db.php";

//var_dump($attendanceResult);


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
        <h4>Employee Absence Without Leave</h4>

        <div class="row mb-3 mt-3">
            
            <div class="col-md-3">
                <!-- <label for="">Employee Names</label> -->
                <select name="emps" id="eName" class="form-control">
                    <option value="all">All</option>
                    <?php
                        foreach($empResults as $empRes){
                            echo "<option value = ".$empRes['id'].">";
                            echo $empRes['emp_name'];
                            echo "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <input type="date" name="sDate" id="sDate" class="form-control">
            </div>
            <div class="col-md-3">
                <input type="date" name="eDate" id="eDate" class="form-control">
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-success absenceSearchWithName">Search With Name</button>
            </div>
            
        </div>
        <!-- <div class="row mb-3">
            <div class="col-md-3">
                <label for="">Start Date</label>
                <input type="date" name="startDate" id="startDate" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="">End Date</label>
                <input type="date" name="endDate" id="endDate" class="form-control">
            </div>
            
            <div class="col-md-3">
                <button class="btn btn-outline-success" id="searchWihoutLeave">Search With Dates</button>
            </div>
        </div> -->
        <div class="row mb-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count=1;
                    foreach($withoutLeaves as $withoutLeave){
                        echo "<tr>";
                        echo "<td>".$count."</td>";
                        echo "<td>".$withoutLeave['emp_name']."</td>";
                        echo "<td>Absent</td>";
                        echo "</tr>";
                        $count++;
                    }
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
