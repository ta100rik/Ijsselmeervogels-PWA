<?php
session_start();
if(isset($_SESSION['id'])){
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=overzicht.php">';
}else{
?>
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
  <meta name="apple-mobile-web-app-capable" content="yes">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="manifest" href="/manifest.json">

 <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
  <script>
    var OneSignal = window.OneSignal || [];
    OneSignal.push(["init", {
      appId: "69103d25-7605-4129-8756-fb748f85180e",
      autoRegister: true,
      notifyButton: {
        enable: false /* Set to false to hide */
      }
    }]);
  </script>

<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#a72329">
<meta name="apple-mobile-web-app-title" content="IJsselmeervogels">
<meta name="application-name" content="IJsselmeervogels">
<meta name="theme-color" content="#a72329">
  <script src="scripts/jquery.js"></script>

</head>
<body class="startscreen">

  <main class="main">

    <img src="images/icons/192x192_shadow.png">
    <h1 class="header__title">IJsselmeervogels</h1>

    <br>
 
    <form autocomplete="off" action="action.php" method="POST">
      <input autocomplete="off" type="email" maxlength="30" placeholder="E-MAIL" align="center" name="email">
      <br>
      <br>
      <input autocomplete="off" type="password" maxlength="37" placeholder="WACHTWOORD" align="center" name="pass">
        <button  type="submit">LOGIN</button>
      <p style="margin-top: 10px; font-family: proximan; opacity: 75%;"><a href="#">Wachtwoord vergeten?</a></p>
    </form>
  </main>
    </div>
  </div>

    <script src="scripts/app.js" async></script>
</body>
</html>
<?php } ?>