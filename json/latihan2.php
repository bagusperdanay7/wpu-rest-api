<?php
// decode
$data = file_get_contents('coba.json');
$mahasiswa = json_decode($data, true);

var_dump($mahasiswa);
echo $mahasiswa[0]["pembimbing"]["pembimbing1"];

echo "<br>" . $mahasiswa[0]["hobby"][0];
