<?php 
include_once 'controller/employeecontroller.php';
include_once 'controller/departmentcontroller.php';
include_once 'controller/positioncontroller.php';

 $empcontroller = new EmployeeController();
// $emp_results = $empcontroller->getEmployees();

 $deptcontroller = new DepartmentController();
 $dept_results = $deptcontroller->getDepartments();

 $positioncontroller = new PositionController();
 $position_results = $positioncontroller->getPositions();
 //print_r($position_results);
 //echo "<br/><br/>";
$id= $_GET['id'];
$results = $empcontroller->viewEmployee($id);
//print_r($results);

$err_status=false;
if(isset($_POST['update'])){

    if(!empty($_POST['name'])){
        $name = $_POST['name'];
    }else{
        $name_err = "Please fill name";
        $err_status=true;
    }

    if(!empty($_POST['email'])){
        $email = $_POST['email'];
    }else{
        $email_err ="Please fill email ";
        $err_status=true;
    }
    
    if(!empty($_POST['address'])){
        $address = $_POST['address'];
    }else{
        $address_err ="Please fill address ";
        $err_status=true;
    }

    if(!empty($_POST['nrc'])){
        $nrc = $_POST['nrc'];
    }else{
        $nrc_err ="Please fill NRC ";
        $err_status=true;
    }

    if(!empty($_POST['dob'])){
        $dob = $_POST['dob'];
    }else{
        $dob_err ="Please fill DOB ";
        $err_status=true;
    }
    
    // if(!empty($_POST['dept'])){
    //     $dept = $_POST['dept'];
    // }

    if(!empty($_POST['phone'])){
        $phone = $_POST['phone'];
    }else{
        $phone_err ="Please fill Phone ";
        $err_status=true;
    }

    if(!empty($_POST['gender'])){
        $gender = $_POST['gender'];
    }

    if(!empty($_POST['position'])){
        $position = $_POST['position'];
    }

    if($err_status == false){
        $empupdate = $empcontroller->editEmployees($name,$nrc,$phone,$email,$dob,$gender,$address,$position,$id);
        header('location:empindex.php');
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
            <h1>Employee Edit Form</h1>
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-4">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $results['emp_name'] ?>"/>
                        </div>
                        <div class="mb-4">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php  echo $results['emp_email'] ?>"/>
                        </div>
                        <div class="mb-4">
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" class="form-control" value="<?php echo $results['address'] ?>"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <label for="nrc">NRC:</label>
                            <input type="text" name="nrc" id="nrc" class="form-control" value="<?php  echo $results['nrc'] ?>"/>
                        </div>
                        <div class="mb-4">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" name="dob" id="dob" class="form-control" value="<?php  echo $results['dob'] ?>"/>
                        </div>
                        <div class="mb-4">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $results['emp_ph']?>"/>
                        </div>
                        <!-- <div class="mb-4">
                            <label for="dept">Department</label>
                            <select class="form-select" name="dept">
                               <?php 
                            //    foreach($dept_results as $result){
                            //     echo "<option value=".$results[8].">".$result['dept_name']."</option>";
                            //    }
                                
                               ?>
                            </select>
                        </div> -->
                    </div>
                    <div class="col-md-4">
                       
                        <div class="mb-3">
                            <label>Gender:</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="radio" name="gender" id="male" value="male" class="form-check" />Male
                                </div>
                                <div class="col-md-6">
                                    <input type="radio" name="gender" id="female" value="female" class="form-check"/>Female
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="position">Position</label>
                            <!-- <select class="form-select" name="position">
                            <?php 
                            //    foreach($position_results as $result){
                            //     echo "<option value=".$result['id'];
                            //     if($result['id']==$results['position_id'])
                            //     echo "selected"
                            //     .">".$result['position_name']."</option>";
                            //    }
                                
                            //    ?>
                            </select> -->
                            <select name="position" id="" class="form-control" >
                                    <?php
                                        foreach($position_results as $res){
                                            echo "<option value = ".$res['id'];
                                            if($res['id']==$results['position_id'])
                                                {echo " selected";}
                                            
                                            echo ">";
                                            echo $res['position_name'];
                                            echo "</option>";
                                        }
                                    ?>
                                </select>
                        </div>
                        <div class="mt-5  text-center">
                            <button name="update" id="update" class="btn btn-dark">Update</button>
                        </div>
                    </div>
                </div>
                
            </form>
           
           
        </div>
    </div>
<?php 
    include_once 'layouts/footer.php';
?>

