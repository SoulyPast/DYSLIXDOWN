// Accedir a les activitats privades pel codi indicant-lo en l'input
$("#play").click(function(){
$.ajax({
    type:'get',
    url:'/play/'+$("#input").val(),
    data:'_token = <?php echo csrf_token() ?>',
    success:function(data) {
        var keys = Object.keys(data.Activitat);
        var id = data.Activitat[keys[0]].codi;
        var tipus =  data.Activitat[keys[0]].tipus_id;
        redirect(id , tipus);
    }
});
});

function redirect(id , tipus)
    {
        var url = "/activitats"+tipus+"/show/"+id;
        window.location.assign(url);
    }

    $(document).on('input', '#input', function(){

        $("#play").removeAttr("disabled");

});

