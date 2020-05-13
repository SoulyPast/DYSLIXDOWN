var attr="";
var exe="";
var nume=0;
arrayresultatsuser=[];
arrayresultatsserver=[];
$(".nav-link").click(function(){
    $('#'+attr).removeClass( "active show" );
    $("#"+attr+"-tab").removeAttr("disabled");
    exe = ($(this).text());
    console.log("hola" + exe);
    console.log();
    attr = $(this).attr('aria-controls');
    $('#'+attr).addClass( "active show" );
    $(".E"+exe).attr("disabled", true);
    arraytext=[];
    $("."+exe).unbind("click");
    $("."+exe).click(function(){
        arraytext.push($(this).text());
        console.log($(this).text());
        $("#"+exe).text(arraytext);
        $(this).attr("disabled", true);
        });

  });

function shuffle(array) {
    var copy = [], n = array.length, i;
    while (n) {
      i = Math.floor(Math.random() * array.length);
      if (i in array) {
        copy.push(array[i]);
        delete array[i];
        n--;
      }
    }
    return copy;
  }
  var keys = [];

function getMessage() {
    var id_activitat= $("#id_activitat").val();
    $.ajax({
       type:'get',
       url:'/activitats1/ajax/'+id_activitat,
       data:'_token = <?php echo csrf_token() ?>',
       success:function(data) {
        var exercicis = JSON.parse(JSON.stringify(data.exercici));
        var keys = Object.keys(exercicis);
        for (var i = 0, len = keys.length; i < len; i++) {
          var tag = document.createElement("div");
          arrayresultatsserver.push(exercicis[keys[i]].resposta);
          tag.setAttribute("class", "tab-pane fade");
          tag.setAttribute("id", "pills-"+exercicis[keys[i]].id);
          tag.setAttribute("role", "tabpanel");
          tag.setAttribute("aria-labelledby", "pills-"+exercicis[keys[i]].id+"-tab");
          tag.setAttribute("style", "text-center;align-items: flex-center;");
          var div = document.createElement("div");
          div.setAttribute("class", "content ");
          div.setAttribute("style", "display: flex;flex-wrap: wrap;align-items: center;justify-content: center;");
          var paraula= exercicis[keys[i]].resposta;
          cont=1;
          arraychar=[];
          for (let index = 1; index < paraula.length+1; index++) {
              var char = paraula.substring(cont-1, index);
              arraychar.push(char);
              cont=cont+1;
          }
          newarry=shuffle(arraychar);
          var div0 = document.createElement("div");
          div0.setAttribute("class", "content");

          for (let x = 0; x < newarry.length; x++) {
            var div1 = document.createElement("button");
            div1.setAttribute("class", "rounded-circle text-uppercase mt-5 mb-5 ml-5 mr-5 text-center rounded-sm border border-primary  btn Exercici"+exercicis[keys[i]].id);
            div1.setAttribute("style", "height:50px;width:50px; display: block;");
            div1.setAttribute("type", "button");
            div.appendChild(div1);
            var text = document.createTextNode(newarry[x]);
            div1.appendChild(text);
          }
          var reset = document.createElement("button");
          reset.setAttribute("class", "btn btn-warning btn-lg mt-2 mb-2 mr-5 resetExercici"+exercicis[keys[i]].id);
          reset.setAttribute("type", "reset");
          reset.setAttribute("value", "Reset");
          var text1 = document.createTextNode('Reiniciar');
          reset.appendChild(text1);
          var input = document.createElement("div");
          input.setAttribute("class", "text-dark text-uppercase bg-light resultat text-center");
          input.setAttribute("id", "Exercici"+exercicis[keys[i]].id);
          input.setAttribute("readonly", "true");
          var seguent = document.createElement("button");
          seguent.setAttribute("class", "btn btn-success btn-lg mt-2 mb-2 ml-5 justify-content-end seguent seguentExercici"+exercicis[keys[i]].id);
          seguent.setAttribute("type", "submit");
          seguent.setAttribute("style", "");
          seguent.setAttribute("disabled", "true");
          seguent.setAttribute("value", "seguent");
          var text11 = document.createTextNode('Següent');
          seguent.appendChild(text11);
          tag.appendChild(div);
          tag.appendChild(input);
          tag.appendChild(reset);
          tag.appendChild(seguent);
          modal = document.getElementById("pills-tabContent");
          modal.appendChild(tag);

        }
        $("#Començar").click(function(){
            Info(nume);
        });

        $(".seguent").click(function(){
            $("#pills-"+exercicis[keys[nume]].id+"-tab").css("display", "none");
            $('#pills-'+exercicis[keys[nume]].id).removeClass( "active show" );
            console.log($("#Exercici"+exercicis[keys[nume]].id).text());
            arrayresultatsuser.push($("#Exercici"+exercicis[keys[nume]].id).text());
            nume++;
            if(nume<keys.length){
                Info(nume);
            }
            else{
                count=0;
                arrayuser=[];
                for (let index = 0; index < arrayresultatsuser.length; index++) {
                    const element = arrayresultatsuser[index].replace(/,/g, '');
                    arrayuser.push(element);
                    if(element == arrayresultatsserver[index]){
                    count++;
                    }
                }
                var punts = 0;
                if((arrayresultatsuser.length/2)>count){
                    punts=1;
                    $('#1').css("display", "block");
                }
                else if((arrayresultatsuser.length)==count){
                    $('#3').css("display", "block");
                    punts=3;
                }
                else{
                    $('#2').css("display", "block");
                    punts=2;
                }

                var puntuacio = punts;
                var user_id = $('.auth').text();
                var activitat_id = exercicis[keys[0]].activitat_id;
                var eroors = arrayuser.toString();
                $.ajax({
                       type: "POST",
                       url:"/resultat/ajax",
                       data:{"puntuacio":puntuacio,"user_id":user_id,"activitat_id":activitat_id,"eroors":eroors},
                       success:function(data){

                       }
                    });
            }
        });

        function Info(num){
            $(".Començar").css("display", "none");
            $("#pills-"+exercicis[keys[num]].id+"-tab").css("display", "block");
            $('#pills-'+exercicis[keys[num]].id).addClass( "active show" );
            $(".Exercici"+exercicis[keys[num]].id).unbind("click");
            arraytext=[];
            $(".Exercici"+exercicis[keys[num]].id).click(function(){
                arraytext.push($(this).text());
                $("#Exercici"+exercicis[keys[num]].id).text(arraytext);
                if(exercicis[keys[num]].resposta.length==arraytext.length){
                    $(".seguentExercici"+exercicis[keys[num]].id).removeAttr("disabled");
                    //console.log(arraytext);
                }
                $(this).attr("disabled", true);
                });
                $(".resetExercici"+exercicis[keys[num]].id).click(function(){
                    arraytext=[];
                    $(".Exercici"+exercicis[keys[num]].id).removeAttr("disabled");
                    $("#Exercici"+exercicis[keys[num]].id).text("");
                    $(".seguentExercici"+exercicis[keys[num]].id).attr("disabled", true);
                });
        }
    }
    });
 }

 getMessage();


 const changeRating = document.querySelectorAll('input[name=rating]');
changeRating.forEach((radio) => {
  radio.addEventListener('change', getRating);
});

// buscar el radiobutton checked y armar el texto con el valor ( 0 - 5 )
var estrellas=0;
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

    // opcionalmente agregar un ajax para guardar el rating
    }
    $("#valorar").click(function(){
        console.log(estrellas);

    });






