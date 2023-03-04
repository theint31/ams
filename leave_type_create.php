    
<?php
include_once "controller/leaveTypeController.php";

$leaveTypeController = new LeaveTypeController();

include_once "layouts/header.php";
include_once "includes/db.php";
$error_status = false;
if(isset($_POST['add'])){
    if(!empty($_POST['type'])){
        $type = $_POST['type'];
    }else{
        $type_error = "Plese enter type";
        $error_status = true;
    }
    if($error_status==false){
        $result = $leaveTypeController->insertLeaveType($type);
        header("location:leave_type_index.php");
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
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <form action="#" method = "post">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="type">Type</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="type" id="" class="form-control" value = "<?php if(isset($type)) echo $type;?>">
                            </div>
                            <span class="text-danger"><?php if(isset($type_error)) echo $type_error;?></span>
                        </div>

                        <div class="text-center">
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
