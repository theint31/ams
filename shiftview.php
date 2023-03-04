<?php 
  

   
//    if(isset($_POST['search'])){
//     // echo "Click";
    
//     if(!empty($_POST['month'])){
//         $month = $_POST['month'];
//     }
//     if(!empty($_POST['year'])){
//         $year = $_POST['year'];
//     }
//     // echo $year;
//     // echo $month;
//     // $year = $_POST['year'];
    
//     // $month = $_POST['month'];

//     $results = $positioncontroller->getshiftView($month,$year);
//     print_r($results);

//     // echo $year;
//     // echo $month;

//    }
   
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
            <form action="" method="post">
                <select name="year" class=" form-select" id="year">
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select>
                <select name="month" class=" form-select" id="month">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <div class="text-center">
                        <!-- <button class="btn btn-success" name="search" id="search">Search</button> -->
                        <a href="#" class="btn btn-dark" id="search">Search</a>
                </div>
            </form>
           <table class="table">
                <thead id="shiftdata">
                  
                </thead>
                <tbody id="shiftlist">
                
                        <?php 
                            // foreach($results as $result){
                            //     echo "<tr>";
                            //     echo "<td>".$result['emp_name']."</td>";
                            //     echo "</tr>";
                            // }
                            //print_r($results);
                        ?>
                    
                </tbody>
                
                
           </table>
        </div>
    </div>

<?php 
    include_once ('layouts/footer.php');
?>
   