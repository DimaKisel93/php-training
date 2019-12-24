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
      $error_from = "";
      $error_to = "";
      $error_subject = "";
      $error_message = "";
      $error = false;
      if($from == "" || !preg_match("/@/", $from)){
        $error_from = "Введите корректный email";
        $error = true;
      }
      if($from == "" || !preg_match("/@/", $from)){
        $error_to = "Введите корректный email";
        $error = true;
      }
      if(strlen($subject) == 0){
        $error_subject = "Введите тему сообщения";
        $error = true;
      }
      if(strlen($message) == 0){
        $error_message = "Введите сообщение";
        $error = true;
      }
      if(!$error){
        $subject ="=?utf-8?B?".base64_encode($subject)."?=";
        $headers ="From: $from\r\nReply-to: $from\r\nContent-type:text/plain; charset= utf-8\r\n";
        mail($to, $subject, $message, $headers);
        header("Location: success.php?send=1");
        exit;
      }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Feedback</title>
  </head>
  <body>
    <h1>Форма обратной связи</h1>
    <form name="feedback" action="" method="post">
      <label>От кого</label><br>
      <input type="text" name="from" value="<?=$_SESSION["from"]?>"><br>
      <span style="color:red"><?=$error_from?></span><br>
      <label>Кому</label><br>
      <input type="text" name="to" value="<?=$_SESSION["to"]?>" ><br>
      <span style="color:red"><?=$error_to?></span><br>
      <label>Тема</label><br>
      <input type="text" name="subject"value="<?=$_SESSION["subject"]?>" ><br>
      <span style="color:red"><?=$error_subject?></span><br>
      <label>Сообщение</label><br>
      <textarea name="message" cols="20" rows="10"><?=$_SESSION["message"]?> </textarea><br>
      <span style="color:red"><?=$error_message?></span><br>
      <input type="submit" name="send" value="Отправить">
    </form>
  </body>
</html>
