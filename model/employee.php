<?php 
    include_once ("includes/db.php");

    class Employee{
        public function getEmployeeList(){
            $this->connection = Database::connect();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "select * from employee";

            $statement = $this->connection->prepare($sql);

            $statement->execute();

            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }

        // public function insertEmployeeList($name,$nrc,$phone,$email,$dob,$gender,$address,$dept,$position){
        //     $this->connection = Database::connect();
        //     $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //     $sql = "insert into employee (emp_name,nrc,emp_ph,emp_email,dob,gender,address,dept_id,position_id 
        //     values (:name,:nrc,:phone,:email,:dob,:address,:gender,:dept,:position)";

        //     $statement= $this->connection->prepare($sql);

        //     $statement->bindParam(":name",$name);
        //     $statement->bindParam(":nrc",$nrc);
        //     $statement->bindParam(":phone",$phone);
        //     $statement->bindParam(":email",$email);
        //     $statement->bindParam(":dob",$dob);
        //     $statement->bindParam(":gender",$gender);
        //     $statement->bindParam(":address",$address);   
        //     $statement->bindParam(":dept",$dept);
        //     $statement->bindParam(":position",$position);

        //     if($statement->execute()){
        //         return true;
        //     }            
        //     else{
        //         return false;
        //     }
           
        // }

    public function insertEmployeeList($name,$nrc,$phone,$email,$dob,$gender,$address,$position){
            //1. connection
      $this->connection = Database::connect();
      $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      //2. insert
      $sql = "insert into employee(emp_name,nrc,emp_ph,emp_email,dob,gender,address,position_id)
              values (:name,:nrc,:phone,:email,:dob,:gender,:address,:position)";

      $statement= $this->connection->prepare($sql);

      $statement->bindParam(":name",$name);
      $statement->bindParam(":nrc",$nrc);
      $statement->bindParam(":phone",$phone);
      $statement->bindParam(":email",$email);
      $statement->bindParam(":dob",$dob);
      $statement->bindParam(":gender",$gender);
      $statement->bindParam(":address",$address);
      
      $statement->bindParam(":position",$position);
     
      
      if($statement->execute())
      return true;
      else 
      return false;
      }
        
        public function viewEmployeeList($id){
            $this->connection = Database::connect();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            $sql = "select employee.emp_name,employee.nrc,employee.emp_ph,employee.emp_email,
            employee.dob,employee.gender,employee.address,position.position_name,employee.position_id FROM employee JOIN position WHERE employee.position_id=position.id and employee.id=:id";

            $statement = $this->connection->prepare($sql);
            $statement->bindParam(":id",$id);

            $statement->execute();

            $results = $statement->fetch(PDO::FETCH_ASSOC);
            return $results;
        }

        public function editEmployeeList($name,$nrc,$phone,$email,$dob,$gender,$address,$position,$id){   
            $this->connection = Database::connect();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "update employee set emp_name=:name, nrc=:nrc, emp_ph=:phone, emp_email=:email, dob=:dob,gender=:gender, address=:address, position_id=:position where id=:id";

            $statement = $this->connection->prepare($sql);

            $statement->bindParam(":name",$name);
            $statement->bindParam(":nrc",$nrc);
            $statement->bindParam(":phone",$phone);
            $statement->bindParam(":email",$email);
            $statement->bindParam(":dob",$dob);
            $statement->bindParam(":gender",$gender);
            $statement->bindParam(":address",$address);
            
            $statement->bindParam(":position",$position);
            $statement->bindParam(":id",$id);

            if($statement->execute())
            return true;
            else 
            return false;
        }
        public function deleteEmployee($id){
            $this->connection = Database::connect();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "delete from employee where id=:id";

            $statement=$this->connection->prepare($sql);

            $statement->bindParam(":id",$id);
            if($statement->execute())
            return true;
            else 
            return false;
        }
    }
?>