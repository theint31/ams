<?php
include_once 'controller/attendanceController.php';
$attendanceController = new AttendanceController();

$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
//echo $startDate;
//echo $endDate;

$results = $attendanceController->searchAbsenceWithDate($startDate,$endDate);
//var_dump($result) ;
$count=1;
$data="";
foreach($results as $result){
    $data.="<tr>";
    $data.="<td>".$count."</td>";
    $data.="<td>".$result['emp_name']."</td>";
    $data.="<td>".$result['start_date']."</td>";
    $data.="<td>".$result['end_date']."</td>";
    $data.="<td>Absent</td>";
    $data.="<td aid=".$result['id'].">
                <a class='me-4 btn btn-outline-success' href=absentWithLeave_view.php?id=".$result['id']."><i class='fa-solid fa-eye'></i></a>
                <a class='me-4 btn btn-outline-primary' href=absentWithLeave_edit.php?id=".$result['id']."><i class='fa-solid fa-pen'></i></a>
                <button class=' me-2 btn btn-outline-danger absentWithLeaveDelete'><i class='fa-solid fa-trash-can'></i></button>
    
            </td>";
    $data.="</tr>";
}
echo $data;
?>