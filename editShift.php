<?php 
include_once "controller/shfassigncontroller.php";

// $name = isset($_POST['emp']) ? $_POST['emp'] : "";
// echo $name;
$start = isset($_POST['start']) ? $_POST['start'] : "";
echo $start;
 $end = isset($_POST['end']) ? $_POST['end'] : "";
 $adddate = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $end) ) ));
// $yesterdayDT = $end->sub(new DateInterval('P1D'));
// $subday = $yesterdayDT->format('Y-m-d');
 echo $end;
echo "****";
$type = isset($_POST['title']) ? $_POST['title'] : "";
echo $type;
$id = isset($_POST['id']) ? $_POST['id'] : "";
echo $id;

//Pass the date you want to subtract from in as
//the $time parameter for DateTime.
//$currentDate = new DateTime($end);

//Subtract a day using DateInterval
//$yesterdayDT = $end->sub(new DateInterval('P1D'));

//Get the date in a YYYY-MM-DD format.
//$yesterday = $yesterdayDT->format('Y-m-d');
//Print it out.
//echo $yesterday;


// $shfassigncontroller=new ShfassignController();
// $result=$shfassigncontroller->updateShiftType($start_date,$end_date,$type,$id);


// $datetime =date(strototime($end,'-1 day'));
// // print current time
// echo $datetime;
// echo "\n";
//After using of strotime fuction then result 
// $yesterday = date("Y-m-d", strtotime("yesterday"));
// echo $yesterday;


// $datetime = date($end);
// // print current time
// echo $datetime;
// echo "\n";
// //After using of strotime fuction then result 
// $yesterday = date("Y-m-d", strtotime("yesterday"));
// echo $yesterday;
?>