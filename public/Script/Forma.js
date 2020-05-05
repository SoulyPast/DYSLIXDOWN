myFunction("Exercici1");
$(".nav-link").click(function(){
    var exe = ($(this).text());
    myFunction(exe);

  });
function myFunction(exe) {
var paraula= "HOLA";
cont=1;
for (let index = 1; index < paraula.length+1; index++) {
    var char = paraula.substring(cont-1, index);
    cont=cont+1;
}
arraychar=[];
$("."+exe).click(function(){
console.log($(this).text());
arraychar.push($(this).text());
$(this).attr("disabled", true);
if(arraychar.length==paraula.length){
    $('.reset'+exe).attr("disabled", true);
if(arraychar.join('')===paraula){
    console.log('Correcto');
}
else{
    console.log('No Sorry');
}
}
});

$(".reset"+exe).click(function(){
    arraychar=[];
    $("."+exe).removeAttr("disabled");
});
}




