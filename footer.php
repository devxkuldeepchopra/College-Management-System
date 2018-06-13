 </section>

    </div>
   
</body>
</html>

<div class="loader" id="wait" style="display:none;"><img src="images/Loader.gif" class="loaderImg" /></div>

<SCRIPT type="text/javascript">

var height = $(document).height();
$(".left-sidebar").css('height',height)
     
    $(document).ajaxStart(function () {
        $("#wait").css("display", "block");
      
    });
    $(document).ajaxComplete(function () {
        $("#wait").css("display", "none");
       
    });

</script>
