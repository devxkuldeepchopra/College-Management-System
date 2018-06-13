<?php 
session_start();
include 'layout.php';
?>


<style>
    label.error {
        color: red;
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
        <li><a href="lectureList.php?id=<?php if(isset($_GET['id'])){echo $_GET['t'];}?>">Lecture List</a></li>
        <li class="active">Time Table</li>
    </ul>

    <div class="white-box">
        <div class="page-heading">
            Time Table
        </div>

        <div id="msg" style="display:none;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a></div>


        <div class="table-wrapper">
           
            <table class="table  table-striped " id="example1" width="100%">
                <thead>
                    <tr>

                        <th>Day </th>
						<th>Time </th>
						
                        
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
	 var postForm = { 
		    'id'     : tid,
			'action': 'LectureSchedule'
        };
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
            "data": "dayName",
            "name": "0",
            "autoWidth": true
        },
		{
            "data": "time",
            "name": "0",
            "autoWidth": true,
			 "render": function (data, type, row) {
                    var timeString = data;
var H = +timeString.substr(0, 2);
var h = H % 12 || 12;
var ampm = (H < 12 || H === 24) ? "AM" : "PM";
timeString = h + timeString.substr(2, 3) + ampm;
return timeString;

                }
        }
		// {
            // "data": "id",
            // "width": "100px",
            // "orderable": false,
            // "sorting": false,          
            // "render": function (data, type, row, full) {                
                    // return '<a href="lectureList.php?id='+data+'" class="viewlec"  data-val ="' + data + '" title = "View">Lecture</a>' ;
                // }
         
       // }
           
        ]
    });
}
$(document).ready(function() {
	$('.left-sidebar').remove();
	initDatatable();
	
});
	</script>