<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$host = 'localhost';
$user = 'project';
$password = 'admin';
$database = 'project';
$port = '3306';

$conn = mysqli_connect($host, $user, $password, $database, $port);
if (!$conn) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}
