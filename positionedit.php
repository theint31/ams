<?php 
include_once 'controller/positioncontroller.php';
include_once 'controller/departmentcontroller.php';

$positioncontroller = new PositionController();
$deptcontroller = new DepartmentController();

$id=$_GET['id'];
$poisition_result = $positioncontroller->viewPosition($id);
$dept_result = $deptcontroller->getDepartments();

$err_status = false;
if(isset($_POST['update'])){
    if(!empty($_POST['position'])){
        $position = $_POST['position'];
    }else{
        $position_err = "Please fill Job Position";
        $err_status = true;
    }

    if(!empty($_POST['dept'])){
        $dept = $_POST['dept'];
    }else{
        $dept_err = "Please fill Department";
        $err_status = true;
    }

    if($err_status==false){
        $positionedit = $positioncontroller->editPosition($position,$dept,$id);
        header("location:positionindex.php");
    }
    
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
            <h1>Position Edit Form</h1>
           <?php if(isset($dept)) echo $dept; ?>
            <form method="post">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="mb-5">
                            <label>Job Position</label>
                            <input type="text" name="position" id="position" class="form-control" value="<?php  echo $poisition_result['position_name']; ?>" />
                        </div>
                        <div class="mb-5">
                            <label>Department</label>
                            <!-- <select name="dept" class="form-select">
                                <?php
                                    // foreach($dept_result as $result){
                                    //     echo "<option value=".$result['id'].">".$result['dept_name']."</option>";
                                    // }
                                    
                                ?>
                            </select> -->
                            <select name="dept" id="" class="form-control" >
                                    <?php
                                        foreach($dept_result as $res){
                                            echo "<option value = ".$res['id'];
                                            if($res['id']==$poisition_result['dept_id'])
                                                {echo " selected";}
                                            
                                            echo ">";
                                            echo $res['dept_name'];
                                            echo "</option>";
                                        }
                                    ?>
                                </select>
                        </div>
                        <div class="text-center">
                            <button name="update" class="btn btn-dark">Update</button>
                        </div>
                    </div>
                </div>
            </form>
           
           
        </div>
    </div>
<?php 
    include_once 'layouts/footer.php';
?>

