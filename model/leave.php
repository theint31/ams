<?php
include_once "includes/db.php";
class Leave{
    public function getAllLeave(){
         //connection
         $this->cont = Database::connect();
         $this->cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         //write sql statement
         $sql = "select employee.emp_name,leave_type.type,start_date,end_date,check_leave.id from check_leave join employee join leave_type where check_leave.emp_id = employee.id and check_leave.leave_type_id = leave_type.id";

         //prepare statement
         $statement = $this->cont->prepare($sql);


         //execution
         $statement->execute();


         //fetch result
         $result = $statement->FetchAll(PDO::FETCH_ASSOC);
         return $result;
    }

    public function getLeave($id){
        //connection
        $this->cont = Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //write sql statement
        $sql = "select employee.emp_name,leave_type.type,start_date,end_date,check_leave.emp_id,check_leave.leave_type_id from check_leave  JOIN employee ON check_leave.emp_id = employee.id JOIN leave_type ON check_leave.leave_type_id = leave_type.id where check_leave.id = :id";

        //prepare statemnet
        $statement = $this->cont->prepare($sql);

        //bind
        $statement->bindParam(":id",$id);


        //excecution
        $statement->execute();

        //fetch result
        $result = $statement->Fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateLeave($empName,$leaveType,$start_date,$end_date,$id){
        //1.connection
        $this->cont = Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //sql
        
        $sql = "update check_leave set emp_id = :empName, leave_type_id = :leaveType, start_date = :start_date, end_date = :end_date where id = :id";

        //prepare statement
        $statement = $this->cont->prepare($sql);


        //bind
        $statement->bindParam(":empName",$empName);
        $statement->bindParam(":leaveType",$leaveType);
        $statement->bindParam(":start_date",$start_date);
        $statement->bindParam(":end_date",$end_date);
        $statement->bindParam(":id",$id);

        //5.execute
        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function insertLeaves($empName,$leaveType,$startDate,$endDate){
        //connection
        $this->cont = Database::connect();

        //sql
        $sql = "insert into check_leave(emp_id,leave_type_id,start_date,end_date) values(:empName,:leaveType,:startDate,:endDate)";

        //prepare
        $statement = $this->cont->prepare($sql);

        //bind
        $statement->bindParam(":empName",$empName);
        $statement->bindParam(":leaveType",$leaveType);
        $statement->bindParam(":startDate",$startDate);
        $statement->bindParam(":endDate",$endDate);

        //execute
        if($statement->execute()){
            return true;
        }else{
            return false;
        }


    }
    public function removeLeave($id){
        //connection
        $this->cont = Database::connect();

        //sql
        $sql = "delete from check_leave where id = :id";

        //prepare
        $statement = $this->cont->prepare($sql);

        //bind
        $statement->bindParam(":id",$id);
        

        //execute
        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }
}

?>