<?php 
include_once "controller/shfassigncontroller.php";

$empid = isset($_POST['emp']) ? $_POST['emp'] : "";
//echo $empid;
$start = isset($_POST['start']) ? $_POST['start'] : "";
//echo $start;
$end = isset($_POST['end']) ? $_POST['end'] : "";
$adddate = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $end) ) ));
//echo $adddate;
$type = isset($_POST['title']) ? $_POST['title'] : "";
//echo $type;
$month = date("m",strtotime($start));
//echo $month;
$year = date("Y",strtotime($start));
//echo $year;



$shfassigncontroller=new ShfassignController();
$result=$shfassigncontroller->addShiftassign($empid,$type,$start,$adddate);






        
?>