<?php 


include_once "controller/employeecontroller.php";
include_once "controller/shftypecontroller.php";
include_once "controller/shfassigncontroller.php";

$empcontroller=new employeecontroller();
$emps=$empcontroller->getEmployees();

$shftypecontroller=new ShftypeController();
$shifts=$shftypecontroller->getShifttype();




if(isset($_POST['submit']))
{
    if(!empty($_POST['employee']))
    {
        $name=$_POST['employee'];
    }
    else{
        $name_error="Please fill employee name";
    }
    if(!empty($_POST['shift_type']))
    {
        $shfid=$_POST['shift_type'];
    }
    else{
        $shfid_error="Please fill shift_id";
    }
    if(!empty($_POST['start_date']))
    {
        $start=$_POST['start_date'];
    }
    else{
        $start_error="Please fill start date";
    }
    if(!empty($_POST['end_date']))
    {
        $end=$_POST['end_date'];
    }
    else{
        $end_error="Please fill end date";
    }
    // $emp=$_POST['employee'];
    $shift=$_POST['shift_type'];
    $shfassigncontroller=new ShfassignController();
    $result=$shfassigncontroller->addShiftassign($name,$shfid,$start,$end);
    
    header('location:shiftAssignment_index.php');
    
    // $shiftresult = $shiftcontroller->selectshift($name,$start,$end);
    // print_r($shiftresult);
}


include_once 'layouts/header.php';
?>
<div id="app">
    <?php 
    include_once ('layouts/sidebar.php');
    ?>
        <div id="main">
        <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="container-fluid px-4">
            <ul>
                <li>Shift Assignment Information</li>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Employee Name</label>
                            <!-- <input type="text" name="employee" id="" class="form-control"> -->
                            <select name="employee" id="employee" class="form-select">
                                <?php

                                    foreach($emps as $emp)
                                    {
                                        echo "<option value=".$emp['id'].">";
                                        echo $emp['emp_name'];
                                        echo "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Start_Date</label>
                            <input type="date" name="start_date" id="start">
                        </div>
                        <div class="mb-3" class="form-label">
                            <label for="">End_Date</label>
                            <input type="date" name="end_date" id="end">
                        </div>
                        <div class="mb-3" class="form-label">
                           
                            <button name="search" id="search1" class="btn btn-success">Search</button>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Shift_Type</label>
                            <select name="shift_type" id="type" class="form-select">
                                
                            </select>
                        </div>
                        
                        <button name="submit" type="submit" class="btn btn-info">Add</button>
                    </form>
                </div>
            </div>
        </div>
           
           
        </div>
    </div>
<?php 
    include_once 'layouts/footer.php';
?>

