<?php
include 'config.php';

// Default country code (can be changed via GET parameter)
$countryCode = isset($_GET['country']) ? $_GET['country'] : 'ad';

$url = 'https://wildtracks.pro/api/forests/all/' . $countryCode . '/json/' . $TOKEN;

// Получаем данные
$jsonData = file_get_contents($url);
if ($jsonData === false) die('Error receiving data');

$dataArray = json_decode($jsonData, true);
if ($dataArray === null) die('Error decoding JSON');

// Типы лесов/угодий
$featureTypes = [
'BUSH' => 'bush(es)	a small clump of conspicuous bushes in an otherwise bare area',
'CULT' => 'cultivated area	an area under cultivation',
'FRST' => 'forest(s)	an area dominated by tree vegetation',
'FRSTF' => 'fossilized forest	a forest fossilized by geologic processes and now exposed at the earth\'s surface',
'GROVE' => 'grove	a small wooded area or collection of trees growing closely together, occurring naturally or deliberately planted',
'GRSLD' => 'grassland	an area dominated by grass vegetation',
'GRVC' => 'coconut grove	a planting of coconut trees',
'GRVO' => 'olive grove	a planting of olive trees',
'GRVP' => 'palm grove	a planting of palm trees',
'GRVPN' => 'pine grove	a planting of pine trees',
'HTH' => 'heath	an upland moor or sandy area dominated by low shrubby vegetation including heather',
'MDW' => 'meadow	a small, poorly drained area dominated by grassy vegetation',
'OCH' => 'orchard(s)	a planting of fruit or nut trees',
'SCRB' => 'scrubland	an area of low trees, bushes, and shrubs stunted by some environmental limitation',
'TREE' => 'tree(s)	a conspicuous tree used as a landmark',
'TUND' => 'tundra	a marshy, treeless, high latitude plain, dominated by mosses, lichens, and low shrub vegetation under permafrost conditions',
'VIN' => 'vineyard	a planting of grapevines',
'VINS' => 'vineyards	plantings of grapevines'
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
