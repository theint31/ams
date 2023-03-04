    
<?php
include_once "controller/leaveTypeController.php";
$leaveTypeController = new LeaveTypeController();
$leaveTypeResults = $leaveTypeController->getallLeaveTypes();


include_once "layouts/header.php";
include_once "includes/db.php";
//var_dump($leaveTypeResults);

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
            <div class="row mb-3">
                <div class="col-md-4">
                    <a href="leave_type_create.php" class="btn btn-outline-success">Add New Leave Types</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class='text-center'>
                        <th>No</th>
                        <th>Types</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id= "tbody">
                    <?php
                     $count =1;
                    foreach($leaveTypeResults as $results){
                        echo "<tr class='text-center'>";
                       
                        echo "<td>".$count."</td>";
                        echo "<td>".$results['type']."</td>";
                        echo "<td leaveTypeid=' ".$results['id']."'>
                            <a class=' btn btn-outline-success me-4 ' href=leave_type_view.php?id=".$results['id']."><i class='fa-solid fa-eye'></i></a>
                            <a class='btn btn-outline-primary me-4' href=leave_type_edit.php?id=".$results['id']."><i class='fa-solid fa-pen'></i></a>
                            <button class='btn btn-outline-danger me-2 delete' name='submit'><i class='fa-solid fa-trash-can'></i></button>
                            
                            
                        </td>";
                        echo "</tr>";
                        $count++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <footer>
            
        </footer>
    </div>
</div>
<?php
include_once "layouts/footer.php";
?>
