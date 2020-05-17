const changeRating = document.querySelectorAll('input[name=rating]');
changeRating.forEach((radio) => {
  radio.addEventListener('change', getRating);
});

// buscar el radi button checked i armar el text amb el valor (0 - 5)
var estrellas=0;
var user_id=$('.auth').text();
var activitat_id=$('.active').text();
function getRating() {
    estrellas = document.querySelector('input[name=rating]:checked').value;
  document.getElementById("texto").innerHTML = (
    0 < estrellas ?
    estrellas + " estrella" + (1 < estrellas ? "s" : "") :
    "sin calificar"
  );

  if(estrellas>0){
    $("#valorar").removeAttr("disabled");
  }
  else{
    $("#valorar").setAttribute("disabled", "true");
  }

    //  ajax para guardare el rating
    }
    $("#valorar").click(function(){

        $.ajax({
            type: "POST",
            url:"/valoracio/ajax",
            data:{"stars":estrellas,"user_id":user_id,"activitat_id":activitat_id},
            success:function(data){
            }
         });

         $("#return").css("display", "block");
    });
