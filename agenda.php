<?php
session_start();
if(isset($_SESSION['id'])){?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
  <title>IJsselmeervogels</title>
    <link rel="stylesheet" type="text/css" href="styles/inline.css">
   <link rel="stylesheet" type="text/css" href="styles/style.css">
<!--   <link rel="manifest" href="/manifest.json">
  <script src="scripts/jquery.js"></script> -->
<script src="https://use.fontawesome.com/53c62e2546.js"></script>
<!--   <script type="text/JavaScript" src="scripts/sha512.js"></script> 
  <script type="text/JavaScript" src="scripts/forms.js"></script> -->
<!--   <script src="scripts/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="styles/bootstrap.css"> -->
  <style type="text/css">
    body{
      background-image: none;
      background-color: #DE595F;
    }
  </style>
</head>
<body>

<div id="main">
<header class="header">
  <a href="overzicht.php" ><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
    <div class="top">Agenda</div>
</header>
<main class="main">


<div class="agendablock block" style="
    position: relative;
    height: 70px;
    font-size: 1.17em;
    line-height: 70px;
    text-align: center;
    font-family: proximan;
    color: #d3222a;
    font-weight: bold;
    width: 100%;
    margin-bottom:0px;
    ">
<i class="fa fa-caret-left" id="l" aria-hidden="true" style="margin-right: 20px; font-size: 1.3em; vertical-align: middle; float: none;"></i>
<span style="vertical-align: middle;">
Januari 2017</span><i class="fa fa-caret-right" id="r" aria-hidden="true" style="margin-left: 20px; vertical-align: middle; font-size: 1.3em; float: none;"></i>
</div>



	<div class="mainagenda">
  <div class="blockagenda">
  <h3 align="left">Businessmeeting New Penguins<span>16 Mei 2017</span></h3>
  <span>10:29 - 11:01</span><br>
  <p style="margin-top: 10px;">doordat de laatse paar jaar veel verandert is. komt er volgende
  week een meeting iedereen aanwezig?</p>
  </div>
  <div class="blockagenda">
  <h3 align="left">Speler Van Het Jaar Damian Frank<span>17 Mei 2017</span></h3>
  <span>10:29 - 11:01</span><br>
  <p style="margin-top: 10px;">de huldeging voor speler van het jaar is op mei de 18de en huldigt de top
  scorer en dan man met de meeste assist en de meeste cleansheet.</p>
  </div>
  <div class="blockagenda">
  <h3 align="left">Huldiging speler van het jaar<span>18 Mei 2017</span></h3>
  <span>10:29 - 11:01</span><br>
  <p style="margin-top: 10px;">met veel bier vieren we dat Damian Frank speler van het jaar is</p>
  </div>
 </div>
</main>
</div>
    </div>
  </div>

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
  <!-- Uncomment the line below when ready to test with fake data -->
  <script src="scripts/app.js" async></script>

</body>
</html>
<?php
}else{
     echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}
?>