<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<form method="post" name="postForm" class="postform">
			<span class="err" id="err"></span>
			<select class="teacher" id="teacher"></select>
			<div class="add" id="add" onclick="addsubj()">ADD</div>
			<div class="addSubject" id="addSubject"></div>			
			<input type="submit" value="Submit" />
			
</form>


	<script>
	//only get brach course acc to hod <select class="course" id="course"></select>
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
					$('<input />', { type: 'checkbox', 'class': 'day', id: "day"+count+v.id, "data-val": v.id }).appendTo("#daylst"+count);
					$('<label />', { 'for': "day"+count+v.id, text: v.day }).appendTo("#daylst"+count);
					$('<input />', { type: 'time', 'class': 'ltime', id: "time"+v.id, }).appendTo("#daylst"+count);				
			})		
		
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
	getTeacher();
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
			var a = "#daylst"+lcount+">.day";
		    $(a).each(function () {
				debugger;
            var $this = $(this);
            if ($this.is(":checked")){
			var id=$this.attr("data-val");
			var time= $("#time"+id).val();
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
                            if (!data.success) { //If fails
                                
                            }
                            else {
                                  
                                }
                            }
        });
        event.preventDefault(); //Prevent the default submit
    });
  });
	
	</script>