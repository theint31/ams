<?php 

    include_once ('controller/employeecontroller.php');

    include_once ('layouts/header.php');
    
    $empcontroller = new EmployeeController();
    $empresults = $empcontroller->getEmployees();

    
   
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
            
            <h1>Employee </h1>
            <div class="text-end me-5">
            <a class="btn btn-dark" href="empcreate.php">Insert Employee</a>
            </div>
          
            
            <form method="get">
                <table class="table">
                    <thead>
                        <tr class='text-center'>
                            <th>No</th>
                            <th>Name</th>
                            <th>NRC</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th colspan="3">Action</th>
                            <!-- <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Address</th> -->
                            <!-- <th>Position</th>
                            <th>Department</th> -->
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                        $count=1;
                            foreach($empresults as $result){
                                echo "<tr>";
                                echo "<td>".$count."</td>";
                                echo "<td>".$result['emp_name']."</td>";
                                echo "<td>".$result['nrc']."</td>";
                                echo "<td>".$result['emp_ph']."</td>";
                                echo "<td>".$result['emp_email']."</td>";
                                // echo "<td>".$result['dob']."</td>";
                                // echo "<td>".$result['gender']."</td>";
                                // echo "<td>".$result['address']."</td>";
                                echo "<td eid=".$result['id'].">
                                        <a class='btn btn-info' href=empview.php?id=".$result['id']."><i class='fa-solid fa-eye'></i></a>
                                        <a class='btn btn-success' href=empedit.php?id=".$result['id']."><i class='fa-solid fa-pen'></i></a>
                                        <a href='' class='btn btn-danger deleteemp'><i class='fa-solid fa-trash-can'></i></a>
                                       
                                        <a class='btn btn-secondary' href=modal.php?id=".$result['id']."><i class='fa-solid fa-paper-plane'></i></a>
                                    </td>";
                                echo "</tr>";
                                $count++;
                            }
                       ?>
                    </tbody>
                    
                </table>
            </form>
           
        </div>
    </div>

<?php 
    include_once ('layouts/footer.php');
?>

<!-- <a href=mail.php?id=".$result['id']." class='btn btn-secondary'><i class='fa-solid fa-paper-plane'></i></a> -->
   