<?php
include_once "controller/empcontroller.php";
include_once "controller/shftypecontroller.php";
include_once "controller/shfassigncontroller.php";

$empcontroller=new EmpController();
$emps=$empcontroller->getEmployee();

$shftypecontroller=new ShftypeController();
$shifts=$shftypecontroller->getShifttype();

if(isset($_POST['submit']))
{
    if(!empty($_POST['employee']))
    {
        $empid=$_POST['employee'];
    }
    else{
        $empid_error="Please fill employee_id";
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
    $result=$shfassigncontroller->addShiftassign($empid,$shfid,$start,$end);
    header('location:shiftassign_index.php');

}

?>
<?php

include_once 'layouts/header.php';

?>
    <div id="app">
        <?php
        include_once 'layouts/sidebar.php';
        ?>
        <div id="main">
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
                            <select name="employee" id="" class="form-select">
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
                            <label for="" class="form-label">Shift_Type</label>
                            <select name="shift_type" id="" class="form-select">
                                <?php

                                    foreach($shifts as $shift)
                                    {
                                        echo "<option value=".$shift['id'].">";
                                        echo $shift['shift_name'];
                                        echo "</option>";
                                    }

                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Start_Date</label>
                            <input type="date" name="start_date" id="">
                        </div>
                        <div class="mb-3" class="form-label">
                            <label for="">End_Date</label>
                            <input type="date" name="end_date" id="">
                        </div>
                        <button name="submit" type="submit" class="btn btn-info">Add</button>
                    </form>
                </div>
            </div>
        </div>
            

    </div>
    <?php
    include_once 'layouts/footer.php';
    ?>
