<?php
session_start();
if ($_SESSION["IsLogin"] == false)
    header("Location: login.html");
?>