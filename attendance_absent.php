    
<?php
include_once "controller/attendanceController.php";

$attendanceController = new AttendanceController();
$absenceWithLeave = $attendanceController->getAbsenceWithLeave();


//var_dump($absenceWithLeave);
include_once "layouts/header.php";
//include_once "includes/db.php";




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
        <div class="row mt-3 mb-3">
            <div class="col-md-4">
                <input type="date" name="startDate" id="startDate" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="date" name="endDate" id="endDate" class="form-control">
            </div>
            <div class="col-md-4 text-center">
                <button class="btn btn-outline-success" id="searchAbsentWithLeave">Search Absence By Dates</button>
            </div>
        </div>
        <div class="row mb-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>StartDate</th>
                        <th>EndDate</th>
                        <th>Status</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php
                    $count=1;
                        foreach($absenceWithLeave as $leaves){
                            echo "<tr>";
                            echo "<td>".$count."</td>";
                            echo "<td>".$leaves['emp_name']."</td>";
                            echo "<td>".$leaves['start_date']."</td>";
                            echo "<td>".$leaves['end_date']."</td>";
                            echo "<td>Absent</td>";
                            // echo "<td aid=".$leaves['id'].">
                            //         <a class='me-4 btn btn-outline-success' href=absentWithLeave_view.php?id=".$leaves['id']."><i class='fa-solid fa-eye'></i></a>
                            //         <a class='me-4 btn btn-outline-primary' href=absentWithLeave_edit.php?id=".$leaves['id']."><i class='fa-solid fa-pen'></i></a>
                            //         <button class=' me-2 btn btn-outline-danger absentWithLeaveDelete' ><i class='fa-solid fa-trash-can'></i></button>
                                    
                            //     </td>";
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
