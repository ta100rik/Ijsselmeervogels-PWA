 <?php
  // SELECT chat.chat_id, chat.chatnaam FROM chat INNER JOIN chat_deelnemer ON chat.chat_id = chat_deelnemer.Chat_id WHERE chat_deelnemer.Lid_id = " . $_SESSION['id']
   $sql = $conn ->query("SELECT berichten.msg, berichten.timestamp, berichten.Lid_id, leden.username FROM berichten INNER JOIN leden ON berichten.Lid_id = leden.Lid_id WHERE chat_id =" . $chatid . " ORDER BY timestamp");
while($x = $sql->fetch_assoc()){
  $message = $x['msg'];
  $username = $x['username'];
  $time = $x['timestamp'];
  $userid = $x['Lid_id'];
  if($userid == $_SESSION['id']){
   echo '<div class="chatboxme">' . $message . '</div><div id="r" class="time">' . $time . '</div>';
  }else{
      echo '<div class="chatbox">' . $message . '</div><div id="l" class="time">' . $time .' '. $username . '</div>';
}
}
    ?>
