$("#play").click(function(){
$.ajax({
    type:'get',
    url:'/play/'+$("#input").val(),
    data:'_token = <?php echo csrf_token() ?>',
    success:function(data) {
        console.log(data.Activitat);
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
        console.log(url);
        window.location.assign(url);



    }
