
<?php
require_once "./Monde.php";

session_start();
$terre = new Monde(30,30);
$_SESSION["terre"]= $terre;

header("location: ./index.php");