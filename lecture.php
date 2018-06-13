<?php 
//session_start();
include 'layout.php';?>


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
        <li class="active">Manage Lecture</li>
    </ul>

    <div class="white-box">
        <div class="page-heading">
            Manage Lecture
            <a class="btn btn-primary pull-right" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#add-popup" title="Add Lecture">Add Lecture</a>
        </div>

        <div id="msg" style="display:none;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a></div>


        <div class="table-wrapper">
           
            <table class="table  table-striped " id="example1" width="100%">
                <thead>
                    <tr>

                        <th>Name </th>
						<th>Email </th>
						<th></th>
                        
                    </tr>
                </thead>
               
            </table>
        </div>
    </div>
</article>
<div class="modal fade" id="deletepopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this Lecture?
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" id="deleteId" onclick="DeleteOrganisation(this);" title="Delete">Delete</button>
                <button type="button" id="cls" class="btn btn-primary btn-gray" data-dismiss="modal" aria-label="Close" title="Cancel">Cancel</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="add-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-custom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Lecture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <ul class="nav nav-tabs" style="display: none;" id="listBox">
                <li class="active" id="tab1log"><a href="#tab1" data-toggle="tab">tab1</a></li>
				 <li id="alertNotify"><a href="#tab2" data-toggle="tab">tab2</a></li> 
            </ul>
            <div class="tab-content" id="tabss">                
                
				
<div class="tab-pane active" id="tab1">
    <form name="registration" accept-charset="UTF-8" role="form" method="post" class="postform">
        <div class="modal-body">
            <div class="job-portal" id="jobPortal">
               
                <div class="form-group">
                    <label class="control-label " for="email">Select Teacher:</label>
                    <div class="ff">
					<select class="teacher" id="teacher"></select>
                       
                    </div>
                </div>
				
				<div class="form-group">                   				
                    <div class="ff">
                       <a href="javascript:void(0);" id="add" class="add btn btn-primary" title="Add Course" onclick="addsubj()">Add</a>
                    </div>
                </div>
				
				<div class="addSubject" id="addSubject"></div>	

				

            </div>   
<input type="submit" value="Add Lecture" class="btn btn-primary" title="Next" id="btnSave" />			

        </div>
    </form>
</div>
<div class="tab-pane" id="tab2">
    <div class="modal-body">
        <div class="unauthorized-user alert alert-success">
            <h2>Sucess</h2>
            <i class="fa fa-check"></i>
            <div class="alert alert-success" id="NotifyDiv">Sucess</div>
        </div>
    </div>
</div>				
				
				
				
				
            </div>
        </div>
    </div>
</div>










<?php include 'footer.php';?>

	<script>
	
	function getTeacherByemail() {
	debugger;
	
    var email = $("#emailID").attr('data-val');
	 var postForm = { 
		    'emailId'     : email,
			'action': 'getBranchByEmail'
        };
	
	
    $.ajax({
        type: "POST",
        url: "admin.php",
		data      : postForm,
        dataType: "json",
        success: function (data) {
					 if (data) {
			debugger;
			//var data = JSON.parse(data);
			
$('#teacher').append($('<option>', { text: "--Teacher--"}));
			$.each(data.aaData, function(i,v){ 
                $('#teacher').append($('<option>', {
                    value: v.id,
                    text: v.name
                }));	
			})	
//count++;			
			
            			
            }
        },

        error: function (request, status, error) {
            console.log('oh, errors here. The call to the server is not working.')
        }
    });
}
	
	
	
	
 $('#ul-naveSide').find('a').removeClass('active');
        $('#ul-naveSide').find('li:eq(3)').find('a').addClass('active');
        $("#wait").css("display", "none");
	
	
	$('.btnNext').click(function () {
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
    });

    $('.btnPrevious').click(function () {
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });
   
	function initDatatable() {
		debugger;
		var email = $("#emailID").attr('data-val');
	 var postForm = { 
		    'emailId'     : email,
			'action': 'getBranchByEmail'
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
            "data": "name",
            "name": "0",
            "autoWidth": true
        },
		{
            "data": "email",
            "name": "0",
            "autoWidth": true
        },
		{
            "data": "id",
            "width": "100px",
            "orderable": false,
            "sorting": false,          
            "render": function (data, type, row, full) {                
                    return '<a href="javascript:void(0);" class="glyphicon glyphicon-remove" onclick="AddDeleteParm(this)" data-val ="' + data + '" data-toggle="modal" data-target="#deletepopup" title = "Delete"></a>'
					+'<a href="lectureList.php?id='+data+'" class="fa fa-eye"  data-val ="' + data + '" title = "Lectures"></a>' ;
                }
         
        }
           
        ]
    });
}



function AddDeleteParm(Id) {
	debugger;
    var id = $(Id).attr('data-val');
    $("#deleteId").attr("data-id", id);
}

function DeleteOrganisation(Id) {
	debugger;
    var id = $(Id).attr('data-id');
	 var postForm = { //Fetch form data
		    'branchId'     : id,
			'action': 'deleteBranch'
        };
	
	
    $.ajax({
        type: "POST",
        url: "admin.php",
		data      : postForm,
        dataType: "json",
        success: function (data) {
            if (data === "true") {
                $("#msg").css("display", "Block");
                $("#msg").addClass("alert alert-success");
                $("#msg").text("Branch is successfully deleted.");
                $("#deletepopup").modal("hide");
				$('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                initDatatable();
                setTimeout(hideMsg, 5000)
                
            }
            else {
                $("#msg").addClass("alert alert-warning");
                $("#msg").css("display", "block");
                $("#msg").text("some error please try again");
                $("#deletepopup").modal("hide"); 
$('body').removeClass('modal-open');
                $('.modal-backdrop').remove();				
            }
        },

        error: function (request, status, error) {
            console.log('oh, errors here. The call to the server is not working.')
        }
    });
}
function hideMsg() { $("#msg").css("display", "none"); }

	
var count = 1;	
	function day(){
		debugger;
		$("#addSubject").append('<div class="daylst" id="daylst'+count+'"></div>');		
		var users = [
  { "id": "1", "day": "Monday"},
  { "id": "2", "day": "Tuesday"},
  { "id": "3", "day": "Wednesday"},
  { "id": "4", "day": "Thursday"},
  { "id": "5", "day": "Friday"},
  { "id": "6", "day": "Saturday"}
]
				$.each(users, function(i,v){ 
$("#daylst"+count).append('<label class="schedule" for="'+count+v.id+'" text="'+v.day+'"><input type="checkbox" class="day'+count+'" id="day'+count+v.id+'" data-val="'+v.id+'"><input type="time" class="ltime" id="time'+v.id+count+'">'+v.day+'</label>');
				    
					// $('<input />', { type: 'checkbox', 'class': 'day', id: "day"+count+v.id, "data-val": v.id }).appendTo("#daylst"+count);
					// $('<label />', { 'for': "day"+count+v.id, text: v.day }).appendTo("#daylst"+count);
					// $('<input />', { type: 'time', 'class': 'ltime', id: "time"+v.id, }).appendTo("#daylst"+count);	
					
			})		;
		
	}
	
	
	function addsubj(){
		debugger;
		
		count++;
		if(count<=8){
	getCourse();
	getSubject();
	getSem();
	day();
		}else{$("#err").text("Only 7 lecture can add one time");}
	}
	
		function getTeacher(){
			$.get('admin.php', {'action' : 'getTeacher'}).done(function(data) {
		 if (data) {
			debugger;
			var data = JSON.parse(data);
			$('#teacher').append($('<option>', { text: "--Teacher--"}));
			$.each(data.result, function(i,v){ 
                $('#teacher').append($('<option>', {
                    value: v.id,
                    text: v.name
                }));		
			})			
			}					
		else {
					alert("false");
			}
	});
	}
	
		function getSubject(){
			$("#addSubject").append('<select class="subject" id="subject'+count+'"></select>');
			$.get('admin.php', {'action' : 'getSubject'}).done(function(data) {
		 if (data) {
			debugger;
			var data = JSON.parse(data);
			                $('#subject'+count).append($('<option>', { text: "--Subject--"}));
			$.each(data.aaData, function(i,v){
                $('#subject'+count).append($('<option>', {
                    value: v.id,
                    text: v.subjectName
                }));		
			})			
			}					
		else {
					alert("false");
			}
	});
	}
	
	function getCourse(){
		 
		$("#addSubject").append('<select class="course" id="course'+count+'"></select>');
			$.get('admin.php', {'action' : 'getCourse'}).done(function(data) {
		 if (data) {
			debugger;
			var data = JSON.parse(data);
			
			 $('#course'+count).append($('<option>', { text: "--Course--"}));
			$.each(data.result, function(i,v){							    
					 $('#course'+count).append($('<option>', {
                    value: v.id,
                    text: v.name
                }));	
			})	
//count++;			
			}					
		else {
					alert("false");
			}
	});
	}
	function getSem(){	
	$("#addSubject").append('<select class="sem" id="sem'+count+'"></select>');
		for(i=1;i<=8;i++){	
			$('#sem'+count).append($('<option>', {value: i, text: i+"sem"}));
		}
	}	
$(document).ready(function() {
	$('.left-sidebar').remove();
	initDatatable();
	getTeacherByemail();
	getCourse();
	getSubject();
	
	getSem();
	day();
	
		$('form').submit(function(event) { //Trigger on form submit
		debugger;
        $('#email + .throw_error').empty(); //Clear the messages first
        $('#success').empty();

		var lecture = [], lcount=1, dayTime = [];
		$(".subject").each(function () {	
debugger;		
			var a = $(".day"+lcount).length;
		    $(".day"+lcount).each(function () {
				debugger;
            var $this = $(this);
            if ($this.is(":checked")){
			var id=$this.attr("data-val");
			var time= $("#time"+id+lcount).val();
			if(time==""){$("#err").text("time is required for checked Day");
			$("#day"+id).prop("checked",false);
			}else{
				
                dayTime.push({ "id": id,"time" : time });
				}}
        });															
            var $this = $(this);
           var c = $("#course"+lcount).val(); var s = $("#sem"+lcount).val();
			var sub=$this.val();
			lcount++;
			lecture.push({"course" :c,"sem":s,"subject":sub, "dayTime": dayTime});
			 dayTime = [];
        });
		
var jsonobj = JSON.stringify(lecture)
        var postForm = { //Fetch form data
		    'lecture'     :jsonobj,
			'action'       : 'addLecture',
			'tid':   $("#teacher").val()
        };

        $.ajax({ //Process the form using $.ajax()
            type      : 'POST', //Method type
            url       : 'admin.php', //Your form processing file URL
            data      : postForm, //Forms email
            dataType  : 'json',
            success   : function(data) {
				debugger;
				initDatatable();
				debugger;
				 var ac = $('.nav-tabs > .active');
                ac.next('li').find('a').trigger('click');
                $('#NotifyDiv').text('Subject is added successfully.');

                            }
        });
        event.preventDefault(); //Prevent the default submit
    });
  });	

	

$('#add-popup').on('hidden.bs.modal', function (e) {
    $('.nav-tabs > li').removeClass('active');
    $('.nav-tabs > li').first().addClass('active');
	$('#tab2').removeClass('active');
    $('#tab1').addClass('active');  
	$('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
    $('#name').val('');
	$('#email').val('');
    $('#pass').val('');
});

$('#add-popup').on('show.bs.modal', function (e) {
    $('#usernameid').val('');
    $('#password').val('');
});
	</script>