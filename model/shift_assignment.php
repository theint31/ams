<?php
include_once "includes/db.php";

class Shiftassign{
    public function getshfassign()
    {
        //1. pdo connection
        $pdo=Database::connect();
        //2.sql
        $sql="select employee.emp_name, shift_type.shift_name,shift_assignment.start_date,
        shift_assignment.end_date FROM shift_assignment JOIN employee on 
        shift_assignment.emp_id=employee.id JOIN shift_type ON 
        shift_assignment.shift_type_id=shift_type.id; ";
        /*SELECT employee.emp_name, shift_type.shift_name,shift_assignment.start_date,
        shift_assignment.end_date FROM shift_assignment JOIN employee on 
        shift_assignment.emp_id=employee.id JOIN shift_type ON 
        shift_assignment.shift_type_id=shift_type.id; */
        //3.sql
        $statement=$pdo->prepare($sql);
        //4.execute
        $statement->execute();
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function addshfassign($empid,$shfid,$start,$end)
    {
        //1. pdo connection
        $pdo=Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql
        $sql="insert into shift_assignment(emp_id,shift_type_id,start_date,end_date)
         values(:empid,:typeid,:start,:end)";
        //3.sql
        $statement=$pdo->prepare($sql);
        //4. Parameter Binding
        $statement->bindParam(':empid',$empid);
        $statement->bindParam(':typeid',$shfid);
        $statement->bindParam(':start',$start);
        $statement->bindParam(':end',$end);
        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function selectshiftname($name,$start_date,$end_date){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "select shift_type.id FROM shift_type JOIN shift_assignment ON 
        shift_type.id=shift_assignment.shift_type_id JOIN employee ON 
        shift_assignment.emp_id=employee.id WHERE employee.emp_name=:name AND shift_assignment.start_date=:start_date 
        AND shift_assignment.end_date=:end_date";

        $statement=$pdo->prepare($sql);

        $statement->bindParam(":name",$name);
        $statement->bindParam(":start_date",$start_date);
        $statement->bindParam(":end_date",$end_date);

        $statement->execute();
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function updateShift($start_date,$end_date,$type,$id){
        $pdo =Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "update shift_assignment set shift_assignment.start_date=:start,shift_assignment.end_date=:end',shift_type_id=shiftid WHERE shift_assignment.id=id;";

        $statement=$pdo->prepare($sql);

        $statement->bindParam(":start",$start_date);
        $statement->bindParam(":end",$end_date);
        $statement->bindParam(":shiftid",$type);
        $statement->bindParam(":id",$id);

        if($statement->execute())
            return true;
            else 
            return false;
    }

    public function selectshfassign($month,$year,$id)
    {
        //1. pdo connection
        $pdo=Database::connect();
        //2.sql
        $sql="select shift_type.shift_name,shift_assignment.start_date,shift_assignment.end_date 
        FROM shift_assignment JOIN employee on shift_assignment.emp_id=employee.id 
        JOIN shift_type ON shift_assignment.shift_type_id = shift_type.id
        WHERE MONTH(shift_assignment.start_date) =:month AND 
        YEAR(shift_assignment.start_date) = :year AND emp_id=:id;";
        
        //3.sql
        $statement=$pdo->prepare($sql);

        $statement->bindParam(":month",$month);
        $statement->bindParam(":year",$year);
        
        $statement->bindParam(":id",$id);
        //4.execute
        $statement->execute();
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function filterAttendance($name,$date){
        //connection
        $this->cont = Database::connect();

        $name = '%'.$name.'%';
        //$date ='%'.$date.'%';

        //sql
        $sql = "select employee.emp_name, shift_type.shift_name,shift_assignment.start_date,
        shift_assignment.end_date FROM shift_assignment
        JOIN employee ON shift_assignment.emp_id=employee.id 
        JOIN shift_type ON shift_assignment.shift_type_id=shift_type.id 
        WHERE employee.emp_name LIKE :name AND shift_assignment.start_date = :date";

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
    public function getShfInfo($pageno){

        $total_records_page = 10;//no of rows
        $offset = ($pageno-1) * $total_records_page;
        // 1.pdo connection
        $pdo = Database::connect();
        // 2.sql
       // $sql = "select * from shift_assignment limit $offset,$total_records_page";
        $sql ="select employee.emp_name, shift_type.shift_name,shift_assignment.start_date,
        shift_assignment.end_date FROM shift_assignment JOIN employee on 
        shift_assignment.emp_id=employee.id JOIN shift_type ON 
        shift_assignment.shift_type_id=shift_type.id limit $offset,$total_records_page";
        $statement=$pdo->prepare($sql);

        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

}

?>