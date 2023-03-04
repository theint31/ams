    
<?php
include_once "controller/leaveTypeController.php";
$id = $_GET['id'];
$leaveTypeController = new LeaveTypeController();
$leaveTypeResult = $leaveTypeController->getLeaveTypes($id);


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
            <div class="mb-3">
                <a class="btn btn-outline-success" href="leave_type_index.php">Back to All Leave Types</a>
            </div>
            <table class="table">
                <thead>
                    <tr class='text-center'>
                        <th>No</th>
                        <th>Types</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                     $count =1;
                    foreach($leaveTypeResult as $results){
                        echo "<tr class='text-center'>";
                       
                        echo "<td>".$count."</td>";
                        echo "<td>".$results['type']."</td>";
                        
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
