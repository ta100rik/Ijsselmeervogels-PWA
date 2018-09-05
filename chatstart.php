<?php
session_start();
if(isset($_SESSION['id'])){?>
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
  <!--progressive app code-->
  <link rel="manifest" href="/manifest.json">
  <!--libary's (jquery and fontawesome)-->
  <script src="scripts/jquery.js"></script>
  <script src="scripts/fontawesome.js"></script>
</head>
<body>
<div id="mySidenav" class="sidenav">
    <div class="sidenavcontent">
    <div class="sidebartop">
      <img class="img-circle" align="middle" src="images/head/<?=$_SESSION['id']?>.png">
      <h4><?=$_SESSION['voornaam'];?> <?=$_SESSION['achternaam'];?></h4>
      <p>  
      <?php
              include_once("includes/db.php");
                     $result = $conn ->query("SELECT `rolnaam` FROM `rollen` WHERE `rollen_id` = " . $_SESSION['rolid']);
                      if($result->num_rows != 0){
                        while($rows = $result->fetch_assoc()){
                         echo $rows['rolnaam'];
                      }
               }?>
               </p>
    </div>
    <div class="sidebarmid">
      <ul>
        <li style="margin-top: 8%;">
        <a  href="overzicht.php">Mijn overzicht</a></li>
        <li><a href="sponsor.php">Sponsor nieuws</a></li>
        <li><a href="wedstrijden.php">Wedstrijden</a></li>
        <li><a href="mijnteam.php">Mijn team</a></li>
        <li><a href="Activiteiten.php">Activiteiten</a></li>
        <li><a href="businessclub.php">Businessclub</a></li>
        <li><a href="smoelenboek.php">Smoelenboek</a></li>
        <li class="active"><a href="chatstart.php">Mijn connections</a></li>
      </ul>
      </div>
      <div class="sidebarfoot">

        <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true" style="display: none;"></i></a>
         <a id="ri" href=""><img src="images/message.png"></a>
            <a id="li" href=""><img src="images/instelling.png"></a>
            
      </div>
      </div>
  </div>
<div id="main">
  <header class="header">
       <span style="font-size:30px; cursor:pointer" onclick="openNav()">&#9776;</span> 
      <div class="top">Chats</div>
  </header>
  <main class="main">
  <div class="chatschermcontent">

  <?php include_once("includes/db.php");
  //get chats where you are in
$count1 = $conn ->query("SELECT chat.chat_id, chat.chatnaam FROM chat INNER JOIN chat_deelnemer ON chat.chat_id = chat_deelnemer.Chat_id WHERE chat_deelnemer.Lid_id = " . $_SESSION['id']);
while($x = $count1->fetch_assoc()){
$count2 = $conn ->query("SELECT COUNT(*) FROM `chat_deelnemer` WHERE Chat_id = " . $x['chat_id'] . "")->fetch_assoc();
//groupschat
 if($count2['COUNT(*)'] > 2){
    echo '<a style="display:block" href="chatscherm.php?chatid=' . $x['chat_id'] . '"><div class="bsblocksmoel"><img src="images/chatkoppen/' . $x['chat_id'] .'.png"/><h3>' . $x['chatnaam'] . '</h3>';

    $count3 = $conn ->query("SELECT msg FROM `berichten` WHERE `Chat_id` = " . $x['chat_id'] . " ORDER BY timestamp DESC Limit 1")->fetch_assoc();
   echo "<p>" . $count3['msg'] . "</p></div></a>";
  
  }
//prive chat
  elseif($count2['COUNT(*)'] == 2){
    //get lid id van andere gebruiker in de prive chat
 $count4 = $conn ->query("SELECT Lid_id FROM `chat_deelnemer` where Chat_id = " . $x['chat_id'] . " and Lid_id != " . $_SESSION['id']) ->fetch_assoc();
 //pak de voor naam en achternaam voor de chatnaam
 $count5 = $conn ->query("SELECT `voornaam` , `achternaam` FROM leden where `Lid_id` = " . $count4['Lid_id']) ->fetch_assoc();
 $chatnaam = $count5['voornaam'] . " " . $count5['achternaam'];
    echo '<a style="display:block" href="chatscherm.php?chatid=' . $x['chat_id'] . '"><div class="bsblocksmoel"><img src="images/head/' .$count4['Lid_id'] .'.png"/><h3>' . $chatnaam . '</h3>';
        $count3 = $conn ->query("SELECT msg FROM `berichten` WHERE `Chat_id` = " . $x['chat_id'] . " ORDER BY timestamp DESC Limit 1")->fetch_assoc();
     echo "<p>" . $count3['msg'] . "</p></div></a>";
   }else{
     echo '<div class="block">je hebt nog geen chats of 1 tje met je zelf</div>';
   }
}

?>
</div>
  </main>

  

<script>
function openNav() {
  if(document.getElementById("mySidenav").style.width == "250px"){
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
  }else{
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }
    
}
</script>
  <script src="scripts/app.js" async></script>
</body>
</html>
<?php
}else{
     echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}
?>