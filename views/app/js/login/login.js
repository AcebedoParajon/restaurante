/**
 * Ajax action to api rest
*/
function login(){
  $.ajax({
    type : "POST",
    url : "api/login",
    data : $('#login_form').serialize(),
    success : function(json) {
      if(json.success == 1) {
        $.dialog({
          title: 'Éxito !!!',
          content: json.message,
          type: 'green',
          typeAnimated: true,
        });
        setTimeout(function(){
            location.href='administrar/';
        },1000);
      }else{
        $.dialog({
          title: 'Error !!!',
          content: json.message,
          type: 'red',
          typeAnimated: true,
        });
      }
      
    },
    error : function(xhr, status) {
      $.dialog({
          title: 'Error interno !!!',
          content: 'Ha ocurrido un problema',
          type: 'red',
          typeAnimated: true,
        });
    }
  });
}

/**
 * Events
 */
$('#login').click(function(e) {
  e.defaultPrevented;
  login();
});
$('#login_form').keypress(function(e) {
    e.defaultPrevented;
    if(e.which == 13) {
        login();
    }
});
