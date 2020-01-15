//toggle entre cadastrar e logar na pagina de login
$(document).ready(function(){
  $('#toggle > button').on('click touchstart', function() {
      var ix = $(this).index();

      $('#login').toggle( ix === 0 );
      $('#cadastro').toggle( ix === 1 );
      return false;
  });
});