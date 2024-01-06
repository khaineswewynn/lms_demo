<?php
include_once __DIR__.'/../model/batch.php';

class BatchController extends Batch{

public function getBatches()
{
    return $this->getBatchList();
}

public function batchPerYear()
{
    return $this->getBatchPerYear();
}

}


?>