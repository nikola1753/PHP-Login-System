<?php
  // allow the config
  define("__CONFIG__", true);
  // require the config
  require_once "inc/config.php";

  echo $_SESSION['user_id'] . " is your user id";
  exit

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow" />
    
    <title>page title</title>
    
    <base href="/" />
    
<!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.42/css/uikit.min.css" />
    
  </head>
  
  <body>
  
    <div class="uk-section uk-container">
      
    </div>
  
  <?php require_once "inc/footer.php"; ?>
  
  </body>

</html>