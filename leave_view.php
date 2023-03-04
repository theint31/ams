    
<?php
include_once "controller/leaveController.php";
//include_once "controller/empController.php";
$id = $_GET['id'];
$leaveController = new LeaveController();
$getLeaveResults = $leaveController->getLeaves($id);

include_once "layouts/header.php";
include_once "includes/db.php";
//var_dump($getLeaveResults);

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
            <div class="mb-3">
                <a class="btn btn-outline-success" href="leave_index.php">Back to All Leaves</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <!-- <th>No</th> -->
                        <th>Employee Name</th>
                        <th>Leave Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //$count =1;
                        //foreach($getLeaveResults as $results){
                            echo "<tr>";
                            //echo "<td>".$count."</td>";
                            echo "<td>".$getLeaveResults['emp_name']."</td>";
                            echo "<td>".$getLeaveResults['type']."</td>";
                            echo "<td>".$getLeaveResults['start_date']."</td>";
                            echo "<td>".$getLeaveResults['end_date']."</td>";
                            echo "</tr>";
                           // $count++;
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
