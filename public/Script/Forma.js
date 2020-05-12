var attr="";
var exe="";
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
          tag.setAttribute("class", "tab-pane fade");
          tag.setAttribute("id", "pills-"+exercicis[keys[i]].id);
          tag.setAttribute("role", "tabpanel");
          tag.setAttribute("aria-labelledby", "pills-"+exercicis[keys[i]].id+"-tab");
          tag.setAttribute("style", "text-center");
          var div = document.createElement("div");
          div.setAttribute("class", "content ");
          div.setAttribute("style", "display: flex;align-items: center;justify-content: center;");
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
            div1.setAttribute("class", "rounded-circle mt-5 mb-5 ml-5 mr-5 text-center rounded-sm border border-primary d-flex p-2 justify-content-center btn Exercici"+exercicis[keys[i]].id);
            div1.setAttribute("style", "height:50px;width:50px; display: block;");
            div1.setAttribute("type", "button");
            div.appendChild(div1);
            var text = document.createTextNode(newarry[x]);
            div1.appendChild(text);
          }
          var reset = document.createElement("button");
          reset.setAttribute("class", "btn btn-primary mt-2 mb-2 ml-5 resetExercici"+(i+1));
          reset.setAttribute("type", "reset");
          reset.setAttribute("value", "Reset");
          var text1 = document.createTextNode('Reset');
          reset.appendChild(text1);
          var input = document.createElement("div");
          input.setAttribute("class", "form-control resultat mt-2 ");
          input.setAttribute("id", "Exercici"+(i+1));
          input.setAttribute("readonly", "true");
          tag.appendChild(div);
          tag.appendChild(input);
          tag.appendChild(reset);
          modal = document.getElementById("pills-tabContent");
          modal.appendChild(tag);

        }
        $("#Començar").click(function(){
        $(".Començar").css("display", "none");
        $("#pills-"+exercicis[keys[0]].id+"-tab").css("display", "block");
        $('#pills-'+exercicis[keys[0]].id).addClass( "active show" );
        $(".Exercici"+exercicis[keys[0]].id).unbind("click");
        $(".Exercici"+exercicis[keys[0]].id).click(function(){
            //arraytext.push($(this).text());
            console.log($(this).text());
            //$("#Exercici"+exercicis[keys[0]].id).text(arraytext);
            $(this).attr("disabled", true);
            });
        });
    }
    });
 }

 getMessage();

/*
 $("#Començar").click(function(){
    $("#pills-"+exercicis[keys[0]].id+"-tab").css("display", "block");
    $('#pills-'+exercicis[keys[0]].id).addClass( "active show" );
 });
*/
