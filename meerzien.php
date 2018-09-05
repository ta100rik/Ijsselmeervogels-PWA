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
.mainoverzicht{
  padding-bottom: 0px;
}
  </style>

</head>
<body>

<div id="main">
  <header class="header">
       <a href="overzicht.php" ><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
      <div class="top">Overzicht</div>
  </header>
  <main class="main mainoverzicht">
 

    <div class="blockmeerzien">
      <h3>SPELER VAN HET JAAR, ONS BOSO SNEEK</h3>
      <p><span>16 Mei 2017  &#8226; 10:29  &#8226; Team a72329</span></p>
      <p>
        De nacompetitie start zaterdag 13 mei met 1-4 bij DVS '33 Ermelo. De 12-koppige Speler van het jaar-jury geeft net als vorig seizoen, elke week cijfers aan de spelers. Op basis hiervan wordt een top-3 samengesteld.Het was deze keer niet moeilijk voor de jury om de beste speler te kiezen. Met drie treffers was duidelijk dat Berry Powel de beste speler aan de kant van IJsselmeervogels was.
      </p>

      <img style="margin-top: 10px;" src="images/head/2.png">

      <p style="color: red; text-align: center; margin-left: 25px; margin-right: 25px; font-size: 14px;">
        rode text onder het plaatje. wat overige text voor opvulling</p>

      <p style="padding-top: 5px;">
        Achter Berry Powel eindigde Jaimy Schaap op de tweede plaats. Ali Akla was terug te vinden op de derde plek. Volgende week staat voor IJsselmeervogels een thuiswedstrijd op het  programma. Scheveningen is de tegenstander en hierna volgt de volgende verkiezing.Wil jij ook deel uitmaken van de jury en de spelers van IJsselmeervogels na de competitiewedstrijden beoordelen? Mail dan met het webteam en wordt jurylid. In principe start je vanaf de eerste wedstrijd van het volgende seizoen, maar mocht je al gelijk willen starten kan dit ook. Hoe meer juryleden er zijn, hoe gedetailleerder de cijfers. Dus schroom niet om je aan te melden
      </p>
    </div>
     
  </main>

  <script src="scripts/app.js" async></script>
</body>
</html>
<?php
}else{
     echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}
?>