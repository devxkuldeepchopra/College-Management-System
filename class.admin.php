<?php 

class Admin {
	private $conn;
	  public function __construct($conn) {
	$this->conn = $conn;
  }
	public function getPosition(){		
		 $getPosition = $this->conn->prepare("SELECT * FROM `position`");
        // $getPosition->bindParam(':id', $result['id']);		
		  $getPosition->execute();
		// $Position = $getPosition->fetchAll();
		// echo json_encode($result);
		 $results = $getPosition->fetchAll(PDO::FETCH_ASSOC);
        return $results;
		
	}
	public function getStaff(){
		$getStaff = $this->conn->prepare("SELECT `staff`.`id`,`staff`.`name`,`staff`.`email`,`staff`.`password`,`position`.`name`AS Designation FROM ((`staff` INNER JOIN `staffposition` ON `staffposition`.`staffId` = `staff`.`id`)INNER JOIN `position` ON `position`.`id`=`staffposition`.`positionId`)");
		$getStaff->execute();
		$data = $getStaff->fetchAll(PDO::FETCH_ASSOC);
		//echo $result;
		// $data = json_decode($result, true);
		 
$results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];
        return $results;
	}
	public function getStudent(){
		$getStudent = $this->conn->prepare("SELECT `student`.`name`,`student`.`rollno`,`student`.`email`,`branch`.`name` AS Branch, `course`.`name` AS course FROM ((((`student` INNER JOIN `studentsem` ON `student`.`id` = `studentsem`.`studentId`)INNER JOIN `sbranchcourse` ON `student`.`id`=`sbranchcourse`.`studentId`)INNER JOIN `course` ON `course`.`id`=`sbranchcourse`.`courseId`)INNER JOIN `branch` ON `branch`.`id`=`sbranchcourse`.`branchId`)");
		$getStudent->execute();
		$data = $getStudent->fetchAll(PDO::FETCH_ASSOC);
		//echo $result;
		// $data = json_decode($result, true);
		 
$results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];
        return $results;
	}	
	public function addStaff($data,$n,$e,$p,$a){
		$addStaff = $this->conn->prepare("INSERT INTO `staff` (`name`, `email`, `password`,`createdBy`) VALUES (:name, :email, :pass, '1');");
		$addStaff->bindParam(':name', $n);
		$addStaff->bindParam(':email', $e);
		$addStaff->bindParam(':pass', $p);
		$addStaff->execute();
		//$result = $addStaff->fetch(PDO::FETCH_ASSOC); 
		// $addStaff->exec();
		//$staffId = $addStaff->lastInsertId();
		$staffId = $this->conn->lastInsertId();	
		// return $staffId; 
		//$a=array();
		$id="";
		foreach($data as $v)
		{
			if($v['id']=='1')	{
				$ckdean = $this->conn->prepare("SELECT * FROM `staffposition` WHERE `positionId`=:id"); 					
					$ckdean->bindParam(':id', $v['id']);					
					$ckdean->execute();
					$result = $ckdean -> fetch();
					
				if($result){ return "false";}	
				
			}
				if($v['id']=='2'){
					$ckbc = $this->conn->prepare("SELECT * FROM `staffposition` WHERE `positionId`=:id"); 					
					$ckbc->bindParam(':id', $v['id']);					
					$ckbc->execute();
					$result = $ckbc -> fetch();
					
				if($result){ return "false";}
					
				}
			
				
			if($v['id']=='3'){
				
					$rid="2";
					$uid;
					$ck = $this->conn->prepare("SELECT * FROM user WHERE email=:email && isDeleted=0"); 					
					$ck->bindParam(':email', $e);					
					$ck->execute();
					$result = $ck -> fetch();
					
				if(!$result){
								
				$addHod = $this->conn->prepare("INSERT INTO `user` (`email`, `password`, `createdby`, `updatedby`) VALUES (:email,:pass,:cb,:ub)");
				$addHod->bindParam(':email', $e);
				$addHod->bindParam(':pass', $p);
				$addHod->bindParam(':cb', $a);
				$addHod->bindParam(':ub', $a);
				$addHod->execute();
				$uid = $this->conn->lastInsertId();									
				}
				if($uid){
				$addRole = $this->conn->prepare("INSERT INTO `userrole` (`uId`, `roleId`) VALUES (:uid,:rid);");
				$addRole->bindParam(':uid', $uid);
				$addRole->bindParam(':rid', $rid);
				$addRole->execute();				
				}	
			}
			if($v['id']=='4'){
					$rid="3";
					$uid;
					$stmt = $this->conn->prepare("SELECT * FROM user WHERE email=:email && isDeleted=0"); 
					$stmt->bindParam(':email', $e);
					$stmt->execute();
					$result = $stmt -> fetch();
						if(!$result){
					$addTeacher = $this->conn->prepare("INSERT INTO `user` (`email`, `password`, `createdby`, `updatedby`) VALUES (:email,:pass,:cb,:ub)");
				$addTeacher->bindParam(':email', $e);
				$addTeacher->bindParam(':pass', $p);
				$addTeacher->bindParam(':cb', $a);
				$addTeacher->bindParam(':ub', $a);
				$addTeacher->execute();
				$uid = $this->conn->lastInsertId();													
				}	
				if($uid){
				$addRole = $this->conn->prepare("INSERT INTO `userrole` (`uId`, `roleId`) VALUES (:uid,:rid);");
				$addRole->bindParam(':uid', $uid);
				$addRole->bindParam(':rid', $rid);
				$addRole->execute();					
				}
			}
				//add postion of staff				
				$addPosition = $this->conn->prepare("INSERT INTO `staffposition` (`staffId`, `positionId`) VALUES (:staffId, :posId);");
				$addPosition->bindParam(':staffId', $staffId);
				$addPosition->bindParam(':posId', $v['id']);
				$addPosition->execute();	
				$hid = $this->conn->lastInsertId();	
				
				if($v['id']=='3'){
					
				$addHodBranch = $this->conn->prepare("INSERT INTO `hodbranch` (`staffId`, `branchId`) VALUES (:hod, :branch);");
				$addHodBranch->bindParam(':hod', $staffId);
				$addHodBranch->bindParam(':branch', $v['branch']);
				$addHodBranch->execute();
				}
				if($v['id']=='4'){
				$addHodBranch = $this->conn->prepare("INSERT INTO `teacherbranch` (`staffId`, `branchId`) VALUES (:sid,:bid);");
				$addHodBranch->bindParam(':sid', $staffId);
				$addHodBranch->bindParam(':bid', $v['branch']);
				$addHodBranch->execute();
				}


				
				//return $v['id']; 
				//	$a[]=$v;	
		}	
return "true";		
	}
	
	public function getBranch(){
		$getBranch = $this->conn->prepare("SELECT * FROM `branch`");        		
		$getBranch->execute();
		$data = $getBranch->fetchAll(PDO::FETCH_ASSOC);
		$results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];
        return $results;
		 
	 }
	public function getCourse(){		 
		$getCourse = $this->conn->prepare("SELECT * FROM `course`");
		$getCourse->execute();
		$results = $getCourse->fetchAll(PDO::FETCH_ASSOC);
        return $results;		 
	 }
	public function getTeacher(){		 
		$getTeacher = $this->conn->prepare("SELECT staff.id,staff.name,staff.email FROM ((`staffposition` INNER JOIN `staff` ON `staffposition`.staffId=`staff`.id)INNER JOIN `position` ON `staffposition`.`positionId`=`position`.`id`) WHERE position.name='Teacher'");
		$getTeacher->execute();
		$results = $getTeacher->fetchAll(PDO::FETCH_ASSOC);
        return $results;		 
	}
	public function getSubject(){		 
		$getSubject = $this->conn->prepare("SELECT * FROM `subject`");
		$getSubject->execute();
		$data = $getSubject->fetchAll(PDO::FETCH_ASSOC);
       $results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];
        return $results;	 
	}
	public function addStudent($n,$r,$e,$b,$c,$s){
		$addStudent = $this->conn->prepare("INSERT INTO `student` (`name`, `rollno`, `email`) VALUES (:name, :rollno, :email);");
		$addStudent->bindParam(':name', $n);
		$addStudent->bindParam(':rollno', $r);
		$addStudent->bindParam(':email', $e);
		$addStudent->execute();
		$addStudentid = $this->conn->lastInsertId();	
				$addBC = $this->conn->prepare("INSERT INTO `sbranchcourse` (`studentId`, `branchId`, `courseId`) VALUES (:s,:b,:c);");
				$addBC->bindParam(':s', $addStudentid);
				$addBC->bindParam(':b', $b);
				$addBC->bindParam(':c', $c);
				$addBC->execute();	
				$id = $this->conn->lastInsertId();	
							$addSSem = $this->conn->prepare("INSERT INTO `studentsem` (`studentId`, `sem`) VALUES (:st,:sm);");
							$addSSem->bindParam(':st', $addStudentid);
							$addSSem->bindParam(':sm', $s);
							$addSSem->execute();	
							$sid = $this->conn->lastInsertId();	
				
return $id;	
		
	}
		public function addLecture($tid,$data){		
		$lecture = json_decode($data, true);	
// foreach ($lecture as $key => $value) {
    // echo $value["name"] . ", " . $value["gender"] . "<br>";
  // }
		foreach($lecture as $v){
		
		$addLecture = $this->conn->prepare("INSERT INTO `lecture` (`teacherId`, `courseId`, `sem`, `subjectId`) VALUES (:tid, :cid, :sem, :sid);");
		$addLecture->bindParam(':tid', $tid);
		$addLecture->bindParam(':cid', $v['course']);
		$addLecture->bindParam(':sem', $v['sem']);
		$addLecture->bindParam(':sid', $v['subject']);		
		$addLecture->execute();
		$lid = $this->conn->lastInsertId();	
		
		 foreach($v['dayTime'] as $d){
			
		$dayTime = $this->conn->prepare("INSERT INTO `lecturetimetable` (`lectureId`, `dayId`, `time`) VALUES (:lid, :day, :time);");
		$dayTime->bindParam(':lid', $lid);
		$dayTime->bindParam(':day', $d['id']);
		$dayTime->bindParam(':time', $d['time']);	
		$dayTime->execute();
		 }
       
		}		
		 return $lid;
	}
	
	public function deleteStaff($id){
		$deleteStaffPos = $this->conn->prepare("DELETE FROM `staffposition` WHERE `staffposition`.`staffId` = :id;");
		$deleteStaffPos->bindParam(':id', $id);
		$deleteStaffPos->execute();
		$deleteSLec= $this->conn->prepare("DELETE FROM `lecture` WHERE `lecture`.`teacherId` = :tid;");
		$deleteSLec->bindParam(':tid', $id);
		$deleteSLec->execute();
				$deletehodB = $this->conn->prepare("DELETE FROM `hodbranch` WHERE `hodbranch`.`staffid` = :id");
		$deletehodB->bindParam(':id', $id);
		$deletehodB->execute();
		$deleteteachB= $this->conn->prepare("DELETE FROM `teacherbranch` WHERE `teacherbranch`.`id` = :id");
		$deleteteachB->bindParam(':id', $id);
		$deleteteachB->execute();
		
		
		$getstaffmail= $this->conn->prepare("SELECT id,email FROM `staff` WHERE id=:eid;");
		$getstaffmail->bindParam(':eid', $id);
		$getstaffmail->execute();
		$result = $getstaffmail->fetchAll(PDO::FETCH_ASSOC);
		if($result){
        $email = $result[0]['email'];
		
		$getstaffmail= $this->conn->prepare("SELECT id FROM `user` WHERE email=:email;");
		$getstaffmail->bindParam(':email', $email);
		$getstaffmail->execute();
		$result = $getstaffmail->fetchAll(PDO::FETCH_ASSOC);
		 $uid = $result[0]['id'];
		
		$deleteUserRole = $this->conn->prepare("DELETE FROM `userrole` WHERE `userrole`.`uId` = :uid;");
		$deleteUserRole->bindParam(':uid', $uid);
		$deleteUserRole->execute();
		
		$deleteUser = $this->conn->prepare("DELETE FROM `user` WHERE `user`.`email` = :email;");
		$deleteUser->bindParam(':email', $email);
		$deleteUser->execute();
		
		$deleteStaff = $this->conn->prepare("DELETE FROM `staff` WHERE `staff`.`id` = :sid;");
		$deleteStaff->bindParam(':sid', $id);
		$deleteStaff->execute();
		}
		return "true";
		
		//return $email['email'];
		
	}
	
	
	 public function addBranchCourse($data){
		 
		
		$branch = json_decode($data, true);	

		foreach($branch as $v){
		
		$addBranch = $this->conn->prepare("INSERT INTO `branch` (`name`) VALUES (:bname);");
		$addBranch->bindParam(':bname', $v['bname']);	
		$addBranch->execute();
		$bid = $this->conn->lastInsertId();	
		
		 foreach($v['courses'] as $d){
			
		$addCourse = $this->conn->prepare("INSERT INTO `course` (`name`) VALUES (:course);");
		$addCourse->bindParam(':course', $d['course']);
		$addCourse->execute();
		$cid = $this->conn->lastInsertId();
		$addBranchCourse = $this->conn->prepare("INSERT INTO `branchcourse` (`branchId`, `courseId`) VALUES (:bid,:cid);");
		$addBranchCourse->bindParam(':bid', $bid);
		$addBranchCourse->bindParam(':cid', $cid);
		$addBranchCourse->execute();		
		 }
       
		}		
		 return "true";		 		 
	 }
	 public function addSubject($data){
		 
		 
		 $subject = json_decode($data, true);	

		foreach($subject as $v){
		
		$addSubject = $this->conn->prepare("INSERT INTO `subject` (`subjectName`, `subjectCode`) VALUES (:sub,:scode);");
		$addSubject->bindParam(':sub', $v['subject']);	
		$addSubject->bindParam(':scode', $v['scode']);	
		$addSubject->execute();
		$bid = $this->conn->lastInsertId();	       
		}		
		 return "true";		  
		 
	 }
	 
	 public function getBranchByEmail($e){
		$staffid = $this->conn->prepare("SELECT `branch`.`id` AS id, `branch`.`name` AS bname, `staff`.`name` AS name FROM ((`hodbranch` INNER JOIN `staff` on `staff`.`id`=`hodbranch`.`staffId`)INNER JOIN `branch` ON `hodbranch`.`branchId`=`branch`.`id`) WHERE `staff`.`email`=:email");
		$staffid->bindParam(':email',$e);	
		$staffid->execute();
		$result = $staffid->fetchAll(PDO::FETCH_ASSOC);
		if($result){
        $id = $result[0]['id']; 
		
		$getTB = $this->conn->prepare("SELECT `staff`.id,`staff`.name,`staff`.`email` FROM ((`teacherbranch` INNER JOIN `staff` ON `staff`.`id`=`teacherbranch`.`staffId`)) WHERE `teacherbranch`.`branchId`=:id or `teacherbranch`.`branchId`= 1 ");
		$getTB->bindParam(':id',$id);	
		$getTB->execute();		
		$data = $getTB->fetchAll(PDO::FETCH_ASSOC);
		 $results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];
        return $results;
		}			 
	 }
	 public function LectureList($id){
		$staffid = $this->conn->prepare("SELECT `lecture`.`id`,`course`.`name`AS cname, `lecture`.`sem`,`subject`.`subjectName`,`subject`.`subjectCode` FROM ((`lecture` INNER JOIN `course` ON `course`.`id`=`lecture`.`courseId`)INNER JOIN `subject` ON `subject`.`id`=`lecture`.`subjectId`) WHERE `lecture`.`teacherId`=:id");
		$staffid->bindParam(':id',$id);	
		$staffid->execute();
		$data = $staffid->fetchAll(PDO::FETCH_ASSOC);
		 $results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];
        return $results;
		}	
	 public function LectureSchedule($id){
		$staffid = $this->conn->prepare("SELECT `lecturetimetable`.`id`,`day`.`dayName`, `lecturetimetable`.`time` FROM `lecturetimetable` INNER JOIN `day` ON `day`.`id`=`lecturetimetable`.`dayId` WHERE `lecturetimetable`.`lectureId` = :id");
		$staffid->bindParam(':id',$id);	
		$staffid->execute();
		$data = $staffid->fetchAll(PDO::FETCH_ASSOC);
		 $results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];
        return $results;
	}		
	 public function teacherLecture($e){
		$staffid = $this->conn->prepare("SELECT * FROM `staff` WHERE `staff`.`email` =:email");
		$staffid->bindParam(':email',$e);	
		$staffid->execute();
		$result = $staffid->fetchAll(PDO::FETCH_ASSOC);
		if($result){
        $id = $result[0]['id']; 
		
		$staffid = $this->conn->prepare("SELECT `lecture`.`id`,`course`.`name`AS cname, `lecture`.`sem`,`subject`.`subjectName`,`subject`.`subjectCode` FROM ((`lecture` INNER JOIN `course` ON `course`.`id`=`lecture`.`courseId`)INNER JOIN `subject` ON `subject`.`id`=`lecture`.`subjectId`) WHERE `lecture`.`teacherId`=:id");
		$staffid->bindParam(':id',$id);	
		$staffid->execute();
		$data = $staffid->fetchAll(PDO::FETCH_ASSOC);
		 $results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];
        return $results;
		}			 
	 }	 	
	
}


?>