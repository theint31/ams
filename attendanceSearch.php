<?php
include_once 'controller/attendanceController.php';
$attendanceController = new AttendanceController();
$eName= $_POST['eName'];
$date = $_POST['date'];
//echo $eName;
//echo $date;
$searchResult = $attendanceController->searchAttendance($eName,$date);
//var_dump($searchResult);
$count=1;
$data = "";
foreach($searchResult as $search){
    $data.="<tr>";
    $data="<td>".$count."</td>";
    $data.="<td>".$search['emp_name']."</td>";
    $data.="<td>".$search['date']."</td>";
    $data.="<td>".$search['shift_name']."</td>";
    $data.="</tr>";
}
echo $data;
?>