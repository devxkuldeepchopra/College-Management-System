<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto:500" rel="stylesheet">
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="~/favicon.ico">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	
	<script src="js/bootbox.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/wizard"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/tables.bootstrap.css">
		<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->


<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	
</head>
<body>
    
    <div class="wrapper">

           <?php include 'sideBar.php'; ?>

        <section class="contact-wrapper">
            <article class="top-head">
                <div class="row">
                    <div class="col-xs-2">
                        <div class="mobile-menu">
                            <i class="fa fa-bars"></i>
                        </div>
                        <div class="desktop-menu">
                            <i class="fa fa-bars"></i>
                        </div>
                    </div>
                    <div class="col-xs-10">
                        <ul>
                            <li class="notifications">
                                <a href="#">
                                    <i class="fa fa-user"  data-toggle="tooltip" title="Notification" data-placement="bottom"></i> <span id="emailID" data-val="<?php echo $_SESSION['email'];?>"><?php echo $_SESSION['email'];?></span>
                                </a>
                            </li>
                            <li class="notifications">
                                <a href="#">
                                    <i class="fa fa-bell"
                                       data-toggle="tooltip" title="Notification" data-placement="bottom"></i>
                                    
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-cog" data-toggle="tooltip" title="Settings" data-placement="bottom"></i><span class="caret caret-left"></span></a>
                                <ul class="dropdown-menu">
									<li><a href="setting.php">Setting</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </article>
                        
                       
       