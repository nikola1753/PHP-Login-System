$(document)
.on("submit", "form.js-register", function(event) {
  event.preventDefault();
  
  var $form = $(this);
  var $error = $(".js-error", $form);
  var data = {
    email: $("input[type='email']", $form).val(),
    password: $("input[type='password']", $form).val()
  }
  
  if (data.email.length < 6) {
    $error.text("Please enter a valid e-mail address")
    .show();
    return false;
  } else if (data.password.length < 12) {
    $error.text("Please enter a passphrase that's at least 12 characters long")
    .show();
    return false;
  }
  
  $error.hide();
  
  console.log(data);
  
  // alert("form was submitted");
  
  return false;
})