    
<?php
include_once "controller/leaveController.php";
//include_once "controller/empcontroller.php";
$leaveController = new LeaveController();
$getLeaveResults = $leaveController->getAllLeaves();



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

        <div class="row mb-5 mt-5">
            <div class="col-md-4">
                <a href="leave_create.php" class="btn btn-outline-success">Add New Leaves</a>
            </div>
        </div>
        <div class="mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Employee Name</th>
                        <th>Leave Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $count =1;
                        foreach($getLeaveResults as $results){
                            echo "<tr>";
                            echo "<td>".$count."</td>";
                            echo "<td>".$results['emp_name']."</td>";
                            echo "<td>".$results['type']."</td>";
                            echo "<td>".$results['start_date']."</td>";
                            echo "<td>".$results['end_date']."</td>";
                            echo "<td lid=".$results['id'].">
                                <a class='me-4 btn btn-outline-success' href=leave_view.php?id=".$results['id']."><i class='fa-solid fa-eye'></i></a>
                                <a class='me-4 btn btn-outline-primary' href=leave_edit.php?id=".$results['id']."><i class='fa-solid fa-pen'></i></a>
                                <button class=' me-2 btn btn-outline-danger leaveDelete'><i class='fa-solid fa-trash-can'></i></button>
                                
                            </td>";
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
