<?php

include_once __DIR__.'/../model/project.php';

class ProjectController extends Project{

public function getProjects()
{
    return $this->getProjectList();
}
public function getProject($pid)
{
    return $this->getProjectInfo($pid);
}
public function getTraineesByBatch($bid)
{
    return $this->getTrainees($bid);
}


}


?>