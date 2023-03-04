<?php 
    include_once "includes/db.php";

    class Position{
        public function getPositionList(){
            $this->connection = Database::connect();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "select position.id,position_name,department.dept_name FROM position JOIN department WHERE position.dept_id=department.id";

            $statement = $this->connection->prepare($sql);

            $statement->execute();

            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }

        public function insertPositionList($position,$dept){
            $this->connection = Database::connect();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "insert into position (position_name,dept_id) values (:position,:dept)";

            $statement=$this->connection->prepare($sql);

            $statement->bindParam(":position",$position);
            $statement->bindParam(":dept",$dept);

            if($statement->execute())
            return true;
            else
            return false;
        }
        public function viewPositionList($id){
            $this->connection = Database::connect();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "select position_name,department.dept_name,position.dept_id FROM position JOIN department ON position.dept_id=department.id and position.id=:id";

            $statement=$this->connection->prepare($sql);
            $statement->bindParam(":id",$id);

            $statement->execute();
            $results = $statement->fetch(PDO::FETCH_ASSOC);
            return $results;
        }

        public function editPositionList($position,$dept,$id){
            $this->connection = Database::connect();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "update position set position.position_name=:position,position.dept_id=:dept WHERE position.id=:id";

            $statement = $this->connection->prepare($sql);

            $statement->bindParam(":position",$position);
            $statement->bindParam(":dept",$dept);
            $statement->bindParam(":id",$id);

            if($statement->execute()){
                return true;
            }else
            return false;
        }
        public function deletePosition($id){
            $this->connection = Database::connect();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "delete from position where id=:id";

            $statement=$this->connection->prepare($sql);

            $statement->bindParam(":id",$id);
            if($statement->execute())
            return true;
            else 
            return false;
        }
    }
?>