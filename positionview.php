<?php 
include_once 'controller/positioncontroller.php';

$positioncontroller = new PositionController();
$id=$_GET['id'];
$results = $positioncontroller->viewPosition($id);

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
            <h1>Position Form</h1>
            <a href="positionindex.php" class="btn btn-dark">Back</a>
            <table class="table">
                <tr>
                    <th>Job Position</th>
                    <th>Department</th>
                </tr>
                <?php 
                    echo "<tr>";
                    
                        echo "<td>".$results['position_name']."</td>";
                        echo "<td>".$results['dept_name']."</td>";
                   
                    echo "</tr>";
                ?>
            </table>
           
           
        </div>
    </div>
<?php 
    include_once 'layouts/footer.php';
?>

