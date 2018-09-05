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
  <style type="text/css">
  .footercontent{
  	margin-left:31%;
  }
  	.footercontent  img{
  		width:35px;
  		margin-right:20%;
  	}
  </style>
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
        <li class="active" style="margin-top: 8%;">
        <a  href="overzicht.php">Mijn overzicht</a></li>
        <li><a href="sponsor.php">Sponsor nieuws</a></li>
        <li><a href="wedstrijden.php">Wedstrijden</a></li>
        <li><a href="mijnteam.php">Mijn team</a></li>
        <li><a href="Activiteiten.php">Activiteiten</a></li>
        <li><a href="businessclub.php">businessclub</a></li>
        <li><a href="smoelenboek.php">smoelenboek</a></li>
        <li><a href="chatstart.php">Mijn connections</a></li>
      </ul>
      </div>
      <div class="sidebarfoot">
                  <a id="li" href="logout.php"><img src="images/instelling.png"></a>
         <a id="ri" href=""><img src="images/message.png"></a>

            
      </div>
      </div>
  </div>
<div id="main">
  <header class="header">
       <span style="font-size:30px; cursor:pointer" onclick="openNav()"><img id="menu" src="images/Menu.png"></span> 
      <div class="top">OVERZICHT</div>
  </header>
  <main class="main">
    <div class="overzichtcontent">
    <div class="block score" >
      <p align="center">3E DIVISIE</p>
      <br>
      <p align="center">01-04-2017 15:00</p>
      <div class="scorelogo">
       <img id="l" src="images/icons/96x96.png">
       <img id="r" src="images/icons/96x96.png">
     </div>
     <p>
     IJsselmeervogels &nbsp;&nbsp; IJsselmeervogels
     </p>
     <p class="scorenumber">
     3 - 1
     </p>
    </div>

    <div class="block bignews" >
      <h3>SPELER VAN HET JAAR, ONS BOSO SNEEK</h3>
      <p><span>16 Mei 2017  &#8226; 10:29  &#8226; Team a72329</span></p>
      <P>
	 De nacompetitie start zaterdag 13 mei met een uitwedstrijd tegen Woezik,
	 de nummer drie uit de andere 4e divisie in district Oost.
	 De winnaar over 2 wedstrijden gaat door naar de halve finale.
   </P>
   <a href="meerzien.php">
    <button>Lees meer</button></a>
    </div>
    
     <div class="block personnews" >
     <table>
     <tr>
       <td>      <img src="images/man.png"></td>
       <td><table><tr></tr><tr><td><h3>Herman de Vries</h3></td></tr><tr><td><p><span>16 Mei 2017  &#8226; 10:29</span></p></td></tr></table></td>
      </tr>
     </table>
      <P>
   De nacompetitie start zaterdag 13 mei met een uitwedstrijd tegen Woezik,
   de nummer drie uit de andere 4e divisie in district Oost.
   De winnaar over 2 wedstrijden gaat door naar de halve finale.
   </P>
    </div>
     <div class="block bignews">
      <h3>SPELER VAN HET JAAR, ONS BOSO SNEEK</h3>
      <p><span>16 Mei 2017  &#8226; 10:29  &#8226; Team a72329</span></p>
      <P>
   De nacompetitie start zaterdag 13 mei met een uitwedstrijd tegen Woezik,
   de nummer drie uit de andere 4e divisie in district Oost.
   De winnaar over 2 wedstrijden gaat door naar de halve finale.

   </P>
    <a href="meerzien.php">
    <button>Lees meer</button></a>
    </div>
    
    </div>
  </main>
  <div class="footer">
      <div class="footercontent">
            <a href="agenda.php"><img src="images/Calendar.png"></a>
        <a href="star.php"><img src="images/Star.png"></a>
  
      </div>
    </div>
</div>
<script>
function openNav() {
  if(document.getElementById("mySidenav").style.width == "250px"){
    document.getElementById("mySidenav").style.width = "0px";
    document.getElementById("main").style.marginLeft = "0px";
  }else{
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.getElementsByClassName("main").style.marginLeft = "250px";
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