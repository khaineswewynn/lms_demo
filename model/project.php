<?php
include_once __DIR__.'/../vendor/db/db.php';
class Project{
    public function getProjectList()
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select project.id as id,project.title as title,project.description as desp, project.start_date as date,batch.name as bname from project join batch where project.batch_id=batch.id";
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

    public function getProjectInfo($pid)
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select project.*,batch.id as bid, batch.name 
        from project join batch where project.id=:id and project.batch_id=batch.id";
        $statement=$con->prepare($sql);
        $statement->bindParam(":id",$pid);
        //3.sql excute
        if($statement->execute())
        {
            //4. result
            //data fetch()=> one row, fetchAll() => multiple rows
            $result=$statement->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function getTrainees($bid)
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select trainee_course.trainee_id as tid,trainee.name as tname 
        from trainee_course join trainee 
        where trainee_course.trainee_id=trainee.id 
        and trainee_course.batch_id=:bid";
        $statement=$con->prepare($sql);
        $statement->bindParam(":bid",$bid);
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