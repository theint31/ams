<?php 
    include_once 'controller/shftypecontroller.php';

    $shftypecontroller=new ShftypeController();
    $results=$shftypecontroller->getShifttype();
    echo sizeof($results);
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
            <div class="container-fluid px-4">
                <h1>Employee Attendance Management System</h1>

                <!-- <ul>
                    <li>Shift Type Information</li>
                </ul> -->
                <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Shift_name</th>
                                <th>Start_time</th>
                                <th>End_time</th>
                            </tr>
                            <?php
                                foreach($results as $result)
                                {
                                    echo "<tr>";
                                    echo "<td>" .$result['id']. "</td>";
                                    echo "<td>" .$result['shift_name']. "</td>";
                                    echo "<td>" .$result['start_time']. "</td>";
                                    echo "<td>" .$result['end_time']. "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </thead>
                    </table>
                </div>
            </div>

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
   