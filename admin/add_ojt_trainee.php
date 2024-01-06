<?php
include_once __DIR__. '/../layouts/sidebar.php';
include_once __DIR__.'/../controller/projectController.php';

$pid=$_GET['id'];
$proj_con=new ProjectController();
$project=$proj_con->getProject($pid);

$batch_id=$project['bid'];
$trainees=$proj_con->getTraineesByBatch($batch_id);
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New Course</strong></h1>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Project Title <?php echo $project['title'];?></p>
                            <p>Start Date <?php echo $project['start_date'];?></p>
                        </div>
                        <div class="col-md-6">
                            <p>Batch Name : <?php echo $project['name'];?></p>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method='post' enctype="multipart/form-data">
                                
                                <div class="rows">
                                <div class='row my-3'>
                                    <div class="col-md-8">
                                        
                                        <select name="trainee[]" id="" class='form-select'>
                                            <?php
                                            foreach($trainees as $trainee)
                                            {
                                                echo "<option value=".$trainee['tid'].">".$trainee['tname']."</option>";
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-4" id="<?php echo $batch_id;?>">
                                        <button class='btn btn-primary btn_add'>Add More +</button>
                                    </div>
                                    
                                </div>
                                </div>
                                
                               
                                <div class='mt-3'>
                                    <button class='btn btn-dark' name='submit'>Add</button>
                                </div>
                            </form>
                        </div>
                    </div>

					
				</div>
			</main>


<?php
include_once __DIR__.'/../layouts/app_footer.php';
?>