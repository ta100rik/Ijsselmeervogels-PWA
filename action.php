<?php
 session_start();
 if(isset($_POST['email'], $_POST['pass'])){
   include_once("includes/db.php");
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['pass']);
   $sql = "SELECT * FROM leden WHERE email='$email' AND password='$password' LIMIT 1";
   $query = mysqli_query($conn, $sql);
    if ( $query) {
                    $row = mysqli_fetch_array($query);
                    if($row){
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['id'] = $row['Lid_id'];
                    $_SESSION['voornaam'] = $row['voornaam'];
                    $_SESSION['achternaam'] = $row['achternaam'];
                    $_SESSION['rolid'] = $row['Rol_id'];

                    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=overzicht.php">';
                  }else{
                    
                   echo '<META HTTP-EQUIV="Refresh" Content="0; URL=loginfailed.php">';
                  }
        }else{
         
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=loginfailed.php">';
        }
     }else{
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=loginfailed.php">';
     }

   
 ?>
