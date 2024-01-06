<?php
include_once __DIR__."/../controller/projectController.php";
$batch_id=$_POST['id'];
$proj_con=new ProjectController();
$trainees=$proj_con->getTraineesByBatch($batch_id);
$html="";
$html.="<div class='row my-3'>";
$html.="<div class='col-md-8'>";		
$html.="<select name='trainee[]' class='form-select'>";
foreach($trainees as $trainee)
{
    $html.="<option value='".$trainee['tid']."'>".$trainee['tname']."</option>";
}
$html.="</select>";
$html.="</div>";
$html.="<div class='col-md-3'> <button class='btn btn-danger'>Remove</button></div>";
$html.="</div>";
echo $html;

?>