<?php
    include __DIR__."/../model/attendance.php";
    class AttendanceController extends Attendance{
        public function getAllAttendances(){
            $result = $this->getAttendanceLists();
            return $result;
        }

        public function getAttendance($id){
            $result = $this->getAttendanceList($id);
            return $result;
        }

        public function updateAttendance($empName,$date,$shift_type,$id){
            $result = $this->updateAttendanceList($empName,$date,$shift_type,$id);
            return $result;
        }

        public function addAttendance($empName,$date,$shift_type){
            $result = $this->insertAttendance($empName,$date,$shift_type,);
            return $result;
        }

        public function attendanceDelete($id){
            $result = $this->removeAttendance($id);
            return $result;
        }

        public function searchAttendance($name,$date){
            $result = $this->filterAttendance($name,$date);
            return $result;
        }

        public function getAbsenceWithLeave(){
            $result = $this->retrieveAbsenceWihtLeave();
            return $result;
        }

        public function searchAbsenceWithDate($startDate,$endDate){
            $result = $this->filterAbsenceWithDate($startDate,$endDate);
            return $result;
        }
        public function viewAbsenceWithLeave($id){
            $result = $this->showAbsenceWithLeave($id);
            return $result;
        }
        public function getAbsenceWithoutLeaves($todayDate){
            $results = $this->retrieveAbsenceWithoutLeaves($todayDate);
            return $results;
        }

        public function getAbsenceWithoutLeaves1($todayDate){
            $results = $this->retrieveAbsenceWithoutLeaves1($todayDate);
            return $results;
        }
        

        public function searchAbsenceWithoutLeaveWithName($name,$date){
            $result = $this->filterAbsenceWithoutLeaveWithName($name,$date);
            return $result;
        }

        public function getNoOfEmpsByDates($date){
            $results = $this->selectNoOfEmpsByDates($date);
            return $results;
        }
        public function sumOfEmpsByDates($startDate,$endDate){
            $results = $this->additionOfEmpsByDates($startDate,$endDate);
            return $results;
        }
        public function sumOfEmpsLeavesByDates($startDate,$endDate){
            $results = $this->additionOfEmpsLeavesByDates($startDate,$endDate);
            return $results;
        }
    }
?>