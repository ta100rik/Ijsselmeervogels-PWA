<?php
session_start();
if(isset($_SESSION['id'])){
   include_once("includes/db.php");
?>


<!DOCTYPE html>
<html>
<head>
  <title>IJsselmeervogels</title>
  <!--meta info-->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
  <!--end meta-->
  <!--custom css-->
  <link rel="stylesheet" type="text/css" href="styles/inline.css">
  <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/style2.css">
  <!--progressive app code-->
  <link rel="manifest" href="/manifest.json">
  <!--libary's (jquery and fontawesome)-->
  <script src="scripts/jquery.js"></script>
  <script src="scripts/fontawesome.js"></script>
</head>
<body>
<div id="main">
  <header class="header">
  <a href="chatstart.php">
       <i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
      <div class="top"><?php
      $chatid = mysqli_escape_string($conn,$_GET['chatid']);
      $sql = "SELECT * FROM chat WHERE chat_id =" . $chatid;
      $query = mysqli_query($conn, $sql);
      $row = $query->fetch_assoc();
    echo $row['chatnaam'];
    ?>
    </div>
  </header>
  <main class="main chatmain">
 
<div class="chatcontent">
 <?php
   $sql = $conn ->query("SELECT berichten.msg, DATE_FORMAT(berichten.timestamp,'%k:%i') as time, berichten.Lid_id, leden.username FROM berichten INNER JOIN leden ON berichten.Lid_id = leden.Lid_id WHERE chat_id =" . $chatid . " ORDER BY timestamp");
while($x = $sql->fetch_assoc()){
  $message = $x['msg'];
  $username = $x['username'];
  $time = $x['time'];
  $userid = $x['Lid_id'];
  if($userid == $_SESSION['id']){
   echo '<div class="chatboxme">' . $message . '</div><div id="r" class="time">' . $time . '</div>';
  }else{
      echo '<div class="chatbox">' . $message . '</div><div id="l" class="time">' . $time .' '. $username . '</div>';
}
}
    ?>

  </div>
  <form method="POST" id="input" class="chatinput">
  <input id="ibox" type="text" name="msg" placeholder="Type a message"/>
 <button id="submit"><img src="images/send.png"></button>
 </form>
  <?php
      if(empty($_POST['msg'])){}else{
        $Lid_id = $_SESSION['id'];
        $msg = mysqli_escape_string($conn,$_POST['msg']);
        $query = "INSERT INTO `berichten` (`bericht_id`, `Lid_id`, `Chat_id`, `msg`) VALUES (NULL, '$Lid_id', '$chatid', '$msg')";
        $run = $conn->query($query);
        header("Refresh:0");
      } 
 ?>
</div> 
</div>
  </main>


  <script src="scripts/app.js" async></script>
  <script type="text/javascript">
        $('.chatcontent').scrollTop($('.chatcontent')[0].scrollHeight);
        $('#ibox').click(function() {
        $('.chatcontent').scrollTop($('.chatcontent')[0].scrollHeight);
});
        $('#submit').click(function() {
          $( "#input" ).submit();
});
        $('.input').keypress(function (e) {
  if (e.which == 13) {
    $( "#input" ).submit();
  }
});
  </script>
</body>
</html>
<?php
}else{
     echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}
?>