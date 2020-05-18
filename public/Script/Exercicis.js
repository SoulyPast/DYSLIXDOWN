// Variables globales
// numero de exercicis
var num=0;
// tipus de activitat
var tipus= $("#Type").text();
var user_id = "";
var activitat_id = "";

// Guardar respostes d'usuari.
arrayresultatsuser=[];
// Guardar respostes correctes
arrayresultatsserver=[];
// Guardar key de cada exercici.
var keys = [];

// Function que retorna tota les resposta de manera random no si repiten.
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

// Funcion general de generar els exercicis .
function getMessage() {
    var id_activitat= $("#id_activitat").val();
    // Petició d'ajax per agafar els exercicis d'una activitat concreta passant l'id de lactividad amb paràmetre
    $.ajax({
       type:'get',
       url:'/activitats1/ajax/'+id_activitat,
       data:'_token = <?php echo csrf_token() ?>',
       success:function(data) {
        var exercicis = JSON.parse(JSON.stringify(data.exercici));
        var keys = Object.keys(exercicis);

        //utilitzant dom gènere tots els exercici més l'estructura depèn de quin tipus de activitat és.
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
          arrayf=[];

          //comprovar que tipus de activitats.
          if(tipus===" Formant paraules"){
              // En cas que es Formant paraules  : separar les lletres de la paraula i torno a guardar-los de forma random
            for (let index = 1; index < paraula.length+1; index++) {
                var char = paraula.substring(cont-1, index);
                arraychar.push(char);
                cont=cont+1;
            }
          newarry=shuffle(arraychar);
          }
          else{
              // guardar cada resposta o oció però de forma random en una matriu
            arrayf.push(exercicis[keys[i]].opcio1);
            arrayf.push(exercicis[keys[i]].opcio2);
            arrayf.push(exercicis[keys[i]].opcio3);
            arrayf.push(exercicis[keys[i]].opcio4);
            arrayf.push(exercicis[keys[i]].opcio5);
            arrayf.push(exercicis[keys[i]].opcio6);
            arrayf.push(exercicis[keys[i]].opcio7);
            arrayf.push(exercicis[keys[i]].resposta);
            myArrClean = arrayf.filter(Boolean);
            newarry=shuffle(myArrClean);
          }
          var div0 = document.createElement("div");
          div0.setAttribute("class", "content");
          // gènere els opcions de cada exercici.
          for (let x = 0; x < newarry.length; x++) {
            var div1 = document.createElement("button");
            div1.setAttribute("class", "rounded-circle text-uppercase mt-5 mb-5 ml-5 mr-5 text-center rounded-sm border border-primary  btn Exercici"+exercicis[keys[i]].id);
            div1.setAttribute("style", "height:150px;width:150px; display: block;");
            div1.setAttribute("type", "button");
            div.appendChild(div1);
            var text = document.createTextNode(newarry[x]);
            div1.appendChild(text);
          }
          // genera el botó de reset.
          var reset = document.createElement("button");
          reset.setAttribute("class", "btn btn-warning btn-lg mt-2 mb-2 mr-5 resetExercici"+exercicis[keys[i]].id);
          reset.setAttribute("type", "reset");
          reset.setAttribute("value", "Reset");
          var text1 = document.createTextNode('Reiniciar');
          reset.appendChild(text1);
          // mostra per pantalla el valor selecionat.
          var txt = document.createElement("div");
          txt.setAttribute("class", "text-dark text-uppercase bg-light resultat text-center");
          txt.setAttribute("id", "Exercici"+exercicis[keys[i]].id);
          txt.setAttribute("readonly", "true");
          // genera el botó de seguent.
          var seguent = document.createElement("button");
          seguent.setAttribute("class", "btn btn-success btn-lg mt-2 mb-2 ml-5 justify-content-end seguent seguentExercici"+exercicis[keys[i]].id);
          seguent.setAttribute("type", "submit");
          seguent.setAttribute("style", "");
          seguent.setAttribute("disabled", "true");
          seguent.setAttribute("value", "seguent");
          var text11 = document.createTextNode('Següent');
          seguent.appendChild(text11);
          tag.appendChild(div);
          tag.appendChild(txt);
          tag.appendChild(reset);
          tag.appendChild(seguent);
          // afegir tot a l'div general.
          modal = document.getElementById("pills-tabContent");
          modal.appendChild(tag);
        }
        // botó principal de comencar.
        $("#Començar").click(function(){
            Info(num);
        });

        // funcion de click sobre el butó seguent.
        $(".seguent").click(function(){
            //aquesta funció el que fa és quan detecta clic sobre el button següent passa al'otro exercio.
            $("#pills-"+exercicis[keys[num]].id+"-tab").css("display", "none");
            $('#pills-'+exercicis[keys[num]].id).removeClass( "active show" );
            arrayresultatsuser.push($("#Exercici"+exercicis[keys[num]].id).text());
            num++;
            if(num<keys.length){
                Info(num);
            }
            //un cop l'usuari ha fet tots els exercicis.
            else{
                count=0;
                arrayuser=[];
                ///comparar la resposta d'usuari amb les respostes correctes.
                for (let index = 0; index < arrayresultatsuser.length; index++) {
                    const element = arrayresultatsuser[index].replace(/,/g, '');
                    arrayuser.push(element);
                    if(element == arrayresultatsserver[index]){
                    count++;
                    }
                }
                var punts = 0;
               // donar una puntuació per a l'usuari y mostra  per pantalla.
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
                // Guardar el resultat d'usuari a la base de dades utilitzant una petició ajax de tipus post.
                var puntuacio = punts;
                user_id = $('.auth').text();
                activitat_id = exercicis[keys[0]].activitat_id;
                var eroors = arrayuser.toString();
                $.ajax({
                       type: "POST",
                       url:"/resultat/ajax",
                       data:{"puntuacio":puntuacio,"user_id":user_id,"activitat_id":activitat_id,"eroors":eroors},
                       success:function(data){

                       }
                    });
                    // Abrir el modal de valoración quan acaba tots els exercicis.
                    jQuery.noConflict();
                    $(document).ready(function(){
                        $("#myModal").modal();
                     });

                     // Puja de nivell
                     $.ajax({
                        type: "PUT",
                        url:"/nivell/ajax",
                        data:{"puntuacio":puntuacio},
                        success:function(data){
                            console.log(data);
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
             // En el cas de click sobre seguent: es guardara el valor que selecionat el usuari en una array.
            $(".Exercici"+exercicis[keys[num]].id).click(function(){
                arraytext.push($(this).text());
                $("#Exercici"+exercicis[keys[num]].id).text(arraytext);
                if(tipus.toString()===" Formant paraules"){
                    if(exercicis[keys[num]].resposta.length==arraytext.length){
                    $(".seguentExercici"+exercicis[keys[num]].id).removeAttr("disabled");
                    }
                    $(this).attr("disabled", true);
                }
                else{
                    $(".seguentExercici"+exercicis[keys[num]].id).removeAttr("disabled");
                    $(".Exercici"+exercicis[keys[num]].id).attr("disabled", true);
                }
            });
                // En el cas de click sobre rest: si reinicien els valors.
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



