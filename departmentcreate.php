<?php 
include_once 'controller/departmentcontroller.php';

$deptcontroller = new DepartmentController();

$err_status = false;
if(isset($_POST['add'])){
    if(!empty($_POST['name'])){
        $name = $_POST['name'];
    }else{
        $name_err = "Please fill department";
        $err_status=true;
    }

    if(!empty($_POST['phone'])){
        $phone = $_POST['phone'];
    }else{
        $phone_err = "Please fill phone";
        $err_status=true;
    }

    if(!empty($_POST['email'])){
        $email = $_POST['email'];
    }else{
        $email_err = "Please fill email";
        $err_status=true;
    }

    if($err_status==false){
        $deptinsert = $deptcontroller->insertDepartment($name,$phone,$email);
        header('location:departmentindex.php');
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
            <h1>Department Create Form</h1>
            <form method="post">
                <div class="row">
                    <div class="col-md-4 ">
                        <div>
                            <label>Department Name:</label>
                            <input type="text" name="name" id="name" class="form-control" />
                            <span class="text-danger"><?php if(isset($name_err)) echo $name_err; ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <label>Department Phone:</label>
                            <input type="text" name="phone" id="phone" class="form-control"/>
                            <span class="text-danger"><?php if(isset($phone_err)) echo $phone_err; ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <label>Department Email:</label>
                            <input type="email" name="email" id="email" class="form-control"/>
                            <span class="text-danger"><?php if(isset($email_err)) echo $email_err; ?></span>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button name="add" class="btn btn-dark">Add</button>
                    </div>
               </div>
            </form>
          
           
           
        </div>
    </div>
<?php 
    include_once 'layouts/footer.php';
?>

