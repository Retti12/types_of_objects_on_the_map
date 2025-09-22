<?php
include 'config.php';

// Default country code
$countryCode = isset($_GET['country']) ? $_GET['country'] : 'ga';

$url = 'https://wildtracks.pro/api/locality/all/' . $countryCode . '/json/' . $TOKEN;

// Получаем данные
$jsonData = file_get_contents($url);
if ($jsonData === false) die('Error receiving data');

$dataArray = json_decode($jsonData, true);
if ($dataArray === null) die('Error decoding JSON');

// Типы населённых пунктов
$featureTypes = [
'PPL'  => 'populated place	a city, town, village, or other agglomeration of buildings where people live and work',
'PPLA'  => 'seat of a first-order administrative division	seat of a first-order administrative division (PPLC takes precedence over PPLA)',
'PPLA2'  => 'seat of a second-order administrative division',	
'PPLA3'  => 'seat of a third-order administrative division',	
'PPLA4'  => 'seat of a fourth-order administrative division',	
'PPLA5'  => 'seat of a fifth-order administrative division',	
'PPLC'  => 'capital of a political entity capital of a political entity designated as an independent state',
'PPLCD'  => 'capital of a dependency or special area capital or administrative center of a dependent political territory or area of special sovereignty',
'PPLCH'  => 'historical capital of a political entity a former capital of a political entity',
'PPLF'  => 'farm village a populated place where the population is largely engaged in agricultural activities',
'PPLG'  => 'seat of government of a political entity',	
'PPLH'  => 'historical populated place a populated place that no longer exists',
'PPLL'  => 'populated locality an area similar to a locality but with a small group of dwellings or other buildings',
'PPLQ'  => 'abandoned populated place',	
'PPLR'  => 'religious populated place a populated place whose population is largely engaged in religious occupations',
'PPLS'  => 'populated places cities, towns, villages, or other agglomerations of buildings where people live and work',
'PPLW'  => 'destroyed populated place a village, town or city destroyed by a natural disaster, or by war',
'PPLX'  => 'section of populated place',
'STLMT'  => 'israeli settlement'
];

echo "<table border='1' cellpadding='5'>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Elevation</th>
            <th>Timezone</th>
        </tr>";

foreach ($dataArray as $item) {
    $typeCode = $item['feature_code'];
    $typeDesc = isset($featureTypes[$typeCode]) ? $featureTypes[$typeCode] : 'Unknown';
    echo "<tr>
            <td>{$item['name']}</td>
            <td>{$typeCode} - {$typeDesc}</td>
            <td>{$item['latitude']}</td>
            <td>{$item['longitude']}</td>
            <td>{$item['dem']}</td>
            <td>{$item['timezone']}</td>
          </tr>";
}
echo "</table>";
?>
