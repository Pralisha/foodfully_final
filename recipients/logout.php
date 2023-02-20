<?php
session_start();
echo $_SESSION['login'];
if ( !(isset($_SESSION['login']) && $_SESSION['login'] == 'acceptor'))
{
    header('Location:../home.php');
}

?>