<?php
$cijfer = "0";
if(isset($_GET["p"])) {
	$cijfer = $_GET["p"];
}
 $curl = curl_init('http://www.ijsselmeervogels.nl/nieuws?start='. $cijfer);
 curl_setopt($curl, CURLOPT_FAILONERROR, true);
 curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
 $result = curl_exec($curl);
$dom = new DOMDocument();
$res=$dom->loadHTML($result);

$xpath = new DomXPath($dom);
$class = 'vvijv-nieuws-overzicht-item';
$divs = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");

foreach($divs as $div) {
    //echo $div->nodeValue;
    echo $dom->saveXML($div);
}
?>
<html>
<head>
<script
  src="https://code.jquery.com/jquery-3.2.1.slim.js"
  integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg="
  crossorigin="anonymous"></script>
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
  <style>
  body{
  	background-image:none;
  	overflow: scroll;
}
  }
  </style>
  <script>
$("img").remove();
$(".uk-button").remove();
$("a").removeAttr("href");
$(".vvijv-nieuws-overzicht-item").addClass("block");
</script>
<p id="nav"></p>
<script>
    document.getElementById("nav").innerHTML += "<a href=\"data.php\">first page</a> ";
for (var i = 10; i < 110; i+=10) {
  document.getElementById("nav").innerHTML += "<a href=\"data.php?p="+i + "\">" + i + "</a> ";
}
document.getElementById("nav").innerHTML += "<a href=\"data.php?p=100\">last page</a> ";
</script>
</body>
</html>