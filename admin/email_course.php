<?php

include_once __DIR__.'/../controller/courseController.php';

$id=$_GET['id'];
$course_controller=new CourseController();
$status=$course_controller->mailCourse($id);
if($status==true)
{
    $message=3;
    echo "<script>location.href='course.php?status=$message'</script>";
}
?>