<?php
// encode Json
// $mahasiswa = [
//     [
//         "nama" => "Sandhika Galih",
//         "nrp" => "043040023",
//         "email" => "sandhikagalih@unpas.ac.id"
//     ],
//     [
//         "nama" => "Erik Doank",
//         "nrp" => "043040024",
//         "email" => "erikaja@unpas.ac.id"
//     ]
// ];

// encode dari db

$dbh = new PDO('mysql:host=localhost;dbname=phpdasar', 'root', '');

$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mahasiswa);
echo $data;
