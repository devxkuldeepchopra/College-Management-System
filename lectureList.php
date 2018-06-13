<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'layout.php';
?>


<style>
    label.error {
        color: red;
    }
	.timetable {
    color: #00b336 !important;
}
.schedule {
    float: left;
    width: 16%;
    margin-bottom: 30px;
    border-bottom: 1px solid black;
    box-shadow: 1px 0px 4px #c3bfbf;
    margin-top: 0px;
    overflow: hidden;
}

    td a.details-control {
        background: url('../../Content/images/down-arrow.png') no-repeat center center;
        width:15px;
        height:18px;
        display:inline-block;
        cursor: pointer;
    }

   tr.shown td a.details-control {
        background: url('../../Content/images/up-arrow.png') no-repeat center center;
        width:15px;
        height:18px;
        display:inline-block;
        cursor: pointer;
    }

    div.slider-alter {
        display: none;
    }

    table.dataTable tbody td.no-padding {
        padding: 0;
    }

    div.slider-alter tr td {
        padding: 3px;
        font-size: 14px;
    }
    div.slider-alter { padding:10px 15px;
    } div.slider-alter tr td:first-child {
        font-weight: 500; font-size:14px;
        color: #000; width:150px;
    }
</style>
<article class="content">
    <ul class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active">Lecture List</li>
    </ul>

    <div class="white-box">
        <div class="page-heading">
            Lecture List
        </div>

        <div id="msg" style="display:none;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a></div>


        <div class="table-wrapper">
           
            <table class="table  table-striped " id="example1" width="100%">
                <thead>
                    <tr>

                        <th>Course </th>
						<th>Semester </th>
						<th>Subject Name</th>
						<th>Subject Code</th>
						<th></th>
                        
                    </tr>
                </thead>
               
            </table>
        </div>
    </div>
</article>

<div class="tid" id="tid" data-val="<?php if(isset($_GET['id'])){echo $_GET['id'];}?>"></div>








<?php include 'footer.php';?>

	<script>
	

   
	function initDatatable() {
		debugger;
	var tid = $("#tid").attr('data-val');
	if(tid){
		var postForm = { 
		    'id'     : tid,
			'action': 'LectureList'
        };
	}
	else{
		var email = $("#emailID").attr('data-val');
	 var postForm = { 
		    'emailId'     : email,
			'action': 'teacherLecture'
        };
		
	}
	 
    table = $('#example1').DataTable({
        "destroy": true,
        "processing": true,

        "bStateSave": true,
        "info": true,
        "oLanguage": {
           sProcessing: '<div class="loader" style="display:block;"><img src="/Content/images/Loader.gif" class="loaderImg"/></div>',
            "sEmptyTable": "No Record available."
        },
        "lengthMenu": [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
        "order": [
            [0, "asc"]
        ],
        "filter": true,
        "ajax": {
            "url": 'admin.php',
            "type": 'POST',
            "data": postForm,
            "datatype": "json"
        },
        "columns": [
        {
            "data": "cname",
            "name": "0",
            "autoWidth": true
        },
		{
            "data": "sem",
            "name": "0",
            "autoWidth": true
        },
		{
            "data": "subjectName",
            "name": "0",
            "autoWidth": true
        },
		{
            "data": "subjectCode",
            "name": "0",
            "autoWidth": true
        },
		{
            "data": "id",
            "width": "100px",
            "orderable": false,
            "sorting": false,          
            "render": function (data, type, row, full) {                
                    return '<a href="lectureSchedule.php?id='+data+'&t='+tid+'" class="glyphicon glyphicon-time timetable"  data-val ="' + data + '" title = "TimeTable"></a>' ;
                }
         
        }
           
        ]
    });
}
$(document).ready(function() {
		$('.left-sidebar').remove();
	initDatatable();
	
});
	</script>