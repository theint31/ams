    
<?php
include_once "controller/attendanceController.php";
include_once "controller/shftypecontroller.php";
include_once "controller/employeecontroller.php";
include_once "controller/leaveTypeController.php";

$id = $_GET['id'];

$attendanceController = new AttendanceController();
$attendanceResult = $attendanceController->getAttendance($id);


$shiftTypeController  = new ShftypeController();
$allShiftTypes = $shiftTypeController->getShifttype();

$empController = new EmployeeController();
$emp_results = $empController->getEmployees();


$leaveTypeController = new leaveTypeController();
$leave_type_results = $leaveTypeController->getallLeaveTypes();



include_once "layouts/header.php";
//include_once "includes/db.php";
echo $id;

var_dump($attendanceResult);
$error_status=false;
if(isset($_POST['save'])){
    //echo "successful";
    if(!empty($_POST['emp_name'])){
        $empName = $_POST['emp_name'];
    }else{
        $error_status=true;
        $empName_error = "Please enter employee name";
    }
    if(!empty($_POST['date'])){
        $date = $_POST['date'];
    }else{
        $error_status=true;
        $date_error = "Please enter  date";
    }
    if(!empty($_POST['shift_type'])){
        $shift_type = $_POST['shift_type'];
        //echo $shift_type;
    }else{
        $error_status=true;
        $shift_type_error = "Please enter  shift type";
    }
    
    
    if($error_status == false){
        $result = $attendanceController->updateAttendance($empName,$date,$shift_type,$id);
        // header('location:attendance_index.php');
        header('location:attendance_index.php');
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
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="#" method="post">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="emp_name">Employee Name</label>
                            </div>
                           
                            <div class="col-md-9">
                                <select name="emp_name" id="" class="form-control" >
                                    <?php
                                        foreach($emp_results as $empRes){
                                            echo "<option value = ".$empRes['id'];
                                            if($empRes['id']==$attendanceResult['emp_id'])
                                                {echo " selected";}
                                            
                                            echo ">";
                                            echo $empRes['emp_name'];
                                            echo "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="date">Date</label>
                            </div>
                            
                            <div class="col-md-9">
                                <input type="date" name="date" id="" class ='form-control' value = "<?php foreach($attendanceResult as $result){ echo strftime('%Y-%m-%d',strtotime($result['start_date']));}?>">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="emp_name">Shift Type</label>
                            </div>
                            
                            <div class="col-md-9">
                                <select name="shift_type" id="" class ="form-control" >
                                
                               
                                     <?php
                                        foreach($allShiftTypes as $shiftTypes){
                                            echo "<option value = ".$shiftTypes['id'];
                                            if($shiftTypes['id']==$attendanceResult['shift_type_id'])
                                                {echo " selected";}
                                            
                                            echo ">";
                                            echo $shiftTypes['shift_name'];
                                            echo "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            
                        </div>
                        
                        
                        <div class="text-center">
                            <button class="btn btn-outline-success" name="save">Save</button>
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
