/**
 * Ajax action to api rest
*/
function administrar(){
  
  $.ajax({
    type : "POST",
    url : "api/administrar/crear",
    data : $('#administrar_form').serialize(),

    success : function(json) {
      if(json.success == 1) {
        $.dialog({
          title: 'Éxito !!!',
          content: json.message,
          type: 'green',
          typeAnimated: true,
        });
        setTimeout(function(){
            location.reload();
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
 *  
 * @param {*} e 
 */
$('#administrar').click(function(e) {
  e.defaultPrevented;
  administrar();
});
// $('#administrar_form').keypress(function(e) {
//     e.defaultPrevented;
//     if(e.which == 13) {
//         administrar();
//     }
// });