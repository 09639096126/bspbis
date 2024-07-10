<?php
session_start();

unset($_SESSION['super_admin']);

header('location:../superAdmin');


?>