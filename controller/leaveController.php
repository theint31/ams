<?php
include __DIR__."/../model/leave.php";
class LeaveController extends Leave{
    public function getAllLeaves(){
        $result = $this->getAllLeave();
        return $result;
    }
    public function getLeaves($id){
        $result = $this->getLeave($id);
        return $result;
    }

    public function updateLeaves($empName,$leaveType,$startDate,$endDate,$id){
        $result = $this->updateLeave($empName,$leaveType,$startDate,$endDate,$id);
        return $result;
    }

    public function addLeaves($empName,$leaveType,$startDate,$endDate){
        $result = $this->insertLeaves($empName,$leaveType,$startDate,$endDate);
        return $result;
    }
    public function deleteLeave($id){
        $result = $this->removeLeave($id);
        return $result;
    }
}
?>