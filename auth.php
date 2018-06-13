<?php 
include 'dbcon.php';
session_start();


 //To store errors
//$form_data = array(); //Pass back the data to `form.php`
 //$_POST['email'] = "devx.kuldeep@gmail.com";
// $_POST['pass'] = "Kul@1234";
//$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
// foreach($stmt as $r){	
	// $form_data['login']=$r['email'];
// }





/* Validate the form on the server side */
if (empty($_POST['email'])) { //email cannot be empty
    $errors['email'] = 'email cannot be blank';
	
}
if (empty($_POST['pass'])) { //email cannot be empty
	$errors['pass'] = 'Password cannot be blank';
}
if(!empty($_POST['email']) && !empty($_POST['pass'])){
	$stmt = $conn->prepare("SELECT * FROM user WHERE email=:email and password =:password and isDeleted=0"); 
    // $stmt->execute(array(
	// ':email' => $_POST['email'],
	// ':password' => $_POST['pass']	
	// ));
	//$STH - $DBH -> prepare( "select figure from table1 ORDER BY x LIMIT 1" );
	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':password', $_POST['pass']);
	$stmt->execute();
	$result = $stmt -> fetch();
	
	//$count = $result->rowCount();
	if(!$result){
		$errors['loginerr'] = "Invalid useremail or password.";	
	}
	else{
		 $userRoles = $conn->prepare("SELECT user.id,user.email,role.role FROM ((`userrole` INNER JOIN `user` ON userrole.uId=user.id)INNER JOIN `role` ON userrole.roleId=role.id) WHERE user.id =:id");
         $userRoles->bindParam(':id', $result['id']);		
		 $userRoles->execute();
		 $role = $userRoles->fetchAll(PDO::FETCH_ASSOC);		
		 $form_data['loginok']=$role;
		 //return $userRole['role'];
		 $_SESSION["role"] = $role;
		 $_SESSION["email"] = $_POST['email'];
	
	}	
}

if (!empty($errors)) { //If errors in validation
    $form_data['success'] = false;
    $form_data['errors']  = $errors;
}
else { //If not, process the form, and return true on success
    $form_data['success'] = true;	
}

//Return the data back to form.php
echo json_encode($form_data);



 ?> 