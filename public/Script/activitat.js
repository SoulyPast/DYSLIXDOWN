function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function getMessage() {
   $.ajax({
      type:'get',
      url:'/activitats/show/15',
      data:'_token = <?php echo csrf_token() ?>',
      success:function(data) {
        //console.log(data);
        //https://laracasts.com/discuss/channels/laravel/how-to-make-a-blade-view-returning-json?page=1
      }
   });
}
getMessage();
