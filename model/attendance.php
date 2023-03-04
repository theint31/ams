<?php
include_once 'includes/db.php';
class Attendance{
    public function getAttendanceLists(){
            //connection
            $this->cont = Database::connect();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //write sql statement
            $sql = "select employee.emp_name,shift_type.shift_name,date,attendance.id from attendance join employee join shift_type where attendance.emp_id = employee.id and attendance.shift_type_id = shift_type.id";

            //prepare statement
            $statement = $this->cont->prepare($sql);


            //execution
            $statement->execute();


            //fetch result
            $result = $statement->FetchAll(PDO::FETCH_ASSOC);
            return $result;

    }
    public function getAttendanceList($id){
        //conncection
        $this->cont = Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        //write sql
        $sql = "select employee.emp_name,shift_type.shift_name,date,attendance.emp_id,attendance.shift_type_id from attendance  JOIN employee ON attendance.emp_id = employee.id JOIN shift_type ON attendance.shift_type_id = shift_type.id where attendance.id = :id";

        //prepare statement
        $statement = $this->cont->prepare($sql);

        //bind
        $statement->bindParam(":id",$id);

        //execute
        $statement->execute();

        //fetch
        $result = $statement->Fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }
    public function updateAttendanceList($empName,$date,$shift_type,$id){
        //connection
        $this->cont = Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //write sql
        $sql = "update attendance set emp_id = :empName, date = :date, shift_type_id = :shift_type where id = :id";

       
        //prepare statement
        $statement = $this->cont->prepare($sql);


        //bind
        $statement->bindParam(":empName",$empName);
        $statement->bindParam(":date",$date);
        $statement->bindParam(":shift_type",$shift_type);
        $statement->bindParam(":id",$id);

        //5.execute
        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function insertAttendance($empName,$date,$shift_type){
        //conncection
        $this->cont = Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

        //sql
        $sql = "insert into attendance(emp_id,date,shift_type_id) values (:empName,:date,:shift_type)";

        //prepare statement
        $statement = $this->cont->prepare($sql);


        //bind
        $statement->bindParam(":empName",$empName);
        $statement->bindParam(":date",$date);
        $statement->bindParam(":shift_type",$shift_type);

        //execute
        if($statement->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function removeAttendance($id){
        //connection
        $this->cont = Database::connect();
        
        //sql
        $sql = "delete from attendance where id = :id";

        //prepare
        $statement = $this->cont->prepare($sql);

        //bind
        $statement->bindParam("id",$id);

        //execute
        if($statement->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function filterAttendance($name,$date){
        //connection
        $this->cont = Database::connect();

        $name = '%'.$name.'%';

        //sql
        $sql = "select employee.emp_name,attendance.date,shift_type.shift_name from attendance join employee on attendance.emp_id = employee.id join shift_type on shift_type.id = attendance.shift_type_id where employee.emp_name like :name and attendance.date =:date";

        //prepare
        $statement = $this->cont->prepare($sql);

        //bind
        $statement->bindParam("name",$name);
        $statement->bindParam("date",$date);

        //execute
        $statement->execute();

        //fetch
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function retrieveAbsenceWihtLeave(){
        //connection
        $this->cont = Database::connect();

        //sql
        $sql = "select employee.emp_name, check_leave.start_date, check_leave.end_date,check_leave.id from check_leave join employee on check_leave.emp_id = employee.id";

        //prepare
        $statement = $this->cont->prepare($sql);

        //execute
        $statement->execute();

        //fetch
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function filterAbsenceWithDate($startDate,$endDate){
        //connection
        $this->cont = Database::connect();

        //sql
        $sql = "select employee.emp_name, check_leave.start_date, check_leave.end_date,check_leave.id from check_leave join employee on check_leave.emp_id = employee.id where check_leave.start_date >=:start_date and check_leave.end_date <= :end_date";


        //prepare
        $statement = $this->cont->prepare($sql);

        //bind
        $statement->bindParam("start_date",$startDate);
        $statement->bindParam("end_date",$endDate);

        //execute
        $statement->execute();

        //fetch
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function showAbsenceWithLeave($id){
        //connection
        $this->cont = Database::connect();

        //sql
        $sql = "select employee.emp_name, check_leave.start_date, check_leave.end_date,check_leave.id from check_leave join employee on check_leave.emp_id = employee.id where check_leave.id = :id";

        //prepare
        $statement = $this->cont->prepare($sql);

        //bind
        $statement->bindParam(":id",$id);

        //execute
        $statement->execute();
        //fetch
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function retrieveAbsenceWithoutLeaves($todayDate){
        //connection
        $this->cont = Database::connect();

        //sql
        $sql = "select count(employee.id) as 'sum_of_emps',employee.emp_name FROM employee
        WHERE
             employee.id IN(
                SELECT emp_id FROM shift_assignment WHERE shift_assignment.start_date <= :todayDate AND shift_assignment.end_date>= :todayDate) AND
                employee.id NOT IN(
                SELECT emp_id FROM attendance WHERE attendance.date = :todayDate ) AND
                employee.id NOT IN(
                SELECT emp_id FROM check_leave WHERE check_leave.start_date<= :todayDate AND check_leave.end_date >= :todayDate)";

        //prepare
        $statement= $this->cont->prepare($sql);

        //bind
        $statement->bindParam(":todayDate",$todayDate);

        //execute
        $statement->execute();

        //fetch
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function retrieveAbsenceWithoutLeaves1($todayDate){
        //connection
        $this->cont = Database::connect();

        //sql
        $sql = "select employee.emp_name FROM employee
        WHERE
             employee.id IN(
                SELECT emp_id FROM shift_assignment WHERE shift_assignment.start_date <= :todayDate AND shift_assignment.end_date>= :todayDate) AND
                employee.id NOT IN(
                SELECT emp_id FROM attendance WHERE attendance.date = :todayDate ) AND
                employee.id NOT IN(
                SELECT emp_id FROM check_leave WHERE check_leave.start_date<= :todayDate AND check_leave.end_date >= :todayDate)";

        //prepare
        $statement= $this->cont->prepare($sql);

        //bind
        $statement->bindParam(":todayDate",$todayDate);

        //execute
        $statement->execute();

        //fetch
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function filterAbsenceWithoutLeaveWithName($name,$date){
        //connection
        $this->cont = Database::connect();

        //sql
        $sql = "select employee.emp_name FROM employee
        WHERE
             employee.id IN(
                SELECT emp_id FROM shift_assignment WHERE shift_assignment.start_date <= :todayDate AND shift_assignment.end_date>= :todayDate) AND
                employee.id NOT IN(
                SELECT emp_id FROM attendance WHERE attendance.date = :todayDate ) AND
                employee.id NOT IN(
                SELECT emp_id FROM check_leave WHERE check_leave.start_date<= :todayDate AND check_leave.end_date >= :todayDate)
                and employee.emp_name=:name";

        //prepare
        $statement = $this->cont->prepare($sql);

        //bind
        $statement->bindParam(":name",$name);
        $statement->bindParam(":todayDate",$date);
        


        //execute
        $statement->execute();

        //fetch
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function selectNoOfEmpsByDates($date){
        //connection
        $this->cont = Database::connect();

        //sql
        $sql = "select COUNT(emp_id) as 'No_of_Emps',attendance.date FROM attendance 
        JOIN employee ON employee.id = attendance.emp_id 
        WHERE attendance.date= :date";

        //prepare
        $statement= $this->cont->prepare($sql);

        //bind
        $statement->bindParam(":date",$date);

        //execute
        $statement->execute();

        //fetch
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function additionOfEmpsByDates($startDate,$endDate){
        //connection
        $this->cont = Database::connect();

        //sql
        $sql = "select COUNT(emp_id) as 'sum_of_emps' 
        FROM attendance 
        JOIN employee 
        ON attendance.emp_id = employee.id
        WHERE attendance.date >=:startDate AND attendance.date<= :endDate";

        //prepare
        $statement= $this->cont->prepare($sql);

        //bind
        $statement->bindParam(":startDate",$startDate);
        $statement->bindParam(":endDate",$endDate);

        //execute
        $statement->execute();

        //fetch
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function additionOfEmpsLeavesByDates($startDate,$endDate){
        //connection
        $this->cont = Database::connect();

        //sql
        $sql = "select COUNT(emp_id) as 'sum_of_emps'
        FROM check_leave 
        WHERE check_leave.start_date>=:startDate AND check_leave.end_date<=:endDate";

        //prepare
        $statement= $this->cont->prepare($sql);

        //bind
        $statement->bindParam(":startDate",$startDate);
        $statement->bindParam(":endDate",$endDate);

        //execute
        $statement->execute();

        //fetch
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}
?>