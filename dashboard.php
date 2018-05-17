<?php
  // allow the config
  define("__CONFIG__", true);
  // require the config
  require_once "inc/config.php";

ForceLogin();

  $user_id = $_SESSION['user_id'];
  $getUserInfo = $con->prepare("SELECT email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
  $getUserInfo->bindParam(':user_id', $user_id, PDO::PARAM_INT);
  $getUserInfo->execute();

  if($getUserInfo->rowCount() == 1) {
    // user found
    $user = $getUserInfo->fetch(PDO::FETCH_ASSOC);
  } else {
    // user isn't signed in
    header("Location: /nt/lrp/logout.php");
    exit;
  }

  //echo $_SESSION['user_id'] . " is your user id";
  //exit;

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
      <h3>Dashboard</h3>
      <p>Hello <?php echo $user['email']; ?>, you registered at <?php echo $user['reg_time']; ?>.</p>
    </div>
  
  <?php require_once "inc/footer.php"; ?>
  
  </body>

</html>