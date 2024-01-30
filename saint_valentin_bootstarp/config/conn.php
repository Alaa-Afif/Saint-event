<?php
$conn = mysqli_connect("localhost","root") or die('erreur serveur');
mysqli_select_db($conn,"user") or die('erreur database');
