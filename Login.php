<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>



<style>
.login {
    float: left;
    margin-top: 10%;
    margin-left: 35%;
	width: 32%;
}
.postform{
    width: 100%;
    float: left;
   background: #ebe0ff;
    padding: 1%;
}
.UserInput {
    width: 100%;
    margin: 12px 0px;
    height: 43px;
    float: left;
    padding: 0px 6px;
    border: 1px solid black;
}
input[type="submit"] {
    width: 100%;
    float: left;
    border: 1px solid black;
    height: 39px;
    text-shadow: 0px 0px 2px black;
    color: white;
    background: #2196F3;
    margin-bottom: 19px;
}
input[type="submit"]:hover {
    background: #03A9F4;
}
.err {
    float: left;
    width: 100%;
    color: #F44336;
}
h2 {
    text-align: center;
    text-transform: uppercase;
    color: #FF9800;
    text-shadow: 1px 1px 1px black;
}
p {
    margin-top: 19px;
    font-size: 12px;
    color: #00000082;
    text-align: right;
    font-family: monospace;
}
body {
    background: url(images/loginbg.jpg);
}
</style>
<div class="login">

<form method="post" name="postForm" class="postform">
<h2>Login</h2>
			 <span class="err" id="errlogin"></span>
            <input type="text" name="email" id="email" placeholder="Email" class="UserInput">
			<span class="err" id="erremail"></span>
			<input type="password" name="pass" id="pass" placeholder="Password" class="UserInput">
            <span class="err" id="errpass"></span>
			<input type="submit" value="Login" />
			<p>Powered By DevxSoft(kuldeepChopra)</p>
</form>
</div>

	<script>
$(document).ready(function() {
		$('form').submit(function(event) { //Trigger on form submit
		debugger;
        $('#email + .throw_error').empty(); //Clear the messages first
        $('#success').empty();

        //Validate fields if required using jQuery

        var postForm = { //Fetch form data
            'email'     : $('input[name=email]').val(), //Store email fields value
			'pass'	   : $('input[name=pass]').val()
        };

        $.ajax({ //Process the form using $.ajax()
            type      : 'POST', //Method type
            url       : 'auth.php', //Your form processing file URL
            data      : postForm, //Forms email
            dataType  : 'json',
            success   : function(data) {
				debugger;
                            if (!data.success) { //If fails
                                if (data.errors.email) { //Returned if any error from process.php
                                    $('#erremail').fadeIn(1000).html(data.errors.email); //Throw relevant error
                                }
								if(data.errors.pass){
									
									 $('#errpass').fadeIn(1000).html(data.errors.pass);
								}
								if(data.errors.dberr){
									console.log(data.errors.dberr);
								}
								if(data.errors.loginerr){
									console.log(data.errors.loginerr);
									$('#errlogin').text(data.errors.loginerr);
								}
                            }
                            else {
                                  //  $('#success').fadeIn(1000).append('<p>' + data.posted + '</p>'); //If successful, than throw a success message
									$('#errlogin').text('');																	
									console.log(data.dbcon);
									console.log(data.loginok);
									// similar behavior as an HTTP redirect
									//	window.location.replace("home");										
										// similar behavior as clicking on a link
										window.location.href = "dashboard.php";
                                }
                            }
        });
        event.preventDefault(); //Prevent the default submit
    });
  });
	
	</script>		
			
			
			
			
			