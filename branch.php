<?php session_start();
include 'layout.php';?>


<style>
    label.error {
        color: red;
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
        <li class="active">Manage Branch</li>
    </ul>

    <div class="white-box">
        <div class="page-heading">
            Manage Branch
            <a class="btn btn-primary pull-right" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#add-popup" title="Add Branch">Add Branch</a>
        </div>

        <div id="msg" style="display:none;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a></div>


        <div class="table-wrapper">
           
            <table class="table  table-striped " id="example1" width="100%">
                <thead>
                    <tr>

                        <th>Name </th>
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
                Are you sure you want to delete this branch?
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
                <h5 class="modal-title" id="exampleModalLabel">Add Branch</h5>
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
                    <label class="control-label " for="email">Branch Name:</label>
                    <div class="ff">
                        <input type="text" class="form-control" id="name" name="name" >
                    </div>
                </div>
				
				<div class="form-group">                   				
                    <div class="ff">
                       <a href="javascript:void(0);" id="btnAddC" class="btn btn-primary" title="Add Course" >Add Course To Branch</a>
                    </div>
                </div>

				

            </div>   
<input type="submit" value="Add Branch" class="btn btn-primary" title="Next" id="btnSave" />			

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
	
	var acount =1;
	$("#btnAddC").click(function(){
		debugger;
		$("#jobPortal").append('<div class="form-group"><label class="control-label " for="course'+acount+'">Branch Course '+acount+' Name:</label><div class="ff"><input type="text" class="form-control course" id="course'+acount+'" name="course" ></div></div>');		
	acount++;
	})
	
	
	
	
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
            "url": 'admin.php?action=getBranch',
            "type": "GET",
            "datatype": "json"
        },
        "columns": [
        {
            "data": "name",
            "name": "0",
            "autoWidth": true
        },
		{
            "data": "id",
            "width": "100px",
            "orderable": false,
            "sorting": false,          
            "render": function (data, type, row, full) {                
                    return '<a href="javascript:void(0);" class="glyphicon glyphicon-remove" onclick="AddDeleteParm(this)" data-val ="' + data + '" data-toggle="modal" data-target="#deletepopup" title = "Delete"></a>' ;
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

	
	

	
$(document).ready(function() {
	debugger;
	
	initDatatable();
	
		$('form').submit(function(event) { //Trigger on form submit
		debugger;
        $('#email + .throw_error').empty(); //Clear the messages first
        $('#success').empty();

        //Validate fields if required using jQuery
				var branch = [], lcount=1, coursearr = [];
		$(".course").each(function () {	
			debugger;			
            var $this = $(this);
            var c = $("#course"+lcount).val();
			lcount++;
			coursearr.push({"course" :c});		
        });
		var bname = $("#name").val();
		branch.push({"bname": bname, "courses": coursearr});
		
		
var jsonobj = JSON.stringify(branch);
		

        var postForm = { //Fetch form data
		
			'branch': jsonobj,
			'action': 'addBranchCourse'
        };

        $.ajax({ //Process the form using $.ajax()
            type      : 'POST', //Method type
            url       : 'admin.php', //Your form processing file URL
            data      : postForm, //Forms email
            dataType  : 'json',
            success   : function(data) {
				initDatatable();
				debugger;
				 var ac = $('.nav-tabs > .active');
                ac.next('li').find('a').trigger('click');
                $('#NotifyDiv').text('Branch is added successfully.');
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