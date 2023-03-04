    
<?php
include_once "controller/attendanceController.php";
include_once "controller/leaveController.php";
include_once "controller/employeecontroller.php";


$attendanceController = new AttendanceController();
$attendanceResult = $attendanceController->getAllAttendances();

$employeeController = new EmployeeController();
$empResults = $employeeController->getEmployees();



include_once "layouts/header.php";
//include_once "includes/db.php";

//var_dump($attendanceResult);
$month_startDay = date("Y-m-d", mktime(0, 0, 0, date("m", strtotime("-1 month")), 1, date("Y", strtotime("-1 month"))));

$month_endDay = date("Y-m-d", mktime(0, 0, 0, date("m", strtotime("-1 month")), date("t", strtotime("-1 month")), date("Y", strtotime("-1 month"))));
//echo $month_startDay;
//echo $month_endDay;
//echo "<br>";

$first_day_this_month = date('Y-m-01');
$last_day_this_month  = date('Y-m-t');
//echo $first_day_this_month;
//echo $last_day_this_month;
//echo "<br>";
$day = date('t');
$dayOfPreviousMonth = date("t", mktime(0,0,0, date("n") - 1));
//echo "<br>**************".$dayOfPreviousMonth;

//echo $day;
$days=[];
$count=1;
for($i=0;$i<$dayOfPreviousMonth;$i++){
    $days[$i]=$count;
    $count++;
}

//var_dump ($days);
 $NoOfEmpsInAttendance[]="";
 $noOfdays= 0;
 for($i= $month_startDay;$i<=$month_endDay;$i++){
    //echo $i;
    $result = $attendanceController->getNoOfEmpsByDates($i);
    
    $NoOfEmpsInAttendance[$noOfdays] = $result;
    $noOfdays++;
 }

 $sumOfEmpsAttendance = $attendanceController->sumOfEmpsByDates($month_startDay,$month_endDay);
 //var_dump($sumOfEmpsAttendance);
 $sumOfEmpsLeave = $attendanceController->sumOfEmpsLeavesByDates($month_startDay,$month_endDay);
 //var_dump($sumOfEmpsLeave);
 //echo "no of emps";
//var_dump($NoOfEmps);
$empResWithoutLeave[]="";
$nos=0;
$totalSum=0;
for($i= $month_startDay;$i<=$month_endDay;$i++){
    //echo $i;
    $withoutLeaves = $attendanceController->getAbsenceWithoutLeaves($i);
    //echo "without leaves".$withoutLeaves[0]['sum_of_emps'];
   //$empResWithoutLeave[$nos]= $withoutLeaves[$nos]['sum_of_emps'];
   $totalSum+=$withoutLeaves[0]['sum_of_emps'];
   //echo '<br>';
   $nos++;
}
//echo "********".$totalSum;
//var_dump($empResWithoutLeave);

$noOfEmpsAttendanceJson = json_encode($NoOfEmpsInAttendance);
$attendanceResultJson = json_encode($attendanceResult);
$sumOfEmpsAttendanceJson = json_encode($sumOfEmpsAttendance);
$sumOfEmpsLeaveJson = json_encode($sumOfEmpsLeave);
$totalSumJson = json_encode($totalSum);
$daysJson = json_encode($days);
//print_r($sumOfEmpsAttendanceJson);
//print_r($daysJson);
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
        <h4>Reports for Employees</h4>
        <div class="row mt-2 mb-3">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Monthly Employees' Attendance Overview</h6>
                                <!-- <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div> -->
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                            </div>
                        </div>
                </div>
            <div class="col-md-4">
                <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Employees' Report</h6>
                                <!-- <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div> -->
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> Attendance
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-warning"></i> Absence With Leave
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-danger"></i> Absence Without Leave
                                    </span>
                                </div>
                            </div>
                </div>
            </div>
        </div>
        

        <footer>
            
        </footer>
    </div>
</div>
<?php
include_once "layouts/footer.php";
?>
