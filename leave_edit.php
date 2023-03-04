    
<?php
include_once "controller/leaveController.php";
include_once "controller/employeecontroller.php";
include_once "controller/leaveTypeController.php";
$id = $_GET['id'];
$leaveController = new LeaveController();
$leave_results = $leaveController->getLeaves($id);


$empController = new EmployeeController();
$emp_results = $empController->getEmployees();


$leaveTypeController = new leaveTypeController();
$leave_type_results = $leaveTypeController->getallLeaveTypes();
//var_dump($emp_results);
echo $id;
var_dump($leave_results);


include_once "layouts/header.php";
include_once "includes/db.php";
$error_status = false;
if(isset($_POST['save'])){
    if(!empty($_POST['empName'])){
        $empName = $_POST['empName'];
    }else{
        $empName_error = "please enter employee name";
        $error_status = true;
    }
    if(!empty($_POST['leaveType'])){
        $leaveType = $_POST['leaveType'];
    }else{
        $error_status = true;
        $leaveType_error = "please enter leave type";
    }
    if(!empty($_POST['start_date'])){
        $start_date = $_POST['start_date'];
    }else{
        $error_status = true;
        $start_date_error= "please enter start date";
    }
    if(!empty($_POST['end_date'])){
        $end_date = $_POST['end_date'];
    }else{
        $error_status = true;
        $end_date_error = "plese enter end date";
    }
    if($error_status==false){
        $result = $leaveController->updateLeaves($empName,$leaveType,$start_date,$end_date,$id);
        header("location:leave_index.php");
    }
}


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
            
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <form action="#" method="post">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="empName">Employee Name</label>
                            </div>
                            <!-- <div class="col-md-9">
                                <input type="text" name="empName" id=""  class="form-control" value = "<?php foreach($leave_results as $results){ echo $results['emp_name'];} ?>">
                            </div> -->
                            <div class="col-md-9">

                                <select name="empName" id="" class="form-control">
                                    <?php
                                        
                                        foreach($emp_results as $empRes){
                                            echo "<option value = ".$empRes['id'];
                                            if($empRes['id']==$leave_results['emp_id'])
                                                {echo " selected";}
                                            
                                            echo ">";
                                            echo $empRes['emp_name'];
                                            echo "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="">Leave Type</label>
                            </div>
                            <!-- <div class="col-md-9">
                                <input type="text" name="leaveType" id="" class="form-control" value="<?php foreach($leave_results as $results){echo $results['type'];} ?>">
                            </div> -->
                            <div class="col-md-9">

                                <select name="leaveType" id="" class="form-control">
                                    <?php
                                        /*foreach($leave_type_results as $leaveTypeRes){
                                            echo "<option value= ".$leaveTypeRes['id'].">";
                                            echo $leaveTypeRes['type'];
                                            echo "</option>";
                                        }*/
                                        foreach($leave_type_results as $result){
                                            echo "<option value = ".$result['id'];
                                            if($result['id']==$leave_results['leave_type_id'])
                                                {echo " selected";}
                                            
                                            echo ">";
                                            echo $result['type'];
                                            echo "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="">Start Date</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" name="start_date" id="" class="form-control" value="<?php  ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="">End Date</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" name="end_date" id="" class="form-control" value="<?php  ?>">
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-success" name= "save">Save</button>
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
