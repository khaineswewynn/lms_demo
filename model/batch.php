<?php

include_once __DIR__.'/../vendor/db/db.php';

class Batch{
    public function getBatchList()
    {
         //1.db connection
         $con=Database::connect();
         $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         //2.write sql
         $sql="select * from batch";
         $statement=$con->prepare($sql);
         //3.sql excute
         if($statement->execute())
         {
             //4. result
             //data fetch()=> one row, fetchAll() => multiple rows
             $result=$statement->fetchAll(PDO::FETCH_ASSOC);
         }
         return $result;
    }
    public function getBatchPerYear()
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select year(start_date) as year,count(id) as total
        from batch
        group by year(start_date)";
        $statement=$con->prepare($sql);
        //3.sql excute
        if($statement->execute())
        {
            //4. result
            //data fetch()=> one row, fetchAll() => multiple rows
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
}


?>