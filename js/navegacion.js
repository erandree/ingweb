$(document).ready(function() {
    // indicamos que se ejecuta la funcion a los 5 segundos de haberse
    // cargado la pagina
    setTimeout(clickbutton, 100);
  
    function clickbutton() {
      // simulamos el click del mouse en el boton del formulario
      $("#tipos").click();
    }
    $('#tipos').on('click',function() {
      console.log('action button clicked');
    });
  });