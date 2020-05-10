$(".nav-link").click(function(){
    var exe = ($(this).text());
    console.log(exe);
    myFunction(exe);

  });

function myFunction(exe) {
$("."+exe).click(function(){
console.log($(this).text());
$(this).attr("disabled", true);
})}



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
          console.log(exercicis[keys[i]]);
          var tag = document.createElement("div");
          tag.setAttribute("class", "tab-pane fade");
          tag.setAttribute("id", "pills-"+exercicis[keys[i]].id);
          tag.setAttribute("role", "tabpanel");
          tag.setAttribute("aria-labelledby", "pills-"+exercicis[keys[i]].id+"-tab");
          var div = document.createElement("div");
          div.setAttribute("class", "content border border-primary");
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
          div0.setAttribute("class", "content border border-primary");

          for (let x = 0; x < newarry.length; x++) {
            var div1 = document.createElement("button");
            div1.setAttribute("class", "rounded-circle rounded-sm border border-danger d-flex p-2 justify-content-center btn Exercici"+(i+1));
            div1.setAttribute("style", "height:50px;width:50px;");
            div1.setAttribute("type", "button");
            div.appendChild(div1);
            var text = document.createTextNode(newarry[x]);
            div1.appendChild(text);
          }

          tag.appendChild(div);
          modal = document.getElementById("pills-tabContent");
          modal.appendChild(tag);
        }
    }
    });
 }
 getMessage();




