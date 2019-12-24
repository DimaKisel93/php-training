<?php
  session_start();
  if(isset($_POST["send"])){
    $from =htmlspecialchars($_POST["from"]);
    $to =htmlspecialchars($_POST["to"]);
    $subject =htmlspecialchars($_POST["subject"]);
    $message =htmlspecialchars($_POST["message"]);
    $_SESSION["from"] = $from;
    $_SESSION["to"] = $to;
    $_SESSION["subject"] = $subject;
    $_SESSION["message"] = $message;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Feedback</title>
    <meta charset="UTF-8" />
  </head>
  <body>
    <h1>Форма обратной связи</h1>
    <form name="feedback" action="" method="post">
      <label>От кого</label><br>
      <input type="text" name="from"><br>
      <label>Кому</label><br>
      <input type="text" name="to" ><br>
      <label>Тема</label><br>
      <input type="text" name="subject" ><br>
      <label>Сообщение</label><br>
      <textarea name="message" cols="20" rows="10" ></textarea><br>
      <input type="submit" name="send" value="Отправить">
    </form>
  </body>
</html>
