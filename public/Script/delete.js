// borra una activitat
function ActivitatDELETE($id){

    jQuery.noConflict();
    $("#confirm").modal();
    $("#confirm").on('click', '#delete', function(e) {

        $.ajax({
            url: "/activitats/delete/"+$id,
            type:"DELETE",
            data:{
              "_token": "{{ csrf_token() }}",
            },
            success:function(response){
              $("#"+$id).remove();
            },
           });
      });

}



