<?php
include_once 'controller/attendanceController.php';
$attendanceController = new AttendanceController();

$name = $_POST['name'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
//echo $name;
//echo $startDate;
//echo $endDate;
if($name == "All"){
    //echo "all";
    //echo $startDate;
    $empsWithoutLeaveList[]="";
    $index=0;
    for($i= $startDate;$i<=$endDate;$i++){
        //echo $i;
        //echo '<br>';
        $withoutLeaves = $attendanceController->getAbsenceWithoutLeaves1($i);
        //var_dump($withoutLeaves);
       if(!empty($withoutLeaves)){
        echo "hello";
        $empsWithoutLeaveList[$index]=[$withoutLeaves,$i];
       }
        //$empsWithoutLeaveList[$index]=[$withoutLeaves,$i];
        $index++;
        echo "**********";
        
        
    }
    //var_dump($empsWithoutLeaveList);
    $empsWithoutLeaveListJson = json_encode($empsWithoutLeaveList);
    var_dump($empsWithoutLeaveListJson);
    
}else{
    //echo "not for all";
    $empsWithoutLeaveList[]="";
    $index=0;
    for($i= $startDate;$i<=$endDate;$i++){
        //echo $i;
        $results = $attendanceController->searchAbsenceWithoutLeaveWithName($name,$i);
        //var_dump($results);
        if(!empty($results)){
            echo "hello";
            $empsWithoutLeaveList[$index]=[$results,$i];
           }
            //$empsWithoutLeaveList[$index]=[$withoutLeaves,$i];
            $index++;
            echo "**********";
           
    }
    $empsWithoutLeaveListJson = json_encode($empsWithoutLeaveList);
    var_dump($empsWithoutLeaveListJson);
}

?>