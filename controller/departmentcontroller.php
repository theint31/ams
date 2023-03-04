<?php 
    include_once 'model/department.php';

    class DepartmentController extends Department{
        public function getDepartments(){
            $results = $this->getDepartmentList();
            return $results;
        }

        public function insertDepartment($name,$phone,$email){
            $results = $this->insertDepartmentList($name,$phone,$email);
            return $results;
        }

        public function viewDepartment($id){
            $results = $this->viewDepartmentList($id);
            return $results;
        }


        public function editDepartment($name,$phone,$email,$id){
            $results = $this->editDepartmentList($name,$phone,$email,$id);
            return $results;
        }
        public function deleteDept($id){
            $results = $this->deleteDepartment($id);
            return $results;
        }
   }
?>