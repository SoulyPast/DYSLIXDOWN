function ActivitatDELETE($id){


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

}

