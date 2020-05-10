
$(document).ready(function(){
        var count = $("#staticount").val();
        if(count>=10){
            $("#afegir").attr("disabled", true);
        }
        else{
            $("#afegir").removeAttr("disabled");
        }
		 });
