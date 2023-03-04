<?php
include_once "controller/shfassigncontroller.php";

$shfassigncontroller=new ShfassignController();
$results=$shfassigncontroller->getShiftassign();
echo sizeof($results);


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
            <!-- <ul>
                <li>Shift Assignment Information</li>
            </ul> -->
            <a href="shiftassign_create.php" class="btn btn-info me-auto">Add New Shiftassignment</a>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Emp_ID</th>
                            <th>Shift_Type_ID</th>
                            <th>Start_Date</th>
                            <th>End_Date</th>
                        </tr>
                        <?php
                            foreach($results as $result)
                            {
                                echo "<tr>";
                                echo "<td>" . $result['id'] ."</td>";
                                echo "<td>" . $result['emp_id'] ."</td>";
                                echo "<td>" . $result['shift_type_id'] ."</td>";
                                echo "<td>" . $result['start_date'] ."</td>";
                                echo "<td>" . $result['end_date'] ."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </thead>
                </table>
            </div>
        </div>
            

    </div>
    <?php
    include_once 'layouts/footer.php';
    ?>
