<?php 
session_start();
require_once('class.admin.php');
include 'dbcon.php';

$form_data['email']=$_SESSION["email"];

if (isset($_POST["action"])) {
    $action=$_POST["action"];
}
if (isset($_GET['action'])) { 
 $action = $_GET['action']; 
}
if($_SESSION["admin"]){
	// class object
	 $admin = new Admin($conn);
	//action for js method call
	//$action = 'getPosition';
	if ($action == 'getPosition') {
		//get data form db
		$form_data['position'] = $admin->getPosition();
		 echo json_encode($form_data);
	}	
	if ($action == 'addStaff') {
		$aid="1";
	 $form_data['data']= $admin->addStaff($_POST['poschk'],$_POST['name'],$_POST['email'],$_POST['pass'],$aid);
	 echo json_encode($form_data);	
	}
	if ($action == 'getStaff') {
		
	 $form_datas= $admin->getStaff();
	 echo json_encode($form_datas);	
	}
	if ($action == 'deleteStaff') {		
	 $form_datas= $admin->deleteStaff($_POST['staffId']);
	 echo json_encode($form_datas);	
	}
	if ($action == 'getBranch') {
	 $data= $admin->getBranch();
	 echo json_encode($data);	
	}
	if ($action == 'getBranchByEmail') {
		//$_POST['email']="kuldeepchopraofficial@gmail.com";
	 $data= $admin->getBranchByEmail($_POST['emailId']);
	 echo json_encode($data);	
	}	
	if ($action == 'LectureList') {
		
	 $data= $admin->LectureList($_POST['id']);
	 echo json_encode($data);	
	}
	if ($action == 'teacherLecture') {
		
	 $data= $admin->teacherLecture($_POST['emailId']);
	 echo json_encode($data);	
	}
	if ($action == 'LectureSchedule') {
		
	 $data= $admin->LectureSchedule($_POST['id']);
	 echo json_encode($data);	
	}
	
	if ($action == 'addBranchCourse') {
		//$_POST['branch'] = '[{"bname":"computer science","courses":[{"course":"Pgdca"},{"course":"dca"}]}]';
	 $data = $admin->addBranchCourse($_POST['branch']);
	 echo json_encode($data);	
	}
	if ($action == 'getCourse') {
	 $form_data['result']= $admin->getCourse();
	 echo json_encode($form_data);	
	}
	if ($action == 'getTeacher') {
	 $form_data['result']= $admin->getTeacher();
	 echo json_encode($form_data);	
	}
	if ($action == 'getSubject') {
	 $data= $admin->getSubject();
	 echo json_encode($data);	
	}
	if ($action == 'addSubject') {
	 $data= $admin->addSubject($_POST['subject']);
	 echo json_encode($data);	
	}
	if ($action == 'getStudent') {
	 $data= $admin->getStudent();
	 echo json_encode($data);	
	}	
	if ($action == 'addStudent') {
	 $form_data['data']= $admin->addStudent($_POST['name'],$_POST['rollno'],$_POST['email'],$_POST['branch'],$_POST['course'],$_POST['sem']);
	 echo json_encode($form_data);	
	}
	if ($action == 'addLecture') {
	$form_data['result']= $admin->addLecture($_POST['tid'],$_POST['lecture']);
	//$lecture = json_decode($_POST['lecture'], true);
	//$form_data['result']= $lecture[0]['course'] ;
	 echo json_encode($form_data);	
	}
	
	
}


?>