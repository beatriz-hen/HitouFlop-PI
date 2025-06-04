<?php
session_start();

if(!$_SESSION['logado'] && !$_SESSION['user']) {
header('Location: login.php');
exit();
}

?>