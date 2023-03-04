<?php
include_once 'includes/db.php';
class LeaveType{
    public function getAllLeaveType(){
            //connection
            $this->cont = Database::connect();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //write sql statement
            $sql = "select * from leave_type";

            //prepare statement
            $statement = $this->cont->prepare($sql);


            //execution
            $statement->execute();


            //fetch result
            $result = $statement->FetchAll(PDO::FETCH_ASSOC);
            return $result;

    }
    public function getLeaveType($id){
        //connection
        $this->cont = Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //write sql statement
        $sql = "select * from leave_type where id= :id";

        //prepare statemnet
        $statement = $this->cont->prepare($sql);

        //bind
        $statement->bindParam(":id",$id);


        //excecution
        $statement->execute();

        //fetch result
        $result = $statement->FetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateLeaveType($type,$id){
        //connection
        $this->cont = Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        //sql
        $sql = "update leave_type set type = :type where id = :id ";

        //prepare statement
        $statement = $this->cont->prepare($sql);

        //bind
        $statement->bindParam(":type",$type);
        $statement->bindParam(":id",$id);

        //execute
        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteLeaveType($id){
        //connection
        $this->cont = Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //sql
        $sql = "delete from leave_type where id = :id";

        //prepare statement
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


    public function addLeaveType($type){
        //connection
        $this->cont = Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //sql
        $sql = "insert into leave_type(type) values(:type)";

        //prepare statement
        $statement = $this->cont->prepare($sql);

        //bind
        $statement->bindParam(":type",$type);

        //execute
        if($statement->execute())
        return true;
        else 
        return false;

    }
}
?>