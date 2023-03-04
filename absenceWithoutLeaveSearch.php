<?php
include_once 'controller/attendanceController.php';
$attendanceController = new AttendanceController();
//$result = $attendanceController->getAttendanceAbsenceWhthoutLeavesWithDate("kaung kaung",'2022-09-02');
//var_dump($result);

$name = $_POST['name'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

echo $name.",".$startDate.",".$endDate;
$data = "";
for($i= $startDate;$i<=$endDate;$i++){
    echo $i;
    echo '<br>';
    $withoutLeaves = $attendanceController->getAbsenceWithoutLeaves($i);
    var_dump($withoutLeaves);
    foreach($withoutLeaves as $result){
        echo "<tr>";
        echo "</tr>";
    }
}

?>