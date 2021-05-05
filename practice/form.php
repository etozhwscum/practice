<?php


$handler = function ($initial, ...$data) {
$temp = [];
$initial = explode(', ', $initial);
for ($i = 0; $i < count($initial); ++$i) {
   $temp = trim(strtolower($initial[$i])) == trim(strtolower($data[$i]));
   if (!$temp) return [$data[$i] => 'Не равно '.$initial[$i]];
}
return true;
};

$result = isset($_POST, $_POST['initial']) ? $handler($_POST['initial'], $_POST['first'], $_POST['second']) : header('location: /');
var_dump($result);

