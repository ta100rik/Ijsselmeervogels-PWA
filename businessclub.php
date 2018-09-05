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
        <li class="active"><a href="businessclub.php">Businessclub</a></li>
        <li><a href="smoelenboek.php">Smoelenboek</a></li>
        <li><a href="chatstart.php">Mijn connections</a></li>
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
      <div class="top">Businessclubs</div>
      <ul>
        <li>
  </header>
  <main class="main">
    <div class="bsclubcontent">
    <div id="input_container">
      <input id="input" autocomplete="off" type="text">
      <img src="images/search.png" id="input_img">
    </div>

      <div style="text-align: center; color:grey; font-family:proxima;">Alle zoekresultaten</div>

              <?php
              include_once("includes/db.php");
                     $result = $conn ->query("SELECT * FROM sponsers ORDER BY RAND()");
                      if($result->num_rows != 0){
                        while($rows = $result->fetch_assoc()){
                          $id = $rows['sponser_id'];
                          $name = $rows['sponsernaam'];
                        echo '<div class="bsblock"><img src="images/sponsericon/' . $id .'.png"/><h3>' . $name . '</h3></div>';
                      }
               }?>

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