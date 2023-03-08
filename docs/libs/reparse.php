<?php
$json = json_decode(file_get_contents("names_raw.js"), true);
$data = [];
foreach ($json as $row) {
    list($x,$x,$x,$x,$x,$x,$x,$x,$year, $gender, $ethnic, $name, $x, $x) = $row;
    $name =  ucwords(strtolower($name));

    $gender =  ucwords(strtolower($gender));
    if (!isset($data[$gender])) $data[$gender] =[];

    $name =  ucwords(strtolower($name));
    if (!isset($data[$gender][$name])) $data[$gender][$name] =[];

    $data[$gender][$name] = 1;
}
foreach ($data as $gender => $rows) {
    $data[$gender] = array_keys($data[$gender]);
    sort($data[$gender]);
}
$data["Herm"] = array_values(array_intersect($data["Male"], $data["Female"]));

file_put_contents("names.js", json_encode($data, JSON_PRETTY_PRINT));