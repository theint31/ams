<?php
include_once "includes/db.php";

class Shifttype{
    public function getshift()
    {
        //1. pdo connection
        $pdo=Database::connect();
        //2.sql
        $sql="select * from shift_type";
        //3.sql
        $statement=$pdo->prepare($sql);
        //4.execute
        $statement->execute();
        $results=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}
?>