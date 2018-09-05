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
  <style>
 .top{
  margin-right: 25%;
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
        <li style="margin-top: 8%;">
        <a  href="overzicht.php">Mijn overzicht</a></li>
        <li class="active"><a href="sponsor.php">Sponsor nieuws</a></li>
        <li><a href="wedstrijden.php">Wedstrijden</a></li>
        <li><a href="mijnteam.php">Mijn team</a></li>
        <li><a href="Activiteiten.php">Activiteiten</a></li>
        <li><a href="businessclub.php">Businessclub</a></li>
        <li><a href="smoelenboek.php">Smoelenboek</a></li>
        <li><a href="chatstart.php">Mijn connections</a></li>
      </ul>
      </div>
      <div class="sidebarfoot">
          <a id="li" href="logout.pointerhp"><img src="images/instelling.png"></a>
         <a id="ri" href=""><img src="images/message.png"></a>

            
      </div>
      </div>
  </div>
<div id="main">
  <header class="header sponserheader">
  <div class="sponserheadleft">
       <span style="font-size:30px; cursor:pointer" onclick="openNav()">&#9776;</span> 
       </div>
      <div class="top sponserheadmid">Sponsernieuws</div> 
      <div class="sponserheadright sponserpostbutton"><img src="images/witpotlood.png" width="20px" height="20px" /></div>
  </header>
  <main class="main">
    <div class="sponsercontent">
    <div class="block sponserpost"> 
    <form method="POST">
    <br>
      <textarea onkeyup="countChar(this)" maxlength="220" name="sponserpost" placeholder="Schrijf je bericht hier..."></textarea>
       <span id="charNum">220</span> tekens resterend
      <input type="submit" value="Plaatsen">
    </form>
    <?php
    include_once("includes/db.php");
      if(empty($_POST['sponserpost'])){}else{
        $Lid_id = $_SESSION['id'];
        $msg = mysqli_real_escape_string($conn,$_POST['sponserpost']);
        $query = "INSERT INTO `Sponsernieuws` (`sponsernews_id`, `text`, `user_id`) VALUES (NULL, '$msg', '$Lid_id')";
        $run = $conn->query($query);
      } 
 ?>
    </div>    
          <?php
              include_once("includes/db.php");
                     $result = $conn ->query("SELECT Sponsernieuws.timestamp, Sponsernieuws.user_id, Sponsernieuws.text, leden.voornaam, leden.achternaam FROM `Sponsernieuws` JOIN leden ON Sponsernieuws.user_id = leden.Lid_id  ORDER BY Sponsernieuws.timestamp DESC");
                      if($result->num_rows != 0){
                        while($rows = $result->fetch_assoc()){
                         ?>
                          <div class="block personnews" >
     <table>
     <tr>
       <td><img src="images/head/<?=$rows['user_id']?>.png"></td>
       <td><table><tr></tr><tr><td><h3><?=$rows['voornaam']?> <?=$rows['achternaaam']?></h3></td></tr><tr><td><p><span><?=$rows['timestamp']?></span></p></td></tr></table></td>
      </tr>
     </table>
      <P><?=$rows['text']?>
   </P>
    </div><?php
                      }
               }?>
  
    </div>
  </main>
    </div>
</div>
<script>
$(".sponserpost").hide();
    $(".sponserpostbutton").click(function(){
        $(".sponserpost").slideToggle("slow","swing");
    });
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
 function countChar(val) {
        var len = val.value.length;
        if (len == 221) {
          val.value = val.value.substr(0, 221);
        } else {
          $('#charNum').text(220 - len);
        }
      };
</script>
  <script src="scripts/app.js" async></script>
</body>
</html>
<?php
}else{
     echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}
?>