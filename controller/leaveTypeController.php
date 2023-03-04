<?php
include __DIR__."/../model/leave_type.php";
class LeaveTypeController extends LeaveType{
    public function getallLeaveTypes(){
        $result = $this->getAllLeaveType();
        return $result;
    }
    public function getLeaveTypes($id){
        $result = $this->getLeaveType($id);
        return $result;
    }
    public function updateLeaveTypes($type,$id){
        $result = $this->updateLeaveType($type,$id);
        return $result;
    }

    public function deleteLeaveTypes($id){
        $result = $this->deleteLeaveType($id);
        return $result;
    }

    public function insertLeaveType($type){
        $result = $this->addLeaveType($type);
        return $result;
    }
}
?>