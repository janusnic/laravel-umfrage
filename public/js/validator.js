$('document').ready(function() {
  var usernameField = $('#username');
  var passwordField = $('#password');
  var confirmpassField = $('#password_confirmation');

  var password      = passwordField.val();
  var confirmpass   = confirmpassField.val();

  $('.info').hover(function() {
    $( this ).removeClass('fa-info');
    $( this ).addClass('fa-info-circle');
  }, function() {
    $( this ).removeClass('fa-info-circle');
    $( this ).addClass('fa-info');
  })

  usernameField.blur(function(){
    $('#usernameVal').remove();
    var username = usernameField.val();
    var characterReg = /^([a-zA-Z0-9]{6})$/;
    if(!characterReg.test(username)) {
        $(usernameField).after('<p class="text-danger" id="usernameVal">Minimum 8 characters. No Special Characters</p>');
    }
  });
  passwordField.blur(function(){
    $('#passwordVal').remove();
    var password = passwordField.val();
    var characterReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+]).{8,}$/;
    if(!characterReg.test(password)) {
      $(passwordField).after('<p class="text-danger" id="passwordVal">Please verify your password meets the requirements</p>');
    }
  });
  confirmpassField.blur(function(){
    $('#confirmpassVal').remove()
    var confirmpass = confirmpassField.val();
    if(!confirmpass == password) {
      $(confirmpassField).after('<p class="text-danger" id="confirmpassVal">Passwords do not match')
    }
  });
});
