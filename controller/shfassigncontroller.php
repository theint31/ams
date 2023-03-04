<?php
include_once "model/shift_assignment.php";
class ShfassignController extends Shiftassign{


public function getShiftassign(){
    $results=$this->getshfassign();
    return $results;
}

public function addShiftassign($empid,$shfid,$start,$end)
{
    $result=$this->addshfassign($empid,$shfid,$start,$end);
    return $result;
}
public function selectshift($name,$start_date,$end_date){
    $result = $this->selectshiftname($name,$start_date,$end_date);
    return $result;
}
public function updateShiftType($start_date,$end_date,$type,$id){
    $restult = $this->updateShift($start_date,$end_date,$type,$id);
    return $restult;
}
public function selectShiftName($month,$year,$id){
    $restult = $this->selectshfassign($month,$year,$id);
    return $restult;
}
public function searchAttendance($name,$date){
    $result = $this->filterAttendance($name,$date);
    return $result;
}
public function getShiftInfo($pageno){
    $results = $this->getShfInfo($pageno);
    return $results;
}

}

?>