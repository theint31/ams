<?php 
    include_once 'includes/db.php';
    //echo "mmodel";
    class ShiftView{
        
        public function retrieveShiftView($month,$year){
            echo "within function";
            $this->connection=Database::connect();
           
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "select shift_assignment.emp_id,employee.emp_name,shift_assignment.start_date,shift_assignment.end_date, shift_type.shift_name 
            FROM shift_assignment 
            JOIN employee on shift_assignment.emp_id=employee.id 
            JOIN shift_type on shift_assignment.shift_type_id = shift_type.id
            WHERE MONTH(shift_assignment.start_date) = :month AND 
            YEAR(shift_assignment.start_date) = :year";

            $statement=$this->connection->prepare($sql);
            
            $statement->bindParam(":month",$month);
            $statement->bindParam(":year",$year);
            
            $statement->execute();
            
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;

            
        }
    }
?>