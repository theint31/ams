<?php 
include_once "controller/shfassigncontroller.php";

$empid = isset($_GET['emp']) ? $_GET['emp'] : "";
//echo $empid;
$month = isset($_GET['month']) ? $_GET['month'] : "";
//echo $month;
$year = isset($_GET['year']) ? $_GET['year'] : "";
//echo $year;
$shfassigncontroller=new ShfassignController();
$results=$shfassigncontroller->selectShiftName($month,$year,$empid);
//var_dump($results);
$showvalue ="";

foreach($results as $result)
{
    
  
   $showvalue .= $result['shift_name'];
   $showvalue .=$result['start_date'];
   $showvalue .=$result['end_date'];
    
}
print_r(json_encode($showvalue)) ;

?>