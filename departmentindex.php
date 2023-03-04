<?php 
    include_once 'controller/departmentcontroller.php';

    $deptcontroller = new DepartmentController();
    $results = $deptcontroller->getDepartments();
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
            <h1>Department</h1>
            <div class="text-end me-5">
                <a class="btn btn-dark" href="departmentcreate.php">Insert Department</a>
            </div>
            
            <form>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Department</th>
                        <th>Department Phone</th>
                        <th>Department Email</th>
                        <th colspan="4">Action</th>
                    </tr>
                    <?php 
                        $count=1;
                        foreach($results as $result){
                            echo "<tr>";
                            echo "<td>".$count."</td>";
                            echo "<td>".$result['dept_name']."</td>";
                            echo "<td>".$result['dept_ph']."</td>";
                            echo "<td>".$result['dept_email']."</td>";
                            echo "<td did=".$result['id']."><a class='btn btn-info' href=departmentview.php?id=".$result['id']."><i class='fa-solid fa-eye'></i></a>
                            <a class='btn btn-success' href=departmentedit.php?id=".$result['id']."><i class='fa-solid fa-pen'></i></a>
                           
                            <a href='' class='btn btn-danger deletedept'><i class='fa-solid fa-trash-can'></i></a>";
                            echo "</tr>";
                            $count++;
                        }
                    ?>
                </table>
            </form>

            <!-- <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>  -->
        </div>
    </div>

<?php 
    include_once ('layouts/footer.php');
?>
   