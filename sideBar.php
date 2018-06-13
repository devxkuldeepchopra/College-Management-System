
<aside class="left-sidebar">
    <i class="fa fa-bars close-menu"></i>
    <h1> <a href="@Url.Action("Index","Dashboard")"><img src="images/logo-inner.png" /></a></h1>
    <ul id="ul-naveSide">
        <li><a href="dashboard.php" class="active"><i class="glyphicon glyphicon-th"></i> &nbsp; Dashboard</a></li>
        <li><a href="staff.php"><i class="glyphicon glyphicon-stats"></i> &nbsp; Staff</a></li>
        <li><a href="student.php"><i class="glyphicon glyphicon-tasks"></i> &nbsp; Student</a></li>
        <li><a href="branch.php"><i class="glyphicon glyphicon-folder-close"></i> &nbsp; Branch</a></li>
        <li><a href="subject.php"><i class="glyphicon glyphicon-folder-open"></i> &nbsp; Subject</a></li>
        <li class="about_focus">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                <i class="glyphicon glyphicon-info-sign"></i> &nbsp; About
            </a>
        </li>
    </ul>



</aside>
<!-- The Modal -->

<div class="modal fade modal-about-popups" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
               <?php  echo 'about'// include 'About.php';?>
            </div>

        </div>

    </div>
</div>