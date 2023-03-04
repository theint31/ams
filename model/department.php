<?php 
    include_once 'includes/db.php';


    class Department{
    public function getDepartmentList(){
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "select * from department";

        $statement=$this->connection->prepare($sql);
        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function insertDepartmentList($name,$phone,$email){
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "insert into department (dept_name,dept_ph,dept_email) values (:name,:phone,:email)";

        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":name",$name);
        $statement->bindParam(":phone",$phone);
        $statement->bindParam(":email",$email);

        if($statement->execute())
        return true;
        else
        return false;

    }

    public function viewDepartmentList($id){
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "select * from department where id=:id";

        $statement= $this->connection->prepare($sql);
        $statement->bindParam(":id",$id);

        $statement->execute();
        $results = $statement->fetch(PDO::FETCH_NUM);
        return $results;
    }

    public function editDepartmentList($name,$phone,$email,$id){
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "update department set dept_name=:name, dept_ph=:phone, dept_email=:email where id=:id";

        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":name",$name);
        $statement->bindParam(":phone",$phone);
        $statement->bindParam(":email",$email);
        $statement->bindParam(":id",$id);

        if($statement->execute())
        return true;
        else 
        return false;
        
    }
    public function deleteDepartment($id){
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "delete from department where id=:id";

        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":id",$id);
        if($statement->execute())
        return true;
        else 
        return false;
    }
}
?>