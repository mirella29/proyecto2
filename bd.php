<?php
session_start();

$conn = mysqli_connect("localhost","root","","taskapp");

mysqli_set_charset($conn,"utf8");
/*
if(isset($conn)){
    echo "bd conectada";
}*/