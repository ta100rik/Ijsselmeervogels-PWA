<?php
session_start();?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height" />
  <title>IJsselmeervogels</title>
    <link rel="stylesheet" type="text/css" href="styles/inline.css">
   <link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#a72329">
<meta name="apple-mobile-web-app-title" content="IJsselmeervogels">
<meta name="application-name" content="IJsselmeervogels">
<meta name="theme-color" content="#a72329">

  <script src="scripts/jquery.js"></script>
<!--
  <script type="text/JavaScript" src="scripts/sha512.js"></script> 
  <script type="text/JavaScript" src="scripts/forms.js"></script>
<script src="scripts/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="styles/bootstrap.css"> -->
</head>
<body class="startscreen">

 <!--  <header class="header">

  </header> -->
  <main class="main">

    <img src="images/icons/192x192_shadow.png">
    <h1 class="header__title">SPONSOR-APP</h1>
      <?php
if(empty($_SESSION['id'])){?>
<p color="white"><strong>Incorrect username/ password please try again.</strong></p>
<?php }?>
    <br>
  <!--  <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6"> -->
    <form action="action.php" method="POST">
      <input type="email" maxlength="30" placeholder="E-MAIL" align="center" name="email">
      <br>
      <br>
      <input type="password" maxlength="37" placeholder="WACHTWOORD" align="center" name="pass">

      <div class="bottem">
        <button  type="submit">LOGIN</button>
      <p><a href="#">Wachtwoord vergeten?</a></p>
      </div>
    </form>
  </main>
    </div>
  </div>
 
  <!-- Uncomment the line below when ready to test with fake data -->
  <script src="scripts/app.js" async></script>

</body>
</html>
