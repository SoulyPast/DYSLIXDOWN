const url = 'https://analisi.transparenciacatalunya.cat/resource/e2ef-eiqj.json';
const http = new XMLHttpRequest();
var sel = document.getElementById('escola');
var Escoles = [];
http.open("GET", url);
http.onreadystatechange = function(){
if(this.readyState == 4 && this.status == 200){
    var resultado = JSON.parse(this.responseText);
    for (let index = 0; index < resultado.length; index++) {
        const escola = resultado[index].denominaci_completa;
        if(escola.substring(0,6)=="Escola"){
            Escoles.push(escola.substring(7,100));
        }
    }
    Escoles.sort(function(a, b) {
        return a.localeCompare(b);
    });
    for (let index = 0; index < Escoles.length; index++) {
            var opt = document.createElement('option');
            opt.appendChild( document.createTextNode(Escoles[index]));
            sel.appendChild(opt);
    }
}
    };
http.send();



$("#cbox1").on( 'change', function() {
    if( $(this).is(':checked') ) {
       $("#submit").removeAttr("disabled");
    } else {
        $("#submit").attr("disabled", true);
    }
});
