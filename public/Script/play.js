// Accedir a les activitats privades pel codi indicant-lo en l'input
$("#play").click(function()
{
$.ajax({
    type:'get',
    url:'/play/'+$("#input").val(),
    success:function(data) {
        var keys = Object.keys(data.Activitat);
        var id = data.Activitat[keys[0]].codi;
        var tipus =  data.Activitat[keys[0]].tipus_id;
        var acabat = data.Activitat[keys[0]].acabat;
        redirect(id , tipus, acabat);
    }
});
});

function redirect(id , tipus, acabat)
    {
        if(acabat==1){
        var url = "/activitats"+tipus+"/show/"+id;
        window.location.assign(url);}
        else{
        window.location.assign('/play');
        }
    }

    $(document).on('input', '#input', function(){

        $("#play").removeAttr("disabled");

});

