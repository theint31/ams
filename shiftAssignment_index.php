<?php 
    include_once 'controller/shfassigncontroller.php';

    $shfassigncontroller=new ShfassignController();
    $results=$shfassigncontroller->getShiftassign();
    echo sizeof($results);

    if(isset($_GET['page']) && !empty($_GET['page'])){
        $pageno = $_GET['page'];
        echo $pageno;
    }else{
        $pageno=1;
    }
    $list_result = $shfassigncontroller->getShiftInfo($pageno);
    //var_dump($list_result);
    
    $total_rows =10;
    $toal_results = count($shfassigncontroller->getShiftassign());
    $total_pages = ceil($toal_results/$total_rows);
    
    $prev = $pageno-1;
    $next = $pageno+1;
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
            <!-- <ul>
                <li>Shift Assignment Information</li>
            </ul> -->
            <div class="text-end me-5">
                <a href="shiftcalendar.php" class="btn btn-info mb-4">Add New Shiftassignment</a>
            </div>
           
            </div>
            <div class="row mb-4">
                <div class="col-md-4">
                    <input type="text" name="eName" id="eName" class="form-control">
                </div>
                <div class="col-md-4">
                    <input type="date" name="date" id="date" class="form-control">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-outline-success" id="search">Search</button>
                </div>
            </div>
            <div class="row">
            
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Emp_ID</th>
                            <th>Shift_Type_ID</th>
                            <th>Start_Date</th>
                            <th>End_Date</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $count=1;
                            foreach($list_result as $result)
                            {
                                echo "<tr>";
                                echo "<td>" . $count ."</td>";
                                echo "<td>" . $result['emp_name'] ."</td>";
                                echo "<td>" . $result['shift_name'] ."</td>";
                                echo "<td>" . $result['start_date'] ."</td>";
                                echo "<td>" . $result['end_date'] ."</td>";
                                echo "</tr>";
                                $count++;
                            }
                        ?>
                    
                </table>
            </div>
            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li  
                                    <?php if($pageno<=1) 
                                    echo 'class="page-item disabled"'; 
                                    else echo 'class="page-item"'?>>
                                    <a class="page-link" href="shiftAssignment_index.php?page=<?php echo $prev;?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                    </li>
                                    <?php 
                                        for($index=1;$index<=$total_pages;$index++){

                                            echo '<li class="page-item"><a class="page-link" href=shiftAssignment_index.php?page='.$index.'>'.$index.'</a></li>';
                                        }
                                    ?>               
                                    <li 
                                    <?php if($pageno>=$total_pages)
                                    echo 'class="page-item disabled"';
                                    else echo 'class="page-item"'?>>
                                    
                                    <a class="page-link" href="shiftAssignment_index.php?page=<?php echo $next;?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                    </li>
                                </ul>
                            </nav>           
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
   