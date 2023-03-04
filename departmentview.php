<?php 
include_once 'controller/departmentcontroller.php';

$id=$_GET['id'];
$deptcontroller = new DepartmentController();
$result =$deptcontroller->viewDepartment($id);


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
            <h1>Department Form</h1>
            <table class="table">
                <tr>
                    <th>Department</th>
                    <th>Department Phone</th>
                    <th>Department Email</th>
                </tr>
                <?php 
                    echo "<tr>";
                    for($i=1;$i<count($result);$i++){
                        echo "<td>".$result[$i]."</td>";
                    }
                    echo "</tr>";
                    
                ?>

            </table>
           
           
        </div>
    </div>
<?php 
    include_once 'layouts/footer.php';
?>

