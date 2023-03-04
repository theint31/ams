<?php 
    include_once ("model/employee.php");

    class EmployeeController extends Employee{
        public function getEmployees(){
            $results = $this->getEmployeeList();
            return $results;
        }

        public function insertEmployee($name,$nrc,$phone,$email,$dob,$gender,$address,$position){
            $results = $this->insertEmployeeList($name,$nrc,$phone,$email,$dob,$gender,$address,$position);
            return $results;
        }

        public function viewEmployee($id){
            $results = $this->viewEmployeeList($id);
            return $results;
        }

        public function editEmployees($name,$nrc,$phone,$email,$dob,$gender,$address,$position,$id){
            $results = $this->editEmployeeList($name,$nrc,$phone,$email,$dob,$gender,$address,$position,$id);
            return $results;
        }
        public function deleteEmp($id){
            $results = $this->deleteEmployee($id);
            return $results;
        }
    }

?>