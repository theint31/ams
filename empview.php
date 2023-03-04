<?php 
include_once 'controller/employeecontroller.php';

$id=$_GET['id'];
$empcontroller = new EmployeeController();
$results = $empcontroller->viewEmployee($id);


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
            <h1>Employee Form</h1>
            <a href="empindex.php" class="btn btn-dark">Back</a>
            <table class="table">
                <tr>
                    <!-- <th>No</th> -->
                    <th>Name</th>
                    <th>NRC</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Position</th>
                </tr>
                
                    <?php 
                    
                       
                       //echo var_dump($results);
                        echo "<tr>";
                        
                            echo "<td>".$results['emp_name']."</td>";
                            echo "<td>".$results['nrc']."</td>";
                            echo "<td>".$results['emp_ph']."</td>";
                            echo "<td>".$results['emp_email']."</td>";
                            echo "<td>".$results['dob']."</td>";
                            echo "<td>".$results['gender']."</td>";
                            echo "<td>".$results['address']."</td>";
                            echo "<td>".$results['position_name']."</td>";
                       
                        echo "<tr/>";

                        
                    ?>
               
            </table>
           
           
           
        </div>
    </div>
<?php 
    include_once 'layouts/footer.php';
?>

