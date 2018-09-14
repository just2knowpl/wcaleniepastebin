<?php

include "functions.php";

$api_key = "369739eaae04eaafbe89293926f096fbbbd20b5b";

$song_checker = file_get_contents('https://osu.ppy.sh/api/get_beatmaps?&k='.$api_key.'&b=758923'); //758923 176pp
$json_song_checker = json_decode($song_checker, true);

print_r($json_song_checker);

$circles = $json_song_checker[0]['max_combo'];
$acc = 100;
$ar = $json_song_checker[0]['diff_approach'];
$od = $json_song_checker[0]['diff_overall'];

echo "<br>".$circles ."<br>";
echo $acc ."<br>";
echo $ar ."<br>";
echo $od ."<br>";

echo "MAX PP FOR ".$acc."% ACC: ".ppCalc($circles,$acc,$ar, $od)."<br>";


?>
