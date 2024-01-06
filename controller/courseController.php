<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once __DIR__.'/../model/course.php';
include_once __DIR__.'/../vendor/PHPMailer/src/PHPMailer.php';
include_once __DIR__.'/../vendor/PHPMailer/src/SMTP.php';
include_once __DIR__.'/../vendor/PHPMailer/src/Exception.php';

class CourseController extends Course{

    public function getCourses(){
       return $this->getCourseList();
    }

    public function getTotalCourse(){
        return $this->getNumCourse();
    }
    public function addCourse($name,$cat,$outline,$image)
    {
        if($image['error']==0)
        {
            $filename=$image['name'];
            $extension=explode('.',$filename);
            $filetype=end($extension);
            $filesize=$image['size'];
            $allowed_types=['jpg','jpeg','svg','png'];
            $temp_file=$image['tmp_name'];
            if(in_array($filetype,$allowed_types))
            {
                if($filesize <= 2000000)
                {
                   
                   $timestamp=time();
                   $filename=$timestamp.$filename;                 
                    if(move_uploaded_file($temp_file,'../uploads/' .$filename))
                        return $this->addNewCourse($name,$cat,$outline,$filename);
                }
            }
        }
       
    }
    public function getCourse($id)
    {
        return $this->getCourseInfo($id);
    }
    public function editCourse($id,$name,$category,$outline)
    {
        return $this->updateCourse($id,$name,$category,$outline);
    }
    public function mailCourse($id)
    {
        $mailaddress=$this->getMail($id);

        $mailer=new PHPMailer(true);
        #Server Settings
        $mailer->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com';
        $mailer->SMTPAuth = true;
        $mailer->SMTPSecure = 'tls';   
        $mailer->Port = 587;

        $mailer->Username="khucho101@gmail.com";
        $mailer->Password="rjcbgwrpixytyatv";

        $mailer->setFrom("khaineshwewynn@gmail.com","Admin");
        $mailer->addAddress("admin@hostmm.tech","CourseName");

        $mailer->IsHTML(true);
        $mailer->Subject = "Testing for mail";
        $mailer->Body = 'testing';
   

        if($mailer->send())
            return true;
    }
}

?>