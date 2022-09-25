<?php

//server details

// $server = '127.0.0.1';
// $username = '';
// $password = '';

// //schema name
// $schema = 'csy2028';


// //without [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
// // php will not show any errors related to database, so it is essential.

// $pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$pdo = new PDO('mysql:dbname=csy2028;host=localhost', 'root', '');
