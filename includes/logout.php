<?php
session_start();

unset($_SESSION['solo_parent']);

header('location:../index');


?>