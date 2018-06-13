$(document).ready(function(){
    $(".mobile-menu .fa-bars").click(function(){
        $("body").addClass('open-sidebar');        
    });
	$(".close-menu").click(function(){
        $("body").removeClass('open-sidebar');        
    });
	

	$(".desktop-menu .fa-bars").click(function(){
        $("body").toggleClass('desktop-sidebar');
    });
	 $('[data-toggle="tooltip"]').tooltip();  
});