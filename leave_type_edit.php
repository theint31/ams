    
<?php
include_once "controller/leaveTypeController.php";
$id = $_GET['id'];
$leaveTypeController = new LeaveTypeController();
$results = $leaveTypeController->getLeaveTypes($id);

include_once "layouts/header.php";
include_once "includes/db.php";
$error_status = false;
if(isset($_POST['save'])){
    if(!empty($_POST['type'])){
        $type = $_POST['type'];
    }else{
        $type_error = "Plese enter type";
        $error_status = true;
    }
    if($error_status==false){
        $result = $leaveTypeController->updateLeaveTypes($type,$id);
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
                                <input type="text" name="type" id="" class="form-control" value = "<?php foreach($results as $result){ echo $result['type'];}?>">
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
