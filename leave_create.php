    
<?php
include_once "controller/leaveController.php";
include_once "controller/employeecontroller.php";
include_once "controller/leaveTypeController.php";

$empController = new EmployeeController();
$leaveTypeController = new leaveTypeController();

$empResults = $empController->getEmployees();
$leaveTypeResluts = $leaveTypeController->getallLeaveTypes();

$leaveController = new LeaveController();
//var_dump($empResults);

$error_status = false;
if(isset($_POST['add'])){
    
    if(!empty($_POST['eName'])){
        $name = $_POST['eName'];
    }else{
        $error_status = true;
    }
    if(!empty($_POST['leaveType'])){
        $leaveType = $_POST['leaveType'];
    }else{
        $error_status = true;
    }

   if(!empty($_POST['sDate'])){
        $startDate = $_POST['sDate'];
   }else{
        $sdate_error = "please choose start date";
        $error_status = true;
   }

   if(!empty($_POST['sDate'])){
        $endDate = $_POST['sDate'];
    }else{
        $edate_error = "please choose start date";
        $error_status = true;
    }
    

    if($error_status==false){
        $result = $leaveController->addLeaves($name,$leaveType,$startDate,$endDate);
        header("location:leave_index.php");
    }

    
}
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
                <a href="leave_index.php" class="btn btn-outline-success">Back to All Leaves</a>
            </div>
        </div>
        <div class="mt-5">
            <div class="row mb-5">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                   <form action="#" method="post">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <select name="eName" id="" class="form-control">
                                <?php
                                    foreach($empResults as $empRes){
                                        echo "<option value=".$empRes['id'].">";
                                        echo $empRes['emp_name'];
                                        echo "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="leaveType">Leave Type</label>
                            
                            <select name="leaveType" id="" class="form-control">
                                <?php
                                    foreach($leaveTypeResluts as $result){
                                        echo "<option value = ".$result['id'].">";
                                        echo $result['type'];
                                        echo "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date">Start Date</label>
                            <input type="date" name="sDate" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="date">End Date</label>
                            <input type="date" name="eDate" id="" class="form-control">
                        </div>
                        <div class="mb-3 text-center">
                            <button class="btn btn-outline-success" name="add">Add</button>
                        </div>
                   </form>
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
