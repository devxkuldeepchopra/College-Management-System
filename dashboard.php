<?php 
session_start();

$admin=false; $hod=false;$Teacher=false;
foreach( $_SESSION["role"] as $v){	  	
if($v['role']=='Admin'){
	$admin=true;
}
if($v['role']=='Hod'){
	$hod=true;	
}
if($v['role']=='Teacher'){
	$Teacher=true;	
}	
}

if($admin){
	$_SESSION['admin']= 'Admin';	
	include 'adminDashboard.php';
}
if($hod){
	$_SESSION['admin']= 'Hod';	
	include 'lecture.php';
}
if($Teacher){
	$_SESSION['admin']= 'Teacher';	
	include 'lectureList.php';
}	  


?>