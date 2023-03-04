<?php 
   include_once "controller/employeecontroller.php";
   include_once "controller/shftypecontroller.php";
   include_once "controller/shfassigncontroller.php";
   
   $empcontroller=new employeecontroller();
   $emps=$empcontroller->getEmployees();
   
   $shftypecontroller=new ShftypeController();
   $shifts=$shftypecontroller->getShifttype();

    include_once ('layouts/header.php');
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
            <!-- Start Login Box -->
                <!-- <button id="open-btn" class="open-btn"></button> -->
                    <div id="form-popup" class="form-popup">
                        <form class="form-container" action="" method="">
                            <h6>Shift Type!!</h6>
                            <div class="form-group">
                               <select name="type" class="form-select" id="type">
                                    <?php 
                                        foreach($shifts as $shift){
                                            echo "<option value='".$shift['id']."'>".$shift['shift_name']."</option>";
                                        }
                                    ?>
                               </select>
                              
                            </div>
                            <div class="d-grid">
                            <button type="button" id="formadd-btn" class="btn btn-success btn-sm rounded-0 mb-2">OK</button>
                            <button type="button" id="formclose-btn" class="btn btn-danger btn-sm rounded-0 mb-2">Close</button>
                            </div>
                            
                        </form>
                    </div>
	        <!-- End Login Box -->
            <form method="post">
                <div class="mb-3">
                    <label for="" class="form-label">Employee Name</label>
                    <!-- <input type="text" name="employee" id="" class="form-control"> -->
                    <select name="employee" id="employee" class="form-select">
                        <option>Select Employee</option>
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

                <div class="response"></div>
                <div id='calendar'></div>
                <div>
                
                <button class="btn btn-dark finish" id="formclose-btn">Finish</button>
                </div> 
            </form>  
        </div>
    </div>

<?php 
    include_once ('layouts/footer.php');
?>

   

