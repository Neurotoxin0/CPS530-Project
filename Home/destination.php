<?php
# create a array to allocate the weight of each contient
$array=[        
    "Asia"=>0,
    "Africa"=>0,
    "Europe"=>0,
    "NorthAmerica"=>0,
    "SouthAmerica"=>0,
    "Oceania"=>0,
    "Antarctica"=>0,
];
# recieve the answer from the form
$weather = $_POST['weather'];
$humidity = $_POST['humidity'];
$region = $_POST['region'];
$scenery = $_POST['scenery'];
$life_style = $_POST['life-style'];
# the weather part
if ($weather == 'cold') {
    $array['Antarctica'] += 1;
}
elseif ($weather == 'hot') {
    $array['Africa'] += 1;
    $array['SouthAmerica'] += 1;
    $array['Oceania'] += 1;
}
else {
    $array['Asia'] += 1;
    $array['Europe'] += 1;
    $array['NorthAmerica'] += 1;
}
# the humidity part
if ($humidity == 'dry') {
    $array['Africa'] += 1;
    $array['Asia'] += 1;
} 
elseif ($humidity == 'humid') {
    $array['Europe'] += 1;
}
else {
    $array['NorthAmerica'] += 1;
    $array['SouthAmerica'] += 1;
    $array['Antarctica'] += 1;
    $array['Oceania'] += 1;
}
# the region part
if ($region == 'north') {
    $array['Asia'] += 1;
    $array['NorthAmerica'] += 1;
    $array['Europe'] += 1;
}
elseif ($region == 'south') {
    $array['SouthAmerica'] += 1;
    $array['Oceania'] += 1;
    $array['Antarctica'] += 1;
}
else {
    $array['Africa'] += 1;
}
# the scenery part
if ($scenery == 'natural') {
    $array['Africa'] += 1;
    $array['SouthAmerica'] += 1;
    $array['Antarctica'] += 1;
    $array['Oceania'] += 1;
}
elseif ($scenery == 'artificial') {
    $array['Europe'] += 1;
}
else {
    $array['Asia'] += 1;
    $array['NorthAmerica'] += 1;
}
# the life style part
if ($life_style == 'slow') {
    $array['SouthAmerica'] += 1;
    $array['Antarctica'] += 1;
}
elseif ($life_style == 'fast') {
    $array['Asia'] += 1;
    $array['NorthAmerica'] += 1;
}
else {
    $array['Oceania'] += 1;
    $array['Europe'] += 1;
}
// find the highest weight of those contients
$pos = array_search(max($array), $array); 
// jump to the contient page
header('Location: https://neurotoxin.synology.me:2666/'.$pos. '/' .$pos. '.php');
?>