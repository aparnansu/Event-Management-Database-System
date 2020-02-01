<?php
session_start();
foreach ($_SESSION as $key => $value) {
  unset($_SESSION[$key]);
}  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header('Location: homescreen.php');
?>
