<?php 
    include_once 'includes/db.php';


    class PublicHoliday{
    public function getPublicholidaysList(){
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "select public_holidays_assignment.id,public_holidays_assignment.date,public_holidays_assignment.day,public_holidays.name from public_holidays_assignment join public_holidays on public_holidays_assignment.name_id=public_holidays.id";

        $statement=$this->connection->prepare($sql);
        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function insertPublicholidaysList($date,$day,$name){
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "insert into public_holidays_assignment (date,day,name_id) values (:date,:day,:name_id)";

        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":date",$date);
        $statement->bindParam(":day",$day);
        $statement->bindParam(":name_id",$name);

        if($statement->execute())
        return true;
        else
        return false;

    }

    public function viewPublicholidaysList($id){
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "select  date,day,public_holidays.name,public_holidays_assignment.id from public_holidays_assignment join public_holidays on public_holidays_assignment.name_id=public_holidays.id where public_holidays_assignment.id=:id";

        $statement= $this->connection->prepare($sql);
        $statement->bindParam(":id",$id);

        $statement->execute();
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    public function editPublicholidays($date,$day,$name,$id){
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "update public_holidays_assignment set date=:date, day=:day, name_id=:name_id where id=:id";

        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":date",$date);
        $statement->bindParam(":day",$day);
        $statement->bindParam(":name_id",$name);
        $statement->bindParam(":id",$id);

        if($statement->execute())
        return true;
        else 
        return false;
        
    }
}
?>