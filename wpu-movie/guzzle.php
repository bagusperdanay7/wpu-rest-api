<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://www.omdbapi.com', [
    'query' => [
        'apiKey' => 'a679116c' ,
        's' => 'resident'
    ]
]);

$result = json_decode($response->getBody()->getContents(), true);
// var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
</head>
<body>
    <?php foreach ($result['Search'] as $movie) : ?>
    <ul>
        <li>Title : <?= $movie['Title'];?></li>
        <li>Year : <?= $movie['Year'];?></li>
        <li><img src="<?= $movie['Poster'];?>" alt="<?= $movie['Poster'];?>" width="80"> </li>
    </ul>
    <?php endforeach; ?>
</body>
</html>